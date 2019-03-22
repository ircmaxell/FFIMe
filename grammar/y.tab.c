<?php

namespace FFIMe;

use FFIMe\Node;


/* This is an automatically GENERATED file, which should not be manually edited.
 */
class CParser extends CParserAbstract
{
    protected $tokenToSymbolMapSize = 330;
    protected $actionTableSize      = 528;
    protected $gotoTableSize        = 302;

    protected $invalidSymbol       = 99;
    protected $errorSymbol         = 1;
    protected $defaultAction       = -32766;
    protected $unexpectedTokenRule = 32767;

    protected $YY2TBLSTATE = 174;
    protected $YYNLSTATES  = 255;

    protected $symbolToName = array(
        "$EOF",
        "error",
        "IDENTIFIER",
        "I_CONSTANT",
        "F_CONSTANT",
        "STRING_LITERAL",
        "FUNC_NAME",
        "SIZEOF",
        "PTR_OP",
        "INC_OP",
        "DEC_OP",
        "LEFT_OP",
        "RIGHT_OP",
        "LE_OP",
        "GE_OP",
        "EQ_OP",
        "NE_OP",
        "AND_OP",
        "OR_OP",
        "MUL_ASSIGN",
        "DIV_ASSIGN",
        "MOD_ASSIGN",
        "ADD_ASSIGN",
        "SUB_ASSIGN",
        "LEFT_ASSIGN",
        "RIGHT_ASSIGN",
        "AND_ASSIGN",
        "XOR_ASSIGN",
        "OR_ASSIGN",
        "TYPEDEF_NAME",
        "ENUMERATION_CONSTANT",
        "TYPEDEF",
        "EXTERN",
        "STATIC",
        "AUTO",
        "REGISTER",
        "INLINE",
        "CONST",
        "RESTRICT",
        "VOLATILE",
        "BOOL",
        "CHAR",
        "SHORT",
        "INT",
        "LONG",
        "SIGNED",
        "UNSIGNED",
        "FLOAT",
        "DOUBLE",
        "VOID",
        "COMPLEX",
        "IMAGINARY",
        "STRUCT",
        "UNION",
        "ENUM",
        "ELLIPSIS",
        "CASE",
        "DEFAULT",
        "IF",
        "ELSE",
        "SWITCH",
        "WHILE",
        "DO",
        "FOR",
        "GOTO",
        "CONTINUE",
        "BREAK",
        "RETURN",
        "ALIGNAS",
        "ALIGNOF",
        "ATOMIC",
        "GENERIC",
        "NORETURN",
        "STATIC_ASSERT",
        "THREAD_LOCAL",
        "'('",
        "')'",
        "','",
        "':'",
        "'['",
        "']'",
        "'.'",
        "'{'",
        "'}'",
        "'&'",
        "'*'",
        "'+'",
        "'-'",
        "'~'",
        "'!'",
        "'/'",
        "'%'",
        "'<'",
        "'>'",
        "'^'",
        "'|'",
        "'?'",
        "'='",
        "';'"
    );

    protected $tokenToSymbol = array(
            0,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   89,   99,   99,   99,   91,   84,   99,
           75,   76,   85,   86,   77,   87,   81,   90,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   78,   98,
           92,   97,   93,   96,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   79,   99,   80,   94,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   82,   95,   83,   88,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,   99,   99,   99,   99,
           99,   99,   99,   99,   99,   99,    1,    2,    3,    4,
            5,    6,    7,    8,    9,   10,   11,   12,   13,   14,
           15,   16,   17,   18,   19,   20,   21,   22,   23,   24,
           25,   26,   27,   28,   29,   30,   31,   32,   33,   34,
           35,   36,   37,   38,   39,   40,   41,   42,   43,   44,
           45,   46,   47,   48,   49,   50,   51,   52,   53,   54,
           55,   56,   57,   58,   59,   60,   61,   62,   63,   64,
           65,   66,   67,   68,   69,   70,   71,   72,   73,   74
    );

    protected $action = array(
          198,  332,  333,  334,  335,  336,  337,  338,  339,  340,
          341,  194,  278,  279,   82,  450,  228,   49,  423,   82,
           86,  228,   49,  479,  413,  414,  415,  383,  227,  362,
          363,  364,  366,  367,  417,  413,  414,  415,  377,  369,
          370,  371,  372,  375,  376,  373,  374,  368,  378,  379,
          387,  388,  137,  121,   78,  199,  200,  416,  201,  202,
           11,  203,  204,  205,  206,   63,  176,  464,  177,  423,
          418,  178,  365,  198,  392,  264,   98,   99,   62,  331,
            1,  500,   69,   82,  195,  228,   49,  281,   39,  435,
          277,    8,  474,   87,  478,   34,  506,  413,  414,  415,
          383,  116,  362,  363,  364,  366,  367,  417,  413,  414,
          415,  377,  369,  370,  371,  372,  375,  376,  373,  374,
          368,  378,  379,  387,  388,  137,  179,   78,  199,  200,
          416,  201,  202,   11,  203,  204,  205,  206,   63,  176,
          472,  177,  126,  418,  178,  365,  276,    9,  474,  489,
            0,   34,  116,    1,  501,  100,  101,  116,-32766,-32766,
        -32766,-32766,-32766,-32766,  451,  413,  414,  415,  383,  506,
          362,  363,  364,  366,  367,  417,  413,  414,  415,  377,
          369,  370,  371,  372,  375,  376,  373,  374,  368,  378,
          379,  387,  388,  137,  178,-32766,  180,   79,  416,-32766,
          178,-32766,   82,    1,  228,  224,  174,  176,   92,  177,
          384,  418,  178,  365,  125,    8,  107,  391,   61,   34,
          485,  108,  109,  178,  178,-32766,-32766,-32766,-32766,-32766,
        -32766,-32766,  443,    1,   20,  346,  383,  506,  362,  363,
          364,  366,  367,  417,  413,  414,  415,  377,  369,  370,
          371,  372,  375,  376,  373,  374,  368,  378,  379,  387,
          388,  137,  198,-32766,   40,  133,   91,-32766,  178,-32766,
          280,  403,  102,  103,  383,  176,   51,  177,  385,  418,
          241,  365,  413,  414,  415,  377,  369,  370,  371,  372,
          375,  376,  373,  374,  368,  378,  379,  387,  388,  137,
          256,  261,  262,  265,  266,  110,  178,  111,  112,-32766,
        -32766,-32766,-32766,-32766,-32766,  177,   78,  199,  200,    3,
          201,  202,   11,  203,  204,  205,  206,   63,  263,   96,
           97,-32766,-32766,-32766,-32766,-32766,-32766,  104,  105,  134,
          436,  229,    1,   41,   70,  405,-32766,  413,  414,  415,
        -32766,  178,-32766,  275,   85,  267,   54,  245,  506,-32766,
        -32766,-32766,-32766,-32766,-32766,    7,    9,  182,-32766,  183,
           34,   42,-32766,    4,-32766,  413,  414,  415,   55,   56,
          416,   71,  291,  292,  293,  294,  295,  296,   43,   15,
          425,   72,  413,  414,  415,  209,-32766,   24,   73,   83,
        -32766,   33,-32766,  413,  414,  415,   74,   75,  416,  413,
          414,  415,   26,   27,   77,    8,   35,    5,  458,   34,
            6,   53,   16,  222,   17,  416,   21,   22,   68,  233,
          234,   50,  240,  254,  419,  466,  416,  420,  412,  424,
          238,  259,  416,  434,  290,  475,  432,  457,   12,  477,
          476,  231,   18,   19,  274,  426,  196,  116,   80,   93,
           13,   14,   84,   88,   89,   90,   79,    0,    0,  433,
          459,  465,  428,  429,  431,  461,  463,  467,  473,  488,
          427,  430,  460,  462,  469,  470,  468,  471,  273,    0,
            0,   52,  175,   49,    0,  404,  406,    0,   95,    0,
          116,-32766,    0,    0,    0,    0,    0,    0,    0,    0,
            0,   94,    0,    0,    0,   61,   76,    0,  518,  519,
          517,  490,  512,  507,  521,  345,  506,  520
    );

