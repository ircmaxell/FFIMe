<?php

declare(strict_types=1);

namespace FFIMe;

class Compiler {

    private PreProcessor $preprocessor;
    public Context $context;

    public function __construct(Context $context = null, PreProcessor $preprocessor = null) {
        $this->context = $context ?? new Context;
        $this->preprocessor = $preprocessor ?? new PreProcessor($this->context);
    }

    public function compile(string $header): array {
        $tokens = $this->preprocessor->process($header);
        $tokens = $this->normalizeLines($tokens);
        return $tokens;
    }

    public function emit(array $tokens): string {
        $result = '';
        foreach ($tokens as $line) {
            while (!is_null($line)) {
                if ($line->type === Token::LITERAL) {
                    $result .= '"' . $line->value . '"';
                } elseif ($line->type === Token::IDENTIFIER && $line->value === 'const') {
                    //pass (don't emit consts)
                } else {
                    $result .= ' ' . $line->value;
                }
                $line = $line->next;
            }
            $result .= "\n";
        }
        return $this->cleanCode($result);
    }

    private function normalizeLines(array $tokens): array {
        $result = [];
        $length = count($tokens);
        $i = 0;
        while ($i < $length) {
            $line = $tokens[$i++];
            if (empty($line)) {
                continue;
            }
            $head = $prev = $line;
            do {
                // find next ';'
                while (!is_null($line)) {
                    if ($line->type === Token::PUNCTUATOR && $line->value === ';') {
                        $result[] = $head;
                        $old = $line;
                        $head = $line = $line->next;
                        $prev = $old->next = null;
                    } else {
                        $prev = $line;
                        $line = $line->next;
                    }
                }
                if (!is_null($head)) {
                    // spanning lines
                    while ($i < $length) {
                        $newline = $tokens[$i++];
                        if (empty($newline)) {
                            continue;
                        }
                        if (!is_null($prev)) {
                            $prev->next = $newline;
                        }
                        $line = $newline;
                        break;
                    }
                    if (empty($line)) {
                        throw new \LogicException("Syntax error: missing ;");
                    }
                } else {
                    break;
                }
            } while(true);
        }
        return $result;
    }

    const TYPES_TO_REMOVE = [
        'void',
        'char',
        'bool',
        'int8_t',
        'uint8_t',
        'int16_t',
        'uint16_t',
        'int32_t',
        'uint32_t',
        'int64_t',
        'uint64_t',
        'float',
        'double',
        'uintptr_t',
        'intptr_t',
        'size_t',
        'ssize_t',
        'ptrdiff_t',
        'off_t',
        'va_list',
        '__builtin_va_list',
        '__gnuc_va_list',
    ];

    private function cleanCode(string $code): string {
        if (strpos($code, 'wchar_t') !== false) {
            $code = "typedef unsigned short wchar_t;\n$code";
        }
        $code = preg_replace('(^\s*struct\s+_IO_FILE_plus\s*;)m', '', $code);
        $code = preg_replace('(^\s*extern\s+struct\s+_IO_FILE_plus\s+[a-zA-Z0-9_]+\s*;)m', '', $code);
        $code = preg_replace('(^\s*extern\s+char\s*\*\s*sys_errlist\s*\[\s*\]\s*;)m', 'extern char ** sys_errlist;', $code);
        foreach (self::TYPES_TO_REMOVE as $type) {
            $code = preg_replace('(^\s*typedef\s+([a-zA-Z0-9_]+\s+)+' . preg_quote($type) . '\s*;)m', '', $code);
        }
        // remove inline defined functions
        $code = preg_replace('(^\s*([a-zA-Z0-9_]+\s+)+\(\s*(|([a-zA-Z0-9_]+\s+)+(,\s*([a-zA-Z0-9_]+\s+)+)*)\)\s*\{.*?\})ms', '', $code);
        // remove unlinked __ prefixed math functions
        $code = preg_replace('((^|;)\s*extern\s+(float|double|long\s+double|int|long\s+int|long\s+long\s+int)\s+__[a-zA-Z0-9_]+\s*\([^\)]*\)\s*;)ms', '\1', $code);
        return $code;
    }

}