<?php
$meta #
#semval($) $this->semValue
#semval($,%t) $this->semValue
#semval(%n) $this->stackPos-(%l-%n)
#semval(%n,%t) $this->stackPos-(%l-%n)

namespace FFIMe;
#include;

/* GENERATED file based on grammar/grammar.y */
final class CTokens
{
#tokenval
    const T_%s = %n;
#endtokenval
}