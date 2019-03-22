%pure_parser
%expect 2


%token  IDENTIFIER I_CONSTANT F_CONSTANT STRING_LITERAL FUNC_NAME SIZEOF
%token  PTR_OP INC_OP DEC_OP LEFT_OP RIGHT_OP LE_OP GE_OP EQ_OP NE_OP
%token  AND_OP OR_OP MUL_ASSIGN DIV_ASSIGN MOD_ASSIGN ADD_ASSIGN
%token  SUB_ASSIGN LEFT_ASSIGN RIGHT_ASSIGN AND_ASSIGN
%token  XOR_ASSIGN OR_ASSIGN
%token  TYPEDEF_NAME ENUMERATION_CONSTANT

%token  TYPEDEF EXTERN STATIC AUTO REGISTER INLINE
%token  CONST RESTRICT VOLATILE
%token  BOOL CHAR SHORT INT LONG SIGNED UNSIGNED FLOAT DOUBLE VOID
%token  COMPLEX IMAGINARY 
%token  STRUCT UNION ENUM ELLIPSIS

%token  CASE DEFAULT IF ELSE SWITCH WHILE DO FOR GOTO CONTINUE BREAK RETURN

%token  ALIGNAS ALIGNOF ATOMIC GENERIC NORETURN STATIC_ASSERT THREAD_LOCAL

%start translation_unit
%%

primary_expression
    : IDENTIFIER            { $$ = Node\Identifier[$1]; }
    | constant              { $$ = $1; }
    | string                { $$ = $1; }
    | '(' expression ')'    { $$ = $2; }
    | generic_selection     { $$ = $1; }
    ;

constant
    : I_CONSTANT            { $$ = Node\Scalar\INumber[$1]; } /* includes character_constant */
    | F_CONSTANT            { $$ = Node\Scalar\DNumber[$1]; }
    | ENUMERATION_CONSTANT  { $$ = Node\Const_[$1]; }/* after it has been defined as such */
    ;

enumeration_constant        /* before it has been defined as such */
    : IDENTIFIER            { $$ = Node\Identifier[$1]; $this->scope->enum($1); }
    ;

string
    : STRING_LITERAL        { $$ = Node\Scalar\String_[$1]; }
    | FUNC_NAME             { $$ = Node\Identifier[$1]; }
    ;

generic_selection
    : GENERIC '(' assignment_expression ',' generic_assoc_list ')'  { $$ = Node\Expr\Generic[$3, $5]; }
    ;

generic_assoc_list
    : generic_association                           { init($1); }
    | generic_assoc_list ',' generic_association    { push($1, $3); }
    ;

generic_association
    : type_name ':' assignment_expression           { $$ = Node\Expr\GenericAssociation[$1, $3]; }
    | DEFAULT ':' assignment_expression             { $$ = Node\Expr\GenericAssociation[null, $3]; }
    ;

postfix_expression
    : primary_expression                                   { $$ = $1; }
    | postfix_expression '[' expression ']'                { $$ = Node\Expr\DimAccess[$1, $3]; }
    | postfix_expression '(' ')'                           { $$ = Node\Expr\Call[$1, []]; }
    | postfix_expression '(' argument_expression_list ')'  { $$ = Node\Expr\Call[$1, $3]; }
    | postfix_expression '.' IDENTIFIER                    { $$ = Node\Expr\FieldAccess[$1, $3]; }
    | postfix_expression PTR_OP IDENTIFIER                 { $$ = Node\Expr\FieldDereference[$1, $3]; }
    | postfix_expression INC_OP                            { $$ = Node\Expr\PostInc[$1]; }
    | postfix_expression DEC_OP                            { $$ = Node\Expr\PostDec[$1]; }
    | '(' type_name ')' '{' initializer_list '}'           { $$ = Node\Expr\Initialize[$2, $5]; }
    | '(' type_name ')' '{' initializer_list ',' '}'       { $$ = Node\Expr\Initialize[$2, $5]; }
    ;

argument_expression_list
    : assignment_expression                                { init($1); }
    | argument_expression_list ',' assignment_expression   { push($1, $3); }
    ;