    protected $actionCheck = array(
            2,   19,   20,   21,   22,   23,   24,   25,   26,   27,
           28,    8,    9,   10,   79,    2,   81,   82,    2,   79,
           33,   81,   82,   83,   37,   38,   39,   29,    2,   31,
           32,   33,   34,   35,   36,   37,   38,   39,   40,   41,
           42,   43,   44,   45,   46,   47,   48,   49,   50,   51,
           52,   53,   54,   77,   56,   57,   58,   70,   60,   61,
           62,   63,   64,   65,   66,   67,   68,   80,   70,    2,
           72,   73,   74,    2,   98,    2,   13,   14,   75,   97,
           82,   83,   79,   79,   81,   81,   82,   83,   77,   76,
            2,   75,   76,   33,   83,   79,   98,   37,   38,   39,
           29,   85,   31,   32,   33,   34,   35,   36,   37,   38,
           39,   40,   41,   42,   43,   44,   45,   46,   47,   48,
           49,   50,   51,   52,   53,   54,    2,   56,   57,   58,
           70,   60,   61,   62,   63,   64,   65,   66,   67,   68,
           80,   70,   75,   72,   73,   74,    2,   75,   76,    2,
            0,   79,   85,   82,   83,   92,   93,   85,   31,   32,
           33,   34,   35,   36,    2,   37,   38,   39,   29,   98,
           31,   32,   33,   34,   35,   36,   37,   38,   39,   40,
           41,   42,   43,   44,   45,   46,   47,   48,   49,   50,
           51,   52,   53,   54,   73,   68,    2,   78,   70,   72,
           73,   74,   79,   82,   81,    5,   82,   68,   17,   70,
           83,   72,   73,   74,   77,   75,   85,   98,   97,   79,
           97,   90,   91,   73,   73,   85,   31,   32,   33,   34,
           35,   36,   55,   82,   59,   98,   29,   98,   31,   32,
           33,   34,   35,   36,   37,   38,   39,   40,   41,   42,
           43,   44,   45,   46,   47,   48,   49,   50,   51,   52,
           53,   54,    2,   68,   77,   77,   18,   72,   73,   74,
           83,   83,   11,   12,   29,   68,   82,   70,   83,   72,
           61,   74,   37,   38,   39,   40,   41,   42,   43,   44,
           45,   46,   47,   48,   49,   50,   51,   52,   53,   54,
            2,    3,    4,    5,    6,    7,   73,    9,   10,   31,
           32,   33,   34,   35,   36,   70,   56,   57,   58,   75,
           60,   61,   62,   63,   64,   65,   66,   67,   30,   15,
           16,   31,   32,   33,   34,   35,   36,   86,   87,   77,
           76,   77,   82,   33,   96,   83,   68,   37,   38,   39,
           72,   73,   74,   76,   77,   76,   77,   57,   98,   31,
           32,   33,   34,   35,   36,   75,   75,   69,   68,   71,
           79,   33,   72,   75,   74,   37,   38,   39,   75,   75,
           70,   75,   84,   85,   86,   87,   88,   89,   33,   76,
           80,   75,   37,   38,   39,   85,   68,   75,   75,   33,
           72,   79,   74,   37,   38,   39,   75,   75,   70,   37,
           38,   39,   75,   77,   75,   75,   79,   75,   80,   79,
           75,   77,   76,   85,   76,   70,   76,   76,   76,   76,
           76,   82,   76,   76,   76,   80,   70,   76,   76,   76,
           85,   76,   70,   76,   76,   76,   80,   76,   78,   76,
           76,   85,   76,   76,   76,   80,   77,   85,   77,   95,
           78,   78,   78,   78,   78,   78,   78,   -1,   -1,   80,
           80,   80,   80,   80,   80,   80,   80,   80,   80,   80,
           80,   80,   80,   80,   80,   80,   80,   80,   80,   -1,
           -1,   82,   82,   82,   -1,   83,   83,   -1,   84,   -1,
           85,   85,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   94,   -1,   -1,   -1,   97,   97,   -1,   98,   98,
           98,   98,   98,   98,   98,   98,   98,   98
    );

    protected $actionBase = array(
          233,   -2,   71,  139,  245,  245,  245,  245,   16,   72,
          121,  260,  260,  260,  260,  260,  260,  260,  260,  260,
          260,  260,  260,  150,   13,  151,  374,  177,  207,  207,
          207,  207,  207,  310,  338,  355,  366,  -13,   60,  -60,
            4,  128,  128,  128,  128,  128,  128,  127,  195,  -65,
          -65,  278,  278,  300,  300,  328,  328,  328,  328,  428,
          428,  411,  378,  429,  411,  376,  377,  411,  349,  298,
          298,  298,  298,  298,  298,  298,  298,  298,  298,  298,
          298,  298,  298,  298,  298,  298,  298,  298,  298,  298,
          298,  298,  298,  298,  298,  298,  298,  298,  298,  298,
          298,  298,  298,  298,  298,  298,  298,  298,  298,  298,
          342,  345,  345,  -18,    3,  119,  372,  372,  427,  427,
          340,  388,   63,   63,   63,   67,   67,  415,  140,  123,
          131,  131,  131,  412,  413,  416,  291,  124,  194,  137,
          322,  188,  251,  261,  314,  248,  322,  262,  365,  337,
          425,  264,  -24,  277,  408,  251,  251,  261,  261,  261,
          261,  314,  387,  337,  426,   11,  313,  346,  348,  279,
          187,  357,  350,  351,   73,   73,  290,  303,  332,  410,
          409,  419,  304,  339,  358,  414,  417,  364,  191,  361,
          362,  379,  363,  352,   88,  144,  200,  418,  370,  382,
          306,  316,  323,  244,   26,  420,  421,  367,  336,  375,
          389,  384,  353,  354,  368,  344,  414,  417,  364,  191,
          369,  371,  390,  391,  356,  383,  219,  422,  147,  162,
          392,  393,  394,  349,  349,  395,  396,  373,  397,  398,
          423,  331,  399,  400,  401,  385,  386,  402,  403,  404,
          405,  406,  407,  175,  424,  207,  298,  298,  298,  298,
          298,  298,  298,  207,  207,  207,  298,  298,  298,  298,
          298,  298,  298,  298,  298,  298,  298,  298,  207,  207,
          207,  207,  207,    0,    0,    0,    0,    0,  298,  298,
          298,  298,  298,  298,  298,  298,  298,  298,  298,  298,
          298,  298,  207,  207,  298,  298,  207,  207,  207,  207,
          207,  207,  207,  207,  298,  298,  298,  298,  298,  298,
          298,  298,  298,  298,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,  298,  298,  298,    0,    0,
           67,    0,    0,   67,   67,   67,   67,    0,    0,    0,
            0,    0,  291,   67,    0,    0,    0,    0,   73,   73,
           67,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,  381,    0,  381,    0,    0,    0,  381,
            0,    0,    0,    0,    0,    0,    0,  381,    0,  381,
            0,  381,  381,  381,    0,    0,  381,  381,  381
    );

