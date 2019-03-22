<?php

namespace FFIMe;

use FFIMe\Node;

abstract class CParser
{

    const SYMBOL_NONE = -1;
    /*
     * The following members will be filled with generated parsing data:
     */
    /** @var int Size of $tokenToSymbol map */
    protected $tokenToSymbolMapSize;
    /** @var int Size of $action table */
    protected $actionTableSize;
    /** @var int Size of $goto table */
    protected $gotoTableSize;
    /** @var int Symbol number signifying an invalid token */
    protected $invalidSymbol;
    /** @var int Symbol number of error recovery token */
    protected $errorSymbol;
    /** @var int Action number signifying default action */
    protected $defaultAction;
    /** @var int Rule number signifying that an unexpected token was encountered */
    protected $unexpectedTokenRule;
    protected $YY2TBLSTATE;
    /** @var int Number of non-leaf states */
    protected $numNonLeafStates;
    /** @var int[] Map of lexer tokens to internal symbols */
    protected $tokenToSymbol;
    /** @var string[] Map of symbols to their names */
    protected $symbolToName;
    /** @var array Names of the production rules (only necessary for debugging) */
    protected $productions;
    /** @var int[] Map of states to a displacement into the $action table. The corresponding action for this
     *             state/symbol pair is $action[$actionBase[$state] + $symbol]. If $actionBase[$state] is 0, the
                   action is defaulted, i.e. $actionDefault[$state] should be used instead. */
    protected $actionBase;
    /** @var int[] Table of actions. Indexed according to $actionBase comment. */
    protected $action;
    /** @var int[] Table indexed analogously to $action. If $actionCheck[$actionBase[$state] + $symbol] != $symbol
     *             then the action is defaulted, i.e. $actionDefault[$state] should be used instead. */
    protected $actionCheck;
    /** @var int[] Map of states to their default action */
    protected $actionDefault;
    /** @var callable[] Semantic action callbacks */
    protected $reduceCallbacks;
    /** @var int[] Map of non-terminals to a displacement into the $goto table. The corresponding goto state for this
     *             non-terminal/state pair is $goto[$gotoBase[$nonTerminal] + $state] (unless defaulted) */
    protected $gotoBase;
    /** @var int[] Table of states to goto after reduction. Indexed according to $gotoBase comment. */
    protected $goto;
    /** @var int[] Table indexed analogously to $goto. If $gotoCheck[$gotoBase[$nonTerminal] + $state] != $nonTerminal
     *             then the goto state is defaulted, i.e. $gotoDefault[$nonTerminal] should be used. */
    protected $gotoCheck;
    /** @var int[] Map of non-terminals to the default state to goto after their reduction */
    protected $gotoDefault;
    /** @var int[] Map of rules to the non-terminal on their left-hand side, i.e. the non-terminal to use for
     *             determining the state to goto after reduction. */
    protected $ruleToNonTerminal;
    /** @var int[] Map of rules to the length of their right-hand side, which is the number of elements that have to
     *             be popped from the stack(s) on reduction. */
    protected $ruleToLength;
    /*
     * The following members are part of the parser state:
     */
    /** @var Lexer Lexer that is used when parsing */
    protected CLexer $lexer;
    /** @var mixed Temporary value containing the result of last semantic action (reduction) */
    protected $semValue;
    /** @var array Semantic value stack (contains values of tokens and semantic action results) */
    protected $semStack;
    /** @var array[] Start attribute stack */
    protected $startAttributeStack;
    /** @var array[] End attribute stack */
    protected $endAttributeStack;
    /** @var array End attributes of last *shifted* token */
    protected $endAttributes;
    /** @var array Start attributes of last *read* token */
    protected $lookaheadStartAttributes;
    /** @var ErrorHandler Error handler */
    protected $errorHandler;
    /** @var int Error state, used to avoid error floods */
    protected $errorState;

    protected CScope $scope;

    /**
     * Initialize $reduceCallbacks map.
     */
    abstract protected function initReduceCallbacks();

    public function __construct(CLexer $lexer) {
        $this->lexer = $lexer;
        $this->initReduceCallbacks();
    }

    public function parse(array $tokens) {
        $this->scope = new CScope;
        $this->lexer->begin($this->scope, $tokens);
        $result = $this->doParse();
        $this->startAttributeStack = [];
        $this->endAttributeStack = [];
        $this->semStack = [];
        $this->semValue = null;
        return $result;
    }