unary_expression
    : postfix_expression                { $$ = $1; }
    | INC_OP unary_expression           { $$ = Node\Expr\PreInc[$1]; }
    | DEC_OP unary_expression           { $$ = Node\Expr\PreDec[$1]; }
    | unary_operator cast_expression    { $$ = Node\Expr\UnaryOp[$1, $2]; }
    | SIZEOF unary_expression           { $$ = Node\Expr\SizeOf[$2]; }
    | SIZEOF '(' type_name ')'          { $$ = Node\Expr\SizeOf[$3]; }
    | ALIGNOF '(' type_name ')'         { $$ = Node\Expr\AlignOf[$3]; }
    ;

unary_operator
    : '&'       { $$ = $1; }
    | '*'       { $$ = $1; }
    | '+'       { $$ = $1; }
    | '-'       { $$ = $1; }
    | '~'       { $$ = $1; }
    | '!'       { $$ = $1; }
    ;

cast_expression
    : unary_expression                      { $$ = $1; }
    | '(' type_name ')' cast_expression     { $$ = Node\Expr\Cast[$2, $4]; }
    ;

multiplicative_expression
    : cast_expression                                   { $$ = $1; }
    | multiplicative_expression '*' cast_expression     { $$ = Node\Expr\BinaryOp\Mult[$1, $3]; }
    | multiplicative_expression '/' cast_expression     { $$ = Node\Expr\BinaryOp\Div[$1, $3]; }
    | multiplicative_expression '%' cast_expression     { $$ = Node\Expr\BinaryOp\Mod[$1, $3]; }
    ;

additive_expression
    : multiplicative_expression                             { $$ = $1; }
    | additive_expression '+' multiplicative_expression     { $$ = Node\Expr\BinaryOp\Add[$1, $3]; }
    | additive_expression '-' multiplicative_expression     { $$ = Node\Expr\BinaryOp\Sub[$1, $3]; }
    ;

shift_expression
    : additive_expression                               { $$ = $1; }
    | shift_expression LEFT_OP additive_expression      { $$ = Node\Expr\BinaryOp\LeftShift[$1, $3]; }
    | shift_expression RIGHT_OP additive_expression     { $$ = Node\Expr\BinaryOp\RightShift[$1, $3]; }
    ;

relational_expression
    : shift_expression                                  { $$ = $1; }
    | relational_expression '<' shift_expression        { $$ = Node\Expr\BinaryOp\LessThan[$1, $3]; }
    | relational_expression '>' shift_expression        { $$ = Node\Expr\BinaryOp\GreaterThan[$1, $3]; }
    | relational_expression LE_OP shift_expression      { $$ = Node\Expr\BinaryOp\LessThanOrEquals[$1, $3]; }
    | relational_expression GE_OP shift_expression      { $$ = Node\Expr\BinaryOp\GreaterThanOrEquals[$1, $3]; }
    ;

equality_expression
    : relational_expression                             { $$ = $1; }
    | equality_expression EQ_OP relational_expression   { $$ = Node\Expr\BinaryOp\Equals[$1, $3]; }
    | equality_expression NE_OP relational_expression   { $$ = Node\Expr\BinaryOp\NotEquals[$1, $3]; }
    ;

and_expression
    : equality_expression                       { $$ = $1; }
    | and_expression '&' equality_expression    { $$ = Node\Expr\BinaryOp\BitwiseAnd[$1, $3]; }
    ;

exclusive_or_expression
    : and_expression                                { $$ = $1; }
    | exclusive_or_expression '^' and_expression    { $$ = Node\Expr\BinaryOp\BitwiseXor[$1, $3]; }
    ;

inclusive_or_expression
    : exclusive_or_expression                               { $$ = $1; }
    | inclusive_or_expression '|' exclusive_or_expression   { $$ = Node\Expr\BinaryOp\BitwiseOr[$1, $3]; }
    ;

logical_and_expression
    : inclusive_or_expression                                   { $$ = $1; }
    | logical_and_expression AND_OP inclusive_or_expression     { $$ = Node\Expr\BinaryOp\LogicalAnd[$1, $3]; }
    ;