    protected $actionDefault = array(
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
          106,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,   94,   96,
           98,  100,  102,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,  140,  142,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,   42,   29,32767,  185,  183,32767,32767,
          194,32767,   59,   60,   61,32767,32767,  198,  200,32767,
           48,   49,   50,32767,32767,32767,  200,32767,32767,32767,
          167,32767,   51,   54,   62,   72,  166,32767,32767,  201,
        32767,32767,32767,32767,32767,   52,   53,   57,   58,   55,
           56,   63,32767,  199,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,32767,32767,32767,32767,  161,32767,  152,
          131,  156,32767,32767,32767,   64,   66,   68,   70,32767,
        32767,32767,32767,32767,32767,32767,32767,  106,    1,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,  189,   37,
        32767,  147,32767,32767,32767,32767,   65,   67,   69,   71,
        32767,32767,   37,32767,32767,32767,32767,32767,32767,32767,
        32767,   37,32767,   34,32767,32767,32767,32767,   37,32767,
        32767,32767,32767,32767,32767,32767,32767,32767,32767,32767,
        32767,32767,32767,  254,32767
    );

    protected $goto = array(
          297,  210,  223,  239,  232,  236,  250,  480,  480,  230,
          235,  249,  243,  247,  251,  503,  527,  480,  480,  163,
          170,  448,  193,  212,  213,  184,  298,  163,  452,  480,
          282,  526,  480,  115,  115,  480,  446,  115,  115,  157,
          158,  159,  160,  394,  396,  215,   64,   64,  343,  330,
          207,  244,  237,  283,  248,  252,  271,  270,  393,  393,
          523,  297,  393,  393,  287,  300,  301,  302,  297,  297,
          269,  297,  297,  190,  214,  297,   48,  297,   58,   58,
           58,   58,  219,  297,  297,  297,  297,  297,  297,  297,
          297,  297,  297,  297,  297,  297,  297,  297,  297,  297,
          297,  297,  297,  288,  285,  286,  218,  441,  441,  441,
          442,  442,  442,  128,  136,  441,  441,  441,  442,  442,
          442,   58,   58,  192,  217,   58,   58,   58,   58,   58,
           58,   58,   58,   57,   57,   57,   57,  148,  148,  148,
          118,  344,  389,  389,   60,  123,  124,  216,  120,  120,
          226,  497,  499,  498,  253,  510,  511,  515,  513,  508,
          516,  514,  161,  118,  120,  399,  120,  120,  348,  350,
          352,  354,  356,  155,  156,  359,   57,   57,  408,  408,
           57,   57,   57,   57,   57,   57,   57,   57,  146,    0,
          441,  442,  131,  132,  487,  146,  164,  147,  172,  173,
           65,   66,  154,  162,  166,  167,  168,  171,    0,  344,
          344,    0,  344,  344,    0,    0,  344,    0,  344,   37,
           38,  439,  437,    0,  328,  128,   44,   45,   46,    0,
            0,    0,  136,   10,  197,  447,    0,    0,  482,  482,
          197,  192,  191,  410,  525,  225,  400,   59,    0,  242,
          360,  401,    0,  481,  528,    0,  483,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,  525,    0,  529,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,    0,    0,    0,    0,    0,    0,    0,    0,    0,
            0,  117
    );

    protected $gotoCheck = array(
           15,    8,    8,    8,    8,    8,    8,    8,    8,    8,
            8,    8,    8,    8,    8,   74,   68,    8,    8,   62,
           14,   61,   11,   11,   11,   11,   17,   62,   61,    8,
            8,   68,    8,   49,   49,    8,   60,   49,   49,   20,
           20,   20,   20,   49,   49,    8,   63,   63,    8,    8,
           57,    8,   57,    8,    8,    8,    8,    8,   34,   34,
           75,   15,   34,   34,   17,   17,   17,   17,   15,   15,
           10,   15,   15,   11,   11,   15,   47,   15,   37,   37,
           37,   37,   26,   15,   15,   15,   15,   15,   15,   15,
           15,   15,   15,   15,   15,   15,   15,   15,   15,   15,
           15,   15,   15,   15,   15,   15,   25,   37,   37,   37,
           37,   37,   37,   54,   54,   37,   37,   37,   37,   37,
           37,   37,   37,   41,   24,   37,   37,   37,   37,   37,
           37,   37,   37,   36,   36,   36,   36,    5,    5,    5,
           32,   28,   48,   48,   69,   21,   21,   23,   32,   32,
           66,   66,   66,   66,   66,   66,   66,   66,   66,   66,
           66,   66,   22,   32,   32,   51,   32,   32,   32,   32,
           32,   32,   32,   19,   19,   40,   36,   36,   53,   53,
           36,   36,   36,   36,   36,   36,   36,   36,   55,   -1,
           37,   37,   18,   18,   65,   55,    5,   52,    5,    5,
           69,   69,    5,    5,    5,    5,    5,    5,   -1,   28,
           28,   -1,   28,   28,   -1,   -1,   28,   -1,   28,   56,
           56,   54,   54,   -1,   28,   54,   56,   56,   56,   -1,
           -1,   -1,   54,   41,   41,   41,   -1,   -1,   42,   42,
           41,   41,   30,   30,   31,   30,   30,   31,   -1,   30,
           42,   30,   -1,   42,   31,   -1,   42,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   31,   -1,   31,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,   -1,
           -1,   56
    );

