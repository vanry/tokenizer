<?php

namespace Vanry\Tokenizer;

use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\Jieba;

class JiebaTokenizer extends Tokenizer
{
    protected $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;

        Jieba::init($config);

        Finalseg::init($config);

        if (isset($config['user_dict'])) {
            Jieba::loadUserDict($config['user_dict']);
        }
    }

    protected function getTokens(string $text)
    {
        $tokens = ($this->config['search'] ?? false) ? Jieba::cutForSearch($text) : Jieba::cut($text);

        if ($this->config['ignore'] ?? false) {
            $tokens = array_filter($tokens, function ($token) {
                return ! preg_match('/^(\p{P})+$/u', $token);
            });
        }

        return $tokens;
    }
}