logical_or_expression
    : logical_and_expression                                { $$ = $1; }
    | logical_or_expression OR_OP logical_and_expression    { $$ = Node\Expr\BinaryOp\LogicalOr[$1, $3]; }
    ;

conditional_expression
    : logical_or_expression                                             { $$ = $1; }
    | logical_or_expression '?' expression ':' conditional_expression   { $$ = Node\Expr\Ternary[$1, $3, $5]; }
    ;

assignment_expression
    : conditional_expression                                        { $$ = $1; }
    | unary_expression assignment_operator assignment_expression    { $$ = Node\Expr\Assign[$1, $2, $3]; }
    ;

assignment_operator
    : '='           { $$ = $1; }
    | MUL_ASSIGN    { $$ = $1; }
    | DIV_ASSIGN    { $$ = $1; }
    | MOD_ASSIGN    { $$ = $1; }
    | ADD_ASSIGN    { $$ = $1; }
    | SUB_ASSIGN    { $$ = $1; }
    | LEFT_ASSIGN   { $$ = $1; }
    | RIGHT_ASSIGN  { $$ = $1; }
    | AND_ASSIGN    { $$ = $1; }
    | XOR_ASSIGN    { $$ = $1; }
    | OR_ASSIGN     { $$ = $1; }
    ;

expression
    : assignment_expression                     { $$ = $1; }
    | expression ',' assignment_expression      
    ;

constant_expression
    : conditional_expression                   { $$ = $1; } /* with constraints */
    ;

declaration
    : declaration_specifiers ';'                        { $$ = Node\Stmt\Declaration[$1, null]; }
    | declaration_specifiers init_declarator_list ';'   { $$ = Node\Stmt\Declaration[$1, $2]; }
    | static_assert_declaration                         { $$ = $1; }
    ;

declaration_specifiers
    : storage_class_specifier declaration_specifiers    { push($2, $1); }
    | storage_class_specifier                           { init($1); }
    | type_specifier declaration_specifiers             { push($2, $1); }
    | type_specifier                                    { init($1); }
    | type_qualifier declaration_specifiers             { push($2, $1); }
    | type_qualifier                                    { init($1); }
    | function_specifier declaration_specifiers         { push($2, $1); }
    | function_specifier                                { init($1); }
    | alignment_specifier declaration_specifiers        { push($2, $1); }
    | alignment_specifier                               { init($1); }
    ;

init_declarator_list
    : init_declarator                               { init($1); }
    | init_declarator_list ',' init_declarator      { push($1, $3); }
    ;

init_declarator
    : declarator '=' initializer                    { $$ = Node\Stmt\InitDeclarator[$1, $3]; }
    | declarator                                    { $$ = Node\Stmt\InitDeclarator[$1, null]; }
    ; 

storage_class_specifier
    : TYPEDEF               { $$ = $1; } /* identifiers must be flagged as TYPEDEF_NAME */
    | EXTERN                { $$ = $1; }
    | STATIC                { $$ = $1; }
    | THREAD_LOCAL          { $$ = $1; }
    | AUTO                  { $$ = $1; }
    | REGISTER              { $$ = $1; }
    ;

type_specifier
    : VOID                          { $$ = Node\Type[$1]; }
    | CHAR                          { $$ = Node\Type[$1]; }
    | SHORT                         { $$ = Node\Type[$1]; }
    | INT                           { $$ = Node\Type[$1]; }
    | LONG                          { $$ = Node\Type[$1]; }
    | FLOAT                         { $$ = Node\Type[$1]; }
    | DOUBLE                        { $$ = Node\Type[$1]; }
    | SIGNED                        { $$ = Node\Type[$1]; }
    | UNSIGNED                      { $$ = Node\Type[$1]; }
    | BOOL                          { $$ = Node\Type[$1]; }
    | COMPLEX                       { $$ = Node\Type[$1]; }
    | IMAGINARY                     { $$ = Node\Type[$1]; } /* non-mandated extension */
    | atomic_type_specifier         { $$ = $1; }
    | struct_or_union_specifier     { $$ = $1; }
    | enum_specifier                { $$ = $1; }
    | TYPEDEF_NAME                  { $$ = Node\Type[$1]; } /* after it has been defined as such */
    ;