    protected $gotoBase = array(
            0,    0,    0,    0,    0,  133,    0,    0,  -32,    0,
           16,   18,    0,    0,  -30,   -7,    0,  -42,   88,   71,
          -59,   49,   67,   53,   31,   14,   -9,    0,  134,    0,
          167,  244,  140,    0,   11,    0,  129,   74,    0,    0,
           50,  115,  189,    0,    0,    0,    0,   24,   91,  -14,
            0,   44,   22,    4,  105,   60,  185,   26,    0,    0,
            9,  -99, -109,   -3,    0,   65,  139,    0,    6,  141,
            0,    0,    0,    0,   13,   37,    0,    0
    );

    protected $gotoDefault = array(
        -32768,   23,  272,  257,  258,  150,  260,  181,  342,  169,
          268,  246,  114,  153,  165,  113,  106,  299,  130,  142,
          143,  122,  144,  185,  186,  187,  188,  145,  329,   81,
          189,  504,  119,  139,  347,   28,   29,   30,   31,   32,
          358,  211,  484,  380,  381,  382,  138,   47,  390,  127,
          152,  398,  141,  409,  135,  140,   36,  220,  151,  208,
          445,  221,  149,   67,  129,  486,  505,  491,  492,  493,
          494,  495,  496,    2,  502,  522,  524,   25
    );

    protected $ruleToNonTerminal = array(
            0,    2,    2,    2,    2,    2,    3,    3,    3,    7,
            4,    4,    6,    9,    9,   10,   10,   12,   12,   12,
           12,   12,   12,   12,   12,   12,   12,   13,   13,   15,
           15,   15,   15,   15,   15,   15,   16,   16,   16,   16,
           16,   16,   17,   17,   18,   18,   18,   18,   19,   19,
           19,   20,   20,   20,   21,   21,   21,   21,   21,   22,
           22,   22,   23,   23,   24,   24,   25,   25,   26,   26,
           27,   27,   28,   28,    8,    8,   29,   29,   29,   29,
           29,   29,   29,   29,   29,   29,   29,    5,    5,   30,
           31,   31,   31,   32,   32,   32,   32,   32,   32,   32,
           32,   32,   32,   33,   33,   40,   40,   35,   35,   35,
           35,   35,   35,   36,   36,   36,   36,   36,   36,   36,
           36,   36,   36,   36,   36,   36,   36,   36,   36,   44,
           44,   44,   46,   46,   47,   47,   48,   48,   48,   49,
           49,   49,   49,   50,   50,   51,   51,   51,   45,   45,
           45,   45,   45,   52,   52,   53,   53,   43,   37,   37,
           37,   37,   38,   38,   39,   39,   41,   41,   55,   55,
           55,   55,   55,   55,   55,   55,   55,   55,   55,   55,
           55,   55,   54,   54,   54,   54,   56,   56,   57,   57,
           59,   59,   60,   60,   60,   58,   58,   11,   11,   61,
           61,   61,   62,   62,   62,   62,   62,   62,   62,   62,
           62,   62,   62,   62,   62,   62,   62,   62,   62,   62,
           62,   62,   62,   42,   42,   42,   14,   14,   14,   14,
           63,   64,   64,   65,   65,   34,   66,   66,   66,   66,
           66,   66,   67,   67,   67,   68,   68,   73,   73,   74,
           74,   69,   69,   70,   70,   70,   71,   71,   71,   71,
           71,   71,   72,   72,   72,   72,   72,    1,    1,   75,
           75,   76,   76,   77,   77
    );

    protected $ruleToLength = array(
            1,    1,    1,    1,    3,    1,    1,    1,    1,    1,
            1,    1,    6,    1,    3,    3,    3,    1,    4,    3,
            4,    3,    3,    2,    2,    6,    7,    1,    3,    1,
            2,    2,    2,    2,    4,    4,    1,    1,    1,    1,
            1,    1,    1,    4,    1,    3,    3,    3,    1,    3,
            3,    1,    3,    3,    1,    3,    3,    3,    3,    1,
            3,    3,    1,    3,    1,    3,    1,    3,    1,    3,
            1,    3,    1,    5,    1,    3,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    3,    1,
            2,    3,    1,    2,    1,    2,    1,    2,    1,    2,
            1,    2,    1,    1,    3,    3,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    1,
            1,    1,    1,    1,    1,    1,    1,    1,    1,    4,
            5,    2,    1,    1,    1,    2,    2,    3,    1,    2,
            1,    2,    1,    1,    3,    2,    3,    1,    4,    5,
            5,    6,    2,    1,    3,    3,    1,    4,    1,    1,
            1,    1,    1,    1,    4,    4,    2,    1,    1,    3,
            3,    4,    6,    5,    5,    6,    5,    4,    4,    4,
            3,    4,    3,    2,    2,    1,    1,    2,    3,    1,
            1,    3,    2,    2,    1,    1,    3,    2,    1,    2,
            1,    1,    3,    2,    3,    5,    4,    5,    4,    3,
            3,    3,    4,    6,    5,    5,    6,    4,    4,    2,
            3,    3,    4,    3,    4,    1,    2,    1,    4,    3,
            2,    1,    2,    3,    2,    7,    1,    1,    1,    1,
            1,    1,    3,    4,    3,    2,    3,    1,    2,    1,
            1,    1,    2,    7,    5,    5,    5,    7,    6,    7,
            6,    7,    3,    2,    2,    2,    3,    1,    2,    1,
            1,    4,    3,    1,    2
    );

