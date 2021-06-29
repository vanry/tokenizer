<?php

namespace Vanry\Tokenizer;

use SimpleCWS;

class ScwsTokenizer extends Tokenizer
{
    protected $scws;

    public function __construct(SimpleCWS $scws)
    {
        $this->scws = $scws;
    }

    protected function getTokens(string $text)
    {
        $this->scws->send_text($text);

        $tokens = [];

        while ($result = $this->scws->get_result()) {
            $tokens = array_merge($tokens, array_column($result, 'word'));
        }

        return $tokens;
    }
}