struct_or_union_specifier
    : struct_or_union '{' struct_declaration_list '}'               { $$ = Node\Type\Complex[$1, $3]; }
    | struct_or_union IDENTIFIER '{' struct_declaration_list '}'    { $$ = Node\Type\Complex[$1, $4, $2]; }
    | struct_or_union IDENTIFIER                                    { $$ = Node\Type\Complex[$1, null, $2]; }
    ;

struct_or_union
    : STRUCT        { $$ = $1; }
    | UNION         { $$ = $1; }
    ;

struct_declaration_list
    : struct_declaration                            { init($1); }
    | struct_declaration_list struct_declaration    { push($1, $2); }
    ;

struct_declaration
    : specifier_qualifier_list ';'                          { $$ = Node\Declaration\Struct[$1, []]; } /* for anonymous struct/union */
    | specifier_qualifier_list struct_declarator_list ';'   { $$ = Node\Declaration\Struct[$1, $2]; }
    | static_assert_declaration                             { $$ = $1; }
    ;

specifier_qualifier_list                        
    : type_specifier specifier_qualifier_list   { push($2, $1); }
    | type_specifier                            { init($1); }
    | type_qualifier specifier_qualifier_list   { push($2, $1); }
    | type_qualifier                            { init($1); }
    ;

struct_declarator_list
    : struct_declarator                             { init($1); }
    | struct_declarator_list ',' struct_declarator  { push($1, $3); }
    ;

struct_declarator
    : ':' constant_expression               { $$ = Node\Declarator\Struct[null, $2]; }
    | declarator ':' constant_expression    { $$ = Node\Declarator\Struct[$1, $3]; }
    | declarator                            { $$ = Node\Declarator\Struct[$1, null]; }
    ;

enum_specifier
    : ENUM '{' enumerator_list '}'                  { $$ = Node\Declaration\Enum[null, $3]; }
    | ENUM '{' enumerator_list ',' '}'              { $$ = Node\Declaration\Enum[null, $3]; }
    | ENUM IDENTIFIER '{' enumerator_list '}'       { $$ = Node\Declaration\Enum[$2, $4]; }
    | ENUM IDENTIFIER '{' enumerator_list ',' '}'   { $$ = Node\Declaration\Enum[$2, $4]; }
    | ENUM IDENTIFIER                               { $$ = Node\Declaration\Enum[$2, []]; }
    ;

enumerator_list
    : enumerator                        { init($1); }
    | enumerator_list ',' enumerator    { push($1, $3); }
    ;

enumerator  /* identifiers must be flagged as ENUMERATION_CONSTANT */
    : enumeration_constant '=' constant_expression      { $$ = Node\Declaration\EnumValue[$1, $3]; }
    | enumeration_constant                              { $$ = Node\Declaration\EnumValue[$1, null]; }
    ;

atomic_type_specifier
    : ATOMIC '(' type_name ')'          { $$ = Node\Declaration\Atomic[$3]; }
    ;

type_qualifier
    : CONST         { $$ = $1; }
    | RESTRICT      { $$ = $1; }
    | VOLATILE      { $$ = $1; }
    | ATOMIC        { $$ = $1; }
    ;

function_specifier
    : INLINE        { $$ = $1; }
    | NORETURN      { $$ = $1; }
    ;

alignment_specifier
    : ALIGNAS '(' type_name ')'             { $$ = Node\Declaration\AlignAs[$3]; }
    | ALIGNAS '(' constant_expression ')'   { $$ = Node\Declaration\AlignAs[$3]; }
    ;

declarator
    : pointer direct_declarator     { $$ = Node\Declaration\Pointer[$1, $2]; }
    | direct_declarator             { $$ = $1; }
    ;