    protected $productions = array(
        "$start : translation_unit",
        "primary_expression : IDENTIFIER",
        "primary_expression : constant",
        "primary_expression : string",
        "primary_expression : '(' expression ')'",
        "primary_expression : generic_selection",
        "constant : I_CONSTANT",
        "constant : F_CONSTANT",
        "constant : ENUMERATION_CONSTANT",
        "enumeration_constant : IDENTIFIER",
        "string : STRING_LITERAL",
        "string : FUNC_NAME",
        "generic_selection : GENERIC '(' assignment_expression ',' generic_assoc_list ')'",
        "generic_assoc_list : generic_association",
        "generic_assoc_list : generic_assoc_list ',' generic_association",
        "generic_association : type_name ':' assignment_expression",
        "generic_association : DEFAULT ':' assignment_expression",
        "postfix_expression : primary_expression",
        "postfix_expression : postfix_expression '[' expression ']'",
        "postfix_expression : postfix_expression '(' ')'",
        "postfix_expression : postfix_expression '(' argument_expression_list ')'",
        "postfix_expression : postfix_expression '.' IDENTIFIER",
        "postfix_expression : postfix_expression PTR_OP IDENTIFIER",
        "postfix_expression : postfix_expression INC_OP",
        "postfix_expression : postfix_expression DEC_OP",
        "postfix_expression : '(' type_name ')' '{' initializer_list '}'",
        "postfix_expression : '(' type_name ')' '{' initializer_list ',' '}'",
        "argument_expression_list : assignment_expression",
        "argument_expression_list : argument_expression_list ',' assignment_expression",
        "unary_expression : postfix_expression",
        "unary_expression : INC_OP unary_expression",
        "unary_expression : DEC_OP unary_expression",
        "unary_expression : unary_operator cast_expression",
        "unary_expression : SIZEOF unary_expression",
        "unary_expression : SIZEOF '(' type_name ')'",
        "unary_expression : ALIGNOF '(' type_name ')'",
        "unary_operator : '&'",
        "unary_operator : '*'",
        "unary_operator : '+'",
        "unary_operator : '-'",
        "unary_operator : '~'",
        "unary_operator : '!'",
        "cast_expression : unary_expression",
        "cast_expression : '(' type_name ')' cast_expression",
        "multiplicative_expression : cast_expression",
        "multiplicative_expression : multiplicative_expression '*' cast_expression",
        "multiplicative_expression : multiplicative_expression '/' cast_expression",
        "multiplicative_expression : multiplicative_expression '%' cast_expression",
        "additive_expression : multiplicative_expression",
        "additive_expression : additive_expression '+' multiplicative_expression",
        "additive_expression : additive_expression '-' multiplicative_expression",
        "shift_expression : additive_expression",
        "shift_expression : shift_expression LEFT_OP additive_expression",
        "shift_expression : shift_expression RIGHT_OP additive_expression",
        "relational_expression : shift_expression",
        "relational_expression : relational_expression '<' shift_expression",
        "relational_expression : relational_expression '>' shift_expression",
        "relational_expression : relational_expression LE_OP shift_expression",
        "relational_expression : relational_expression GE_OP shift_expression",
        "equality_expression : relational_expression",
        "equality_expression : equality_expression EQ_OP relational_expression",
        "equality_expression : equality_expression NE_OP relational_expression",
        "and_expression : equality_expression",
        "and_expression : and_expression '&' equality_expression",
        "exclusive_or_expression : and_expression",
        "exclusive_or_expression : exclusive_or_expression '^' and_expression",
        "inclusive_or_expression : exclusive_or_expression",
        "inclusive_or_expression : inclusive_or_expression '|' exclusive_or_expression",
        "logical_and_expression : inclusive_or_expression",
        "logical_and_expression : logical_and_expression AND_OP inclusive_or_expression",
        "logical_or_expression : logical_and_expression",
        "logical_or_expression : logical_or_expression OR_OP logical_and_expression",
        "conditional_expression : logical_or_expression",
        "conditional_expression : logical_or_expression '?' expression ':' conditional_expression",
        "assignment_expression : conditional_expression",
        "assignment_expression : unary_expression assignment_operator assignment_expression",
        "assignment_operator : '='",
        "assignment_operator : MUL_ASSIGN",
        "assignment_operator : DIV_ASSIGN",
        "assignment_operator : MOD_ASSIGN",
        "assignment_operator : ADD_ASSIGN",
        "assignment_operator : SUB_ASSIGN",
        "assignment_operator : LEFT_ASSIGN",
        "assignment_operator : RIGHT_ASSIGN",
        "assignment_operator : AND_ASSIGN",
        "assignment_operator : XOR_ASSIGN",
        "assignment_operator : OR_ASSIGN",
        "expression : assignment_expression",
        "expression : expression ',' assignment_expression",
        "constant_expression : conditional_expression",
        "declaration : declaration_specifiers ';'",
        "declaration : declaration_specifiers init_declarator_list ';'",
        "declaration : static_assert_declaration",
        "declaration_specifiers : storage_class_specifier declaration_specifiers",
        "declaration_specifiers : storage_class_specifier",
        "declaration_specifiers : type_specifier declaration_specifiers",
        "declaration_specifiers : type_specifier",
        "declaration_specifiers : type_qualifier declaration_specifiers",
        "declaration_specifiers : type_qualifier",
        "declaration_specifiers : function_specifier declaration_specifiers",
        "declaration_specifiers : function_specifier",
        "declaration_specifiers : alignment_specifier declaration_specifiers",
        "declaration_specifiers : alignment_specifier",
        "init_declarator_list : init_declarator",
        "init_declarator_list : init_declarator_list ',' init_declarator",
        "init_declarator : declarator '=' initializer",
        "init_declarator : declarator",
        "storage_class_specifier : TYPEDEF",
        "storage_class_specifier : EXTERN",
        "storage_class_specifier : STATIC",
        "storage_class_specifier : THREAD_LOCAL",
        "storage_class_specifier : AUTO",
        "storage_class_specifier : REGISTER",
        "type_specifier : VOID",
        "type_specifier : CHAR",
        "type_specifier : SHORT",
        "type_specifier : INT",
        "type_specifier : LONG",
        "type_specifier : FLOAT",
        "type_specifier : DOUBLE",
        "type_specifier : SIGNED",
        "type_specifier : UNSIGNED",
        "type_specifier : BOOL",
        "type_specifier : COMPLEX",
        "type_specifier : IMAGINARY",
        "type_specifier : atomic_type_specifier",
        "type_specifier : struct_or_union_specifier",
        "type_specifier : enum_specifier",
        "type_specifier : TYPEDEF_NAME",
        "struct_or_union_specifier : struct_or_union '{' struct_declaration_list '}'",
        "struct_or_union_specifier : struct_or_union IDENTIFIER '{' struct_declaration_list '}'",
        "struct_or_union_specifier : struct_or_union IDENTIFIER",
        "struct_or_union : STRUCT",
        "struct_or_union : UNION",
        "struct_declaration_list : struct_declaration",
        "struct_declaration_list : struct_declaration_list struct_declaration",
        "struct_declaration : specifier_qualifier_list ';'",
        "struct_declaration : specifier_qualifier_list struct_declarator_list ';'",
        "struct_declaration : static_assert_declaration",
        "specifier_qualifier_list : type_specifier specifier_qualifier_list",
        "specifier_qualifier_list : type_specifier",
        "specifier_qualifier_list : type_qualifier specifier_qualifier_list",
        "specifier_qualifier_list : type_qualifier",
        "struct_declarator_list : struct_declarator",
        "struct_declarator_list : struct_declarator_list ',' struct_declarator",
        "struct_declarator : ':' constant_expression",
        "struct_declarator : declarator ':' constant_expression",
        "struct_declarator : declarator",
        "enum_specifier : ENUM '{' enumerator_list '}'",
        "enum_specifier : ENUM '{' enumerator_list ',' '}'",
        "enum_specifier : ENUM IDENTIFIER '{' enumerator_list '}'",
        "enum_specifier : ENUM IDENTIFIER '{' enumerator_list ',' '}'",
        "enum_specifier : ENUM IDENTIFIER",
        "enumerator_list : enumerator",
        "enumerator_list : enumerator_list ',' enumerator",
        "enumerator : enumeration_constant '=' constant_expression",
        "enumerator : enumeration_constant",
        "atomic_type_specifier : ATOMIC '(' type_name ')'",
        "type_qualifier : CONST",
        "type_qualifier : RESTRICT",
        "type_qualifier : VOLATILE",
        "type_qualifier : ATOMIC",
        "function_specifier : INLINE",
        "function_specifier : NORETURN",
        "alignment_specifier : ALIGNAS '(' type_name ')'",
        "alignment_specifier : ALIGNAS '(' constant_expression ')'",
        "declarator : pointer direct_declarator",
        "declarator : direct_declarator",
        "direct_declarator : IDENTIFIER",
        "direct_declarator : '(' declarator ')'",
        "direct_declarator : direct_declarator '[' ']'",
        "direct_declarator : direct_declarator '[' '*' ']'",
        "direct_declarator : direct_declarator '[' STATIC type_qualifier_list assignment_expression ']'",
        "direct_declarator : direct_declarator '[' STATIC assignment_expression ']'",
        "direct_declarator : direct_declarator '[' type_qualifier_list '*' ']'",
        "direct_declarator : direct_declarator '[' type_qualifier_list STATIC assignment_expression ']'",
        "direct_declarator : direct_declarator '[' type_qualifier_list assignment_expression ']'",
        "direct_declarator : direct_declarator '[' type_qualifier_list ']'",
        "direct_declarator : direct_declarator '[' assignment_expression ']'",
        "direct_declarator : direct_declarator '(' parameter_type_list ')'",
        "direct_declarator : direct_declarator '(' ')'",
        "direct_declarator : direct_declarator '(' identifier_list ')'",
        "pointer : '*' type_qualifier_list pointer",
        "pointer : '*' type_qualifier_list",
        "pointer : '*' pointer",
        "pointer : '*'",
        "type_qualifier_list : type_qualifier",
        "type_qualifier_list : type_qualifier_list type_qualifier",
        "parameter_type_list : parameter_list ',' ELLIPSIS",
        "parameter_type_list : parameter_list",
        "parameter_list : parameter_declaration",
        "parameter_list : parameter_list ',' parameter_declaration",
        "parameter_declaration : declaration_specifiers declarator",
        "parameter_declaration : declaration_specifiers abstract_declarator",
        "parameter_declaration : declaration_specifiers",
        "identifier_list : IDENTIFIER",
        "identifier_list : identifier_list ',' IDENTIFIER",
        "type_name : specifier_qualifier_list abstract_declarator",
        "type_name : specifier_qualifier_list",
        "abstract_declarator : pointer direct_abstract_declarator",
        "abstract_declarator : pointer",
        "abstract_declarator : direct_abstract_declarator",
        "direct_abstract_declarator : '(' abstract_declarator ')'",
        "direct_abstract_declarator : '[' ']'",
        "direct_abstract_declarator : '[' '*' ']'",
        "direct_abstract_declarator : '[' STATIC type_qualifier_list assignment_expression ']'",
        "direct_abstract_declarator : '[' STATIC assignment_expression ']'",
        "direct_abstract_declarator : '[' type_qualifier_list STATIC assignment_expression ']'",
        "direct_abstract_declarator : '[' type_qualifier_list assignment_expression ']'",
        "direct_abstract_declarator : '[' type_qualifier_list ']'",
        "direct_abstract_declarator : '[' assignment_expression ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' '*' ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' STATIC type_qualifier_list assignment_expression ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' STATIC assignment_expression ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' type_qualifier_list assignment_expression ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' type_qualifier_list STATIC assignment_expression ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' type_qualifier_list ']'",
        "direct_abstract_declarator : direct_abstract_declarator '[' assignment_expression ']'",
        "direct_abstract_declarator : '(' ')'",
        "direct_abstract_declarator : '(' parameter_type_list ')'",
        "direct_abstract_declarator : direct_abstract_declarator '(' ')'",
        "direct_abstract_declarator : direct_abstract_declarator '(' parameter_type_list ')'",
        "initializer : '{' initializer_list '}'",
        "initializer : '{' initializer_list ',' '}'",
        "initializer : assignment_expression",
        "initializer_list : designation initializer",
        "initializer_list : initializer",
        "initializer_list : initializer_list ',' designation initializer",
        "initializer_list : initializer_list ',' initializer",
        "designation : designator_list '='",
        "designator_list : designator",
        "designator_list : designator_list designator",
        "designator : '[' constant_expression ']'",
        "designator : '.' IDENTIFIER",
        "static_assert_declaration : STATIC_ASSERT '(' constant_expression ',' STRING_LITERAL ')' ';'",
        "statement : labeled_statement",
        "statement : compound_statement",
        "statement : expression_statement",
        "statement : selection_statement",
        "statement : iteration_statement",
        "statement : jump_statement",
        "labeled_statement : IDENTIFIER ':' statement",
        "labeled_statement : CASE constant_expression ':' statement",
        "labeled_statement : DEFAULT ':' statement",
        "compound_statement : '{' '}'",
        "compound_statement : '{' block_item_list '}'",
        "block_item_list : block_item",
        "block_item_list : block_item_list block_item",
        "block_item : declaration",
        "block_item : statement",
        "expression_statement : ';'",
        "expression_statement : expression ';'",
        "selection_statement : IF '(' expression ')' statement ELSE statement",
        "selection_statement : IF '(' expression ')' statement",
        "selection_statement : SWITCH '(' expression ')' statement",
        "iteration_statement : WHILE '(' expression ')' statement",
        "iteration_statement : DO statement WHILE '(' expression ')' ';'",
        "iteration_statement : FOR '(' expression_statement expression_statement ')' statement",
        "iteration_statement : FOR '(' expression_statement expression_statement expression ')' statement",
        "iteration_statement : FOR '(' declaration expression_statement ')' statement",
        "iteration_statement : FOR '(' declaration expression_statement expression ')' statement",
        "jump_statement : GOTO IDENTIFIER ';'",
        "jump_statement : CONTINUE ';'",
        "jump_statement : BREAK ';'",
        "jump_statement : RETURN ';'",
        "jump_statement : RETURN expression ';'",
        "translation_unit : external_declaration",
        "translation_unit : translation_unit external_declaration",
        "external_declaration : function_definition",
        "external_declaration : declaration",
        "function_definition : declaration_specifiers declarator declaration_list compound_statement",
        "function_definition : declaration_specifiers declarator compound_statement",
        "declaration_list : declaration",
        "declaration_list : declaration_list declaration"
    );

