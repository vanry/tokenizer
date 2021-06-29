<?php

namespace Vanry\Tokenizer;

interface TokenizerInterface
{
    public function tokenize(string $text, array $stopwords);
}