direct_declarator
    : IDENTIFIER                                                                    { $$ = Node\Declaration\Identifier[$1]; }
    | '(' declarator ')'                                                            { $$ = $2; }
    | direct_declarator '[' ']'                                                     { $$ = Node\Declaration\Array_[$1]; }
    | direct_declarator '[' '*' ']'                                                 
    | direct_declarator '[' STATIC type_qualifier_list assignment_expression ']'
    | direct_declarator '[' STATIC assignment_expression ']'
    | direct_declarator '[' type_qualifier_list '*' ']'
    | direct_declarator '[' type_qualifier_list STATIC assignment_expression ']'
    | direct_declarator '[' type_qualifier_list assignment_expression ']'
    | direct_declarator '[' type_qualifier_list ']'
    | direct_declarator '[' assignment_expression ']'
    | direct_declarator '(' parameter_type_list ')'
    | direct_declarator '(' ')'
    | direct_declarator '(' identifier_list ')'
    ;

pointer
    : '*' type_qualifier_list pointer       { $$ = Node\Declaration\QualifiedPointer[$2, $3]; }
    | '*' type_qualifier_list               { $$ = Node\Declaration\QualifiedPointer[$2, null]; }
    | '*' pointer                           { $$ = Node\Declaration\Pointer[$2]; }
    | '*'                                   { $$ = Node\Declaration\Pointer[null]; }
    ;

type_qualifier_list
    : type_qualifier                        { init($1); }
    | type_qualifier_list type_qualifier    { push($1, $2); }
    ;


parameter_type_list
    : parameter_list ',' ELLIPSIS       { $$ = Node\Stmt\ParameterList[$1, true]; }
    | parameter_list                    { $$ = Node\Stmt\ParameterList[$1, false]; }
    ;

parameter_list
    : parameter_declaration                     { init($1); }
    | parameter_list ',' parameter_declaration  { push($1, $3); }
    ;

parameter_declaration
    : declaration_specifiers declarator             { $$ = Node\Stmt\Parameter[$1, $2, false]; }
    | declaration_specifiers abstract_declarator    { $$ = Node\Stmt\Parameter[$1, $2, true]; }
    | declaration_specifiers                        { $$ = Node\Stmt\Parameter[$1, null, false]; }
    ;

identifier_list
    : IDENTIFIER                        { init($1); }
    | identifier_list ',' IDENTIFIER    { push($1, $3); }
    ;

type_name
    : specifier_qualifier_list abstract_declarator  { $$ = Node\Type[$1, $2]; }
    | specifier_qualifier_list                      { $$ = Node\Type[$1, null]; }
    ;

abstract_declarator
    : pointer direct_abstract_declarator    { $$ = Node\Declaration\Pointer[$1, $2]; }
    | pointer                               { $$ = $1; }
    | direct_abstract_declarator            { $$ = $1; }
    ;

direct_abstract_declarator
    : '(' abstract_declarator ')'
    | '[' ']'
    | '[' '*' ']'
    | '[' STATIC type_qualifier_list assignment_expression ']'
    | '[' STATIC assignment_expression ']'
    | '[' type_qualifier_list STATIC assignment_expression ']'
    | '[' type_qualifier_list assignment_expression ']'
    | '[' type_qualifier_list ']'
    | '[' assignment_expression ']'
    | direct_abstract_declarator '[' ']'
    | direct_abstract_declarator '[' '*' ']'
    | direct_abstract_declarator '[' STATIC type_qualifier_list assignment_expression ']'
    | direct_abstract_declarator '[' STATIC assignment_expression ']'
    | direct_abstract_declarator '[' type_qualifier_list assignment_expression ']'
    | direct_abstract_declarator '[' type_qualifier_list STATIC assignment_expression ']'
    | direct_abstract_declarator '[' type_qualifier_list ']'
    | direct_abstract_declarator '[' assignment_expression ']'
    | '(' ')'
    | '(' parameter_type_list ')'
    | direct_abstract_declarator '(' ')'
    | direct_abstract_declarator '(' parameter_type_list ')'
    ;

initializer
    : '{' initializer_list '}'      { $$ = $2; }
    | '{' initializer_list ',' '}'  { $$ = $2; }
    | assignment_expression         { init(Node\Stmt\Expr[$1]); }
    ;

initializer_list
    : designation initializer                           { init(Node\Stmt\Initializer[$1, $2]); }
    | initializer                                       { init($1); }
    | initializer_list ',' designation initializer      { push($1, Node\Stmt\Initializer[$3, 4]); }
    | initializer_list ',' initializer                  { push($1, $3); }
    ;