    protected function doParse() {
        // We start off with no lookahead-token
        $symbol = self::SYMBOL_NONE;
        // The attributes for a node are taken from the first and last token of the node.
        // From the first token only the startAttributes are taken and from the last only
        // the endAttributes. Both are merged using the array union operator (+).
        $startAttributes = [];
        $endAttributes = [];
        $this->endAttributes = $endAttributes;
        // Keep stack of start and end attributes
        $this->startAttributeStack = [];
        $this->endAttributeStack = [$endAttributes];
        // Start off in the initial state and keep a stack of previous states
        $state = 0;
        $stateStack = [$state];
        // Semantic value stack (contains values of tokens and semantic action results)
        $this->semStack = [];
        // Current position in the stack(s)
        $stackPos = 0;
        $this->errorState = 0;
        for (;;) {
            //$this->traceNewState($state, $symbol);
            if ($this->actionBase[$state] === 0) {
                $rule = $this->actionDefault[$state];
            } else {
                if ($symbol === self::SYMBOL_NONE) {
                    // Fetch the next token id from the lexer and fetch additional info by-ref.
                    // The end attributes are fetched into a temporary variable and only set once the token is really
                    // shifted (not during read). Otherwise you would sometimes get off-by-one errors, when a rule is
                    // reduced after a token was read but not yet shifted.
                    $tokenId = $this->lexer->getNextToken($tokenValue, $startAttributes, $endAttributes);
                    // map the lexer token id to the internally used symbols
                    $symbol = $tokenId >= 0 && $tokenId < $this->tokenToSymbolMapSize
                        ? $this->tokenToSymbol[$tokenId]
                        : $this->invalidSymbol;
                    if ($symbol === $this->invalidSymbol) {
                        throw new \RangeException(sprintf(
                            'The lexer returned an invalid token (id=%d, value=%s)',
                            $tokenId, $tokenValue
                        ));
                    }
                    // This is necessary to assign some meaningful attributes to /* empty */ productions. They'll get
                    // the attributes of the next token, even though they don't contain it themselves.
                    $this->startAttributeStack[$stackPos+1] = $startAttributes;
                    $this->endAttributeStack[$stackPos+1] = $endAttributes;
                    $this->lookaheadStartAttributes = $startAttributes;
                    //$this->traceRead($symbol);
                }
                $idx = $this->actionBase[$state] + $symbol;
                if ((($idx >= 0 && $idx < $this->actionTableSize && $this->actionCheck[$idx] === $symbol)
                     || ($state < $this->YY2TBLSTATE
                         && ($idx = $this->actionBase[$state + $this->numNonLeafStates] + $symbol) >= 0
                         && $idx < $this->actionTableSize && $this->actionCheck[$idx] === $symbol))
                    && ($action = $this->action[$idx]) !== $this->defaultAction) {
                    /*
                     * >= numNonLeafStates: shift and reduce
                     * > 0: shift
                     * = 0: accept
                     * < 0: reduce
                     * = -YYUNEXPECTED: error
                     */
                    if ($action > 0) {
                        /* shift */
                        //$this->traceShift($symbol);
                        ++$stackPos;
                        $stateStack[$stackPos] = $state = $action;
                        $this->semStack[$stackPos] = $tokenValue;
                        $this->startAttributeStack[$stackPos] = $startAttributes;
                        $this->endAttributeStack[$stackPos] = $endAttributes;
                        $this->endAttributes = $endAttributes;
                        $symbol = self::SYMBOL_NONE;
                        if ($this->errorState) {
                            --$this->errorState;
                        }
                        if ($action < $this->numNonLeafStates) {
                            continue;
                        }
                        /* $yyn >= numNonLeafStates means shift-and-reduce */
                        $rule = $action - $this->numNonLeafStates;
                    } else {
                        $rule = -$action;
                    }
                } else {
                    $rule = $this->actionDefault[$state];
                }
            }
            for (;;) {
                if ($rule === 0) {
                    /* accept */
                    //$this->traceAccept();
                    return $this->semValue;
                } elseif ($rule !== $this->unexpectedTokenRule) {
                    /* reduce */
                    //$this->traceReduce($rule);
                    try {
                        $this->reduceCallbacks[$rule]($stackPos);
                    } catch (Error $e) {
                        if (-1 === $e->getStartLine() && isset($startAttributes['startLine'])) {
                            $e->setStartLine($startAttributes['startLine']);
                        }
                        $this->emitError($e);
                        // Can't recover from this type of error
                        return null;
                    }
                    /* Goto - shift nonterminal */
                    $lastEndAttributes = $this->endAttributeStack[$stackPos];
                    $stackPos -= $this->ruleToLength[$rule];
                    $nonTerminal = $this->ruleToNonTerminal[$rule];
                    $idx = $this->gotoBase[$nonTerminal] + $stateStack[$stackPos];
                    if ($idx >= 0 && $idx < $this->gotoTableSize && $this->gotoCheck[$idx] === $nonTerminal) {
                        $state = $this->goto[$idx];
                    } else {
                        $state = $this->gotoDefault[$nonTerminal];
                    }
                    ++$stackPos;
                    $stateStack[$stackPos]     = $state;
                    $this->semStack[$stackPos] = $this->semValue;
                    $this->endAttributeStack[$stackPos] = $lastEndAttributes;
                } else {
                    /* error */
                    switch ($this->errorState) {
                        case 0:
                            $msg = $this->getErrorMessage($symbol, $state);
                            $this->emitError(new Error($msg, $startAttributes + $endAttributes));
                            // Break missing intentionally
                        case 1:
                        case 2:
                            $this->errorState = 3;
                            // Pop until error-expecting state uncovered
                            while (!(
                                (($idx = $this->actionBase[$state] + $this->errorSymbol) >= 0
                                    && $idx < $this->actionTableSize && $this->actionCheck[$idx] === $this->errorSymbol)
                                || ($state < $this->YY2TBLSTATE
                                    && ($idx = $this->actionBase[$state + $this->numNonLeafStates] + $this->errorSymbol) >= 0
                                    && $idx < $this->actionTableSize && $this->actionCheck[$idx] === $this->errorSymbol)
                            ) || ($action = $this->action[$idx]) === $this->defaultAction) { // Not totally sure about this
                                if ($stackPos <= 0) {
                                    // Could not recover from error
                                    return null;
                                }
                                $state = $stateStack[--$stackPos];
                                //$this->tracePop($state);
                            }
                            //$this->traceShift($this->errorSymbol);
                            ++$stackPos;
                            $stateStack[$stackPos] = $state = $action;
                            // We treat the error symbol as being empty, so we reset the end attributes
                            // to the end attributes of the last non-error symbol
                            $this->endAttributeStack[$stackPos] = $this->endAttributeStack[$stackPos - 1];
                            $this->endAttributes = $this->endAttributeStack[$stackPos - 1];
                            break;
                        case 3:
                            if ($symbol === 0) {
                                // Reached EOF without recovering from error
                                return null;
                            }
                            //$this->traceDiscard($symbol);
                            $symbol = self::SYMBOL_NONE;
                            break 2;
                    }
                }
                if ($state < $this->numNonLeafStates) {
                    break;
                }
                /* >= numNonLeafStates means shift-and-reduce */
                $rule = $state - $this->numNonLeafStates;
            }
        }
        throw new \RuntimeException('Reached end of parser loop');
    }

