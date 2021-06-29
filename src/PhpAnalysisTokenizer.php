<?php

namespace Vanry\Tokenizer;

use Phpanalysis\Phpanalysis;

class PhpAnalysisTokenizer extends Tokenizer
{
    protected $phpanalysis;

    public function __construct(Phpanalysis $phpanalysis)
    {
        $this->phpanalysis = $phpanalysis;
    }

    protected function getTokens(string $text)
    {
        $this->phpanalysis->SetSource($text);

        $this->phpanalysis->StartAnalysis();

        return explode(' ', $this->phpanalysis->GetFinallyResult());
    }
}