designation
    : designator_list '='       { $$ = $1; }
    ;

designator_list
    : designator                    { init($1); }
    | designator_list designator    { push($1, $2); }
    ;

designator
    : '[' constant_expression ']'   { $$ = Node\Designator\DimAccess[$2]; }
    | '.' IDENTIFIER                { $$ = Node\Designator\FieldAccess[$2]; }
    ;

static_assert_declaration
    : STATIC_ASSERT '(' constant_expression ',' STRING_LITERAL ')' ';'      { $$ = Node\Assert[$3, $5]; }
    ;

statement
    : labeled_statement     { $$ = $1; }
    | compound_statement    { $$ = $1; }
    | expression_statement  { $$ = $1; }
    | selection_statement   { $$ = $1; }
    | iteration_statement   { $$ = $1; }
    | jump_statement        { $$ = $1; }
    ;

labeled_statement
    : IDENTIFIER ':' statement                  { $$ = Node\Stmt\Label[$3]; }
    | CASE constant_expression ':' statement    { $$ = Node\Stmt\Case_[$2, $4]; }
    | DEFAULT ':' statement                     { $$ = Node\Stmt\Default_[$3]; }
    ;

compound_statement
    : '{' '}'                   { $$ = null; }
    | '{'  block_item_list '}'  { $$ = $2; }
    ;

block_item_list
    : block_item                    { init($1); }
    | block_item_list block_item    { push($1, $2); }
    ;

block_item
    : declaration           { $$ = $1; }
    | statement             { $$ = $1; }
    ;

expression_statement
    : ';'                   { $$ = Node\Stmt\Expr[null]; }
    | expression ';'        { $$ = Node\Stmt\Expr[$1]; }
    ;

selection_statement
    : IF '(' expression ')' statement ELSE statement    { $$ = Node\Stmt\If_[$3, $5, $7]; }
    | IF '(' expression ')' statement                   { $$ = Node\Stmt\If_[$3, $5, null]; }
    | SWITCH '(' expression ')' statement               { $$ = Node\Stmt\Switch_[$3, $5]; }
    ;

iteration_statement
    : WHILE '(' expression ')' statement                                            { $$ = Node\Stmt\While_[$3, $5]; }
    | DO statement WHILE '(' expression ')' ';'                                     { $$ = Node\Stmt\DoWhile[$2, $5]; }
    | FOR '(' expression_statement expression_statement ')' statement               { $$ = Node\Stmt\For_[$3, $4, null, $6]; }
    | FOR '(' expression_statement expression_statement expression ')' statement    { $$ = Node\Stmt\For_[$3, $4, $5, $7]; }
    | FOR '(' declaration expression_statement ')' statement                        { $$ = Node\Stmt\For_[$3, $4, null, $6]; }
    | FOR '(' declaration expression_statement expression ')' statement             { $$ = Node\Stmt\For_[$3, $4, $5, $7]; }
    ;

jump_statement
    : GOTO IDENTIFIER ';'       { $$ = Node\Stmt\Goto_[$1]; }
    | CONTINUE ';'              { $$ = Node\Stmt\Continue_[]; }
    | BREAK ';'                 { $$ = Node\Stmt\Break_[]; }
    | RETURN ';'                { $$ = Node\Stmt\Return_[null]; }
    | RETURN expression ';'     { $$ = Node\Stmt\Return_[$1]; }
    ;

translation_unit
    : external_declaration                      { init($1); }
    | translation_unit external_declaration     { push ($1, $2); }
    ;

external_declaration
    : function_definition   { $$ = $1; }
    | declaration           { $$ = $1; }
    ;

function_definition
    : declaration_specifiers declarator declaration_list compound_statement     { $$ = Node\Stmt\Function_[$1, $2, $3, $4]; }
    | declaration_specifiers declarator compound_statement                      { $$ = Node\Stmt\Function_[$1, $2, null, $3]; }
    ;

declaration_list
    : declaration                   { init($1); }
    | declaration_list declaration  { push($1, $2); }
    ;

%%