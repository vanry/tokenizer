<?php

namespace Vanry\Tokenizer;

abstract class Tokenizer implements TokenizerInterface
{
    public function tokenize(string $text, array $stopwords = [])
    {
        $tokens = $this->getTokens($text);

        $tokens = array_filter($tokens, 'trim');

        return array_diff($tokens, $stopwords);
    }

    abstract protected function getTokens(string $text);
}