    protected function emitError(Error $error) {
        throw $error;
    }
    /**
     * Format error message including expected tokens.
     *
     * @param int $symbol Unexpected symbol
     * @param int $state  State at time of error
     *
     * @return string Formatted error message
     */
    protected function getErrorMessage(int $symbol, int $state) : string {
        $expectedString = '';
        if ($expected = $this->getExpectedTokens($state)) {
            $expectedString = ', expecting ' . implode(' or ', $expected);
        }
        return 'Syntax error, unexpected ' . $this->symbolToName[$symbol] . $expectedString;
    }
    /**
     * Get limited number of expected tokens in given state.
     *
     * @param int $state State
     *
     * @return string[] Expected tokens. If too many, an empty array is returned.
     */
    protected function getExpectedTokens(int $state) : array {
        $expected = [];
        $base = $this->actionBase[$state];
        foreach ($this->symbolToName as $symbol => $name) {
            $idx = $base + $symbol;
            if ($idx >= 0 && $idx < $this->actionTableSize && $this->actionCheck[$idx] === $symbol
                || $state < $this->YY2TBLSTATE
                && ($idx = $this->actionBase[$state + $this->numNonLeafStates] + $symbol) >= 0
                && $idx < $this->actionTableSize && $this->actionCheck[$idx] === $symbol
            ) {
                if ($this->action[$idx] !== $this->unexpectedTokenRule
                    && $this->action[$idx] !== $this->defaultAction
                    && $symbol !== $this->errorSymbol
                ) {
                    if (count($expected) === 4) {
                        /* Too many expected tokens */
                        return [];
                    }
                    $expected[] = $name;
                }
            }
        }
        return $expected;
    }
}