    protected function initReduceCallbacks() {
        $this->reduceCallbacks = [
            0 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            1 => function ($stackPos) {
                 $this->semValue = new Node\Identifier($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            2 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            3 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            4 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(3-2)]; 
            },
            5 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            6 => function ($stackPos) {
                 $this->semValue = new Node\Scalar\INumber($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            7 => function ($stackPos) {
                 $this->semValue = new Node\Scalar\DNumber($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            8 => function ($stackPos) {
                 $this->semValue = new Node\Const_($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            9 => function ($stackPos) {
                 $this->semValue = new Node\Identifier($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); $this->scope->enum($this->semStack[$stackPos-(1-1)]); 
            },
            10 => function ($stackPos) {
                 $this->semValue = new Node\Scalar\String_($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            11 => function ($stackPos) {
                 $this->semValue = new Node\Identifier($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            12 => function ($stackPos) {
                 $this->semValue = new Node\Expr\Generic($this->semStack[$stackPos-(6-3)], $this->semStack[$stackPos-(6-5)], $this->startAttributeStack[$stackPos-(6-1)] + $this->endAttributes); 
            },
            13 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            14 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            15 => function ($stackPos) {
                 $this->semValue = new Node\Expr\GenericAssociation($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            16 => function ($stackPos) {
                 $this->semValue = new Node\Expr\GenericAssociation(null, $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            17 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            18 => function ($stackPos) {
                 $this->semValue = new Node\Expr\DimAccess($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            19 => function ($stackPos) {
                 $this->semValue = new Node\Expr\Call($this->semStack[$stackPos-(3-1)], [], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            20 => function ($stackPos) {
                 $this->semValue = new Node\Expr\Call($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            21 => function ($stackPos) {
                 $this->semValue = new Node\Expr\FieldAccess($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            22 => function ($stackPos) {
                 $this->semValue = new Node\Expr\FieldDereference($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            23 => function ($stackPos) {
                 $this->semValue = new Node\Expr\PostInc($this->semStack[$stackPos-(2-1)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            24 => function ($stackPos) {
                 $this->semValue = new Node\Expr\PostDec($this->semStack[$stackPos-(2-1)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            25 => function ($stackPos) {
                 $this->semValue = new Node\Expr\Initialize($this->semStack[$stackPos-(6-2)], $this->semStack[$stackPos-(6-5)], $this->startAttributeStack[$stackPos-(6-1)] + $this->endAttributes); 
            },
            26 => function ($stackPos) {
                 $this->semValue = new Node\Expr\Initialize($this->semStack[$stackPos-(7-2)], $this->semStack[$stackPos-(7-5)], $this->startAttributeStack[$stackPos-(7-1)] + $this->endAttributes); 
            },
            27 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            28 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            29 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            30 => function ($stackPos) {
                 $this->semValue = new Node\Expr\PreInc($this->semStack[$stackPos-(2-1)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            31 => function ($stackPos) {
                 $this->semValue = new Node\Expr\PreDec($this->semStack[$stackPos-(2-1)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            32 => function ($stackPos) {
                 $this->semValue = new Node\Expr\UnaryOp($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            33 => function ($stackPos) {
                 $this->semValue = new Node\Expr\SizeOf($this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            34 => function ($stackPos) {
                 $this->semValue = new Node\Expr\SizeOf($this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            35 => function ($stackPos) {
                 $this->semValue = new Node\Expr\AlignOf($this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            36 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            37 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            38 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            39 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            40 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            41 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            42 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            43 => function ($stackPos) {
                 $this->semValue = new Node\Expr\Cast($this->semStack[$stackPos-(4-2)], $this->semStack[$stackPos-(4-4)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            44 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            45 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\Mult($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            46 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\Div($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            47 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\Mod($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            48 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            49 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\Add($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            50 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\Sub($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            51 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            52 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\LeftShift($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            53 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\RightShift($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            54 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            55 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\LessThan($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            56 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\GreaterThan($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            57 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\LessThanOrEquals($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            58 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\GreaterThanOrEquals($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            59 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            60 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\Equals($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            61 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\NotEquals($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            62 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            63 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\BitwiseAnd($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            64 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            65 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\BitwiseXor($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            66 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            67 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\BitwiseOr($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            68 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            69 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\LogicalAnd($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            70 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            71 => function ($stackPos) {
                 $this->semValue = new Node\Expr\BinaryOp\LogicalOr($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            72 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            73 => function ($stackPos) {
                 $this->semValue = new Node\Expr\Ternary($this->semStack[$stackPos-(5-1)], $this->semStack[$stackPos-(5-3)], $this->semStack[$stackPos-(5-5)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            74 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            75 => function ($stackPos) {
                 $this->semValue = new Node\Expr\Assign($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-2)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            76 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            77 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            78 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            79 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            80 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            81 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            82 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            83 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            84 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            85 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            86 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            87 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            88 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            89 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            90 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\Declaration($this->semStack[$stackPos-(2-1)], null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            91 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\Declaration($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            92 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            93 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-2)][] = $this->semStack[$stackPos-(2-1)]; $this->semValue = $this->semStack[$stackPos-(2-2)]; 
            },
            94 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            95 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-2)][] = $this->semStack[$stackPos-(2-1)]; $this->semValue = $this->semStack[$stackPos-(2-2)]; 
            },
            96 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            97 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-2)][] = $this->semStack[$stackPos-(2-1)]; $this->semValue = $this->semStack[$stackPos-(2-2)]; 
            },
            98 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            99 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-2)][] = $this->semStack[$stackPos-(2-1)]; $this->semValue = $this->semStack[$stackPos-(2-2)]; 
            },
            100 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            101 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-2)][] = $this->semStack[$stackPos-(2-1)]; $this->semValue = $this->semStack[$stackPos-(2-2)]; 
            },
            102 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            103 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            104 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            105 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\InitDeclarator($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            106 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\InitDeclarator($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            107 => function ($stackPos) {
                 $this->semValue = new Node\Storage\Typedef($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            108 => function ($stackPos) {
                 $this->semValue = new Node\Storage\Extern($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            109 => function ($stackPos) {
                 $this->semValue = new Node\Storage\Static_($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            110 => function ($stackPos) {
                 $this->semValue = new Node\Storage\ThreadLocal($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            111 => function ($stackPos) {
                 $this->semValue = new Node\Storage\Auto($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            112 => function ($stackPos) {
                 $this->semValue = new Node\Storage\Register($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            113 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            114 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            115 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            116 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            117 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            118 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            119 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            120 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            121 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            122 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            123 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            124 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            125 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            126 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            127 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            128 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            129 => function ($stackPos) {
                 $this->semValue = new Node\Type\Complex($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            130 => function ($stackPos) {
                 $this->semValue = new Node\Type\Complex($this->semStack[$stackPos-(5-1)], $this->semStack[$stackPos-(5-4)], $this->semStack[$stackPos-(5-2)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            131 => function ($stackPos) {
                 $this->semValue = new Node\Type\Complex($this->semStack[$stackPos-(2-1)], null, $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            132 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            133 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            134 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            135 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            136 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Struct($this->semStack[$stackPos-(2-1)], [], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            137 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Struct($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            138 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            139 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-2)][] = $this->semStack[$stackPos-(2-1)]; $this->semValue = $this->semStack[$stackPos-(2-2)]; 
            },
            140 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            141 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-2)][] = $this->semStack[$stackPos-(2-1)]; $this->semValue = $this->semStack[$stackPos-(2-2)]; 
            },
            142 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            143 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            144 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            145 => function ($stackPos) {
                 $this->semValue = new Node\Declarator\Struct(null, $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            146 => function ($stackPos) {
                 $this->semValue = new Node\Declarator\Struct($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            147 => function ($stackPos) {
                 $this->semValue = new Node\Declarator\Struct($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            148 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Enum(null, $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            149 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Enum(null, $this->semStack[$stackPos-(5-3)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            150 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Enum($this->semStack[$stackPos-(5-2)], $this->semStack[$stackPos-(5-4)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            151 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Enum($this->semStack[$stackPos-(6-2)], $this->semStack[$stackPos-(6-4)], $this->startAttributeStack[$stackPos-(6-1)] + $this->endAttributes); 
            },
            152 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Enum($this->semStack[$stackPos-(2-2)], [], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            153 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            154 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            155 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\EnumValue($this->semStack[$stackPos-(3-1)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            156 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\EnumValue($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            157 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Atomic($this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            158 => function ($stackPos) {
                 $this->semValue = new Node\Qualifier\Const_($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            159 => function ($stackPos) {
                 $this->semValue = new Node\Qualifier\Restrict($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            160 => function ($stackPos) {
                 $this->semValue = new Node\Qualifier\Volatile($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            161 => function ($stackPos) {
                 $this->semValue = new Node\Qualifier\Restrict($this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            162 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            163 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            164 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\AlignAs($this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            165 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\AlignAs($this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            166 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Pointer($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            167 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            168 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Identifier($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            169 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(3-2)]; 
            },
            170 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Array_($this->semStack[$stackPos-(3-1)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            171 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            172 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            173 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            174 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            175 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            176 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            177 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            178 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            179 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Function_($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            180 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Function_($this->semStack[$stackPos-(3-1)], [], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            181 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Function_($this->semStack[$stackPos-(4-1)], $this->semStack[$stackPos-(4-3)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            182 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\QualifiedPointer($this->semStack[$stackPos-(3-2)], $this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            183 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\QualifiedPointer($this->semStack[$stackPos-(2-2)], null, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            184 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Pointer($this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            185 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Pointer(null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            186 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            187 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            188 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ParameterList($this->semStack[$stackPos-(3-1)], true, $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            189 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\ParameterList($this->semStack[$stackPos-(1-1)], false, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            190 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            191 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            192 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\Parameter($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], false, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            193 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\Parameter($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], true, $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            194 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\Parameter($this->semStack[$stackPos-(1-1)], null, false, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            195 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            196 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            197 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            198 => function ($stackPos) {
                 $this->semValue = new Node\Type($this->semStack[$stackPos-(1-1)], null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            199 => function ($stackPos) {
                 $this->semValue = new Node\Declaration\Pointer($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            200 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            201 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            202 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            203 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            204 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            205 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            206 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            207 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            208 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            209 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            210 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            211 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            212 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            213 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            214 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            215 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            216 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            217 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            218 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            219 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            220 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            221 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            222 => function ($stackPos) {
                $this->semValue = $this->semStack[$stackPos];
            },
            223 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(3-2)]; 
            },
            224 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(4-2)]; 
            },
            225 => function ($stackPos) {
                 $this->semValue = array(new Node\Stmt\Expr($this->semStack[$stackPos-(1-1)], $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes)); 
            },
            226 => function ($stackPos) {
                 $this->semValue = array(new Node\Stmt\Initializer($this->semStack[$stackPos-(2-1)], $this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes)); 
            },
            227 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            228 => function ($stackPos) {
                 $this->semStack[$stackPos-(4-1)][] = new Node\Stmt\Initializer($this->semStack[$stackPos-(4-3)], 4, $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); $this->semValue = $this->semStack[$stackPos-(4-1)]; 
            },
            229 => function ($stackPos) {
                 $this->semStack[$stackPos-(3-1)][] = $this->semStack[$stackPos-(3-3)]; $this->semValue = $this->semStack[$stackPos-(3-1)]; 
            },
            230 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            231 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            232 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            233 => function ($stackPos) {
                 $this->semValue = new Node\Designator\DimAccess($this->semStack[$stackPos-(3-2)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            234 => function ($stackPos) {
                 $this->semValue = new Node\Designator\FieldAccess($this->semStack[$stackPos-(2-2)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            235 => function ($stackPos) {
                 $this->semValue = new Node\Assert($this->semStack[$stackPos-(7-3)], $this->semStack[$stackPos-(7-5)], $this->startAttributeStack[$stackPos-(7-1)] + $this->endAttributes); 
            },
            236 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            237 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            238 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            239 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            240 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            241 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            242 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\Label($this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            243 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\Case_($this->semStack[$stackPos-(4-2)], $this->semStack[$stackPos-(4-4)], $this->startAttributeStack[$stackPos-(4-1)] + $this->endAttributes); 
            },
            244 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\Default_($this->semStack[$stackPos-(3-3)], $this->startAttributeStack[$stackPos-(3-1)] + $this->endAttributes); 
            },
            245 => function ($stackPos) {
                 $this->semValue = null; 
            },
            246 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(3-2)]; 
            },
            247 => function ($stackPos) {
                 $this->semValue = array($this->semStack[$stackPos-(1-1)]); 
            },
            248 => function ($stackPos) {
                 $this->semStack[$stackPos-(2-1)][] = $this->semStack[$stackPos-(2-2)]; $this->semValue = $this->semStack[$stackPos-(2-1)]; 
            },
            249 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            250 => function ($stackPos) {
                 $this->semValue = $this->semStack[$stackPos-(1-1)]; 
            },
            251 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\Expr(null, $this->startAttributeStack[$stackPos-(1-1)] + $this->endAttributes); 
            },
            252 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\Expr($this->semStack[$stackPos-(2-1)], $this->startAttributeStack[$stackPos-(2-1)] + $this->endAttributes); 
            },
            253 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\If_($this->semStack[$stackPos-(7-3)], $this->semStack[$stackPos-(7-5)], $this->semStack[$stackPos-(7-7)], $this->startAttributeStack[$stackPos-(7-1)] + $this->endAttributes); 
            },
            254 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\If_($this->semStack[$stackPos-(5-3)], $this->semStack[$stackPos-(5-5)], null, $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            255 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\Switch_($this->semStack[$stackPos-(5-3)], $this->semStack[$stackPos-(5-5)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            256 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\While_($this->semStack[$stackPos-(5-3)], $this->semStack[$stackPos-(5-5)], $this->startAttributeStack[$stackPos-(5-1)] + $this->endAttributes); 
            },
            257 => function ($stackPos) {
                 $this->semValue = new Node\Stmt\DoWhile($this->semStack[$stackPos-(7-2)], $