<?php

namespace Twk;

class BowlingGame
{
    private $score = 0;
    private $rolls = [];
    private $rollIndex = 0;

    public function roll($pins)
    {
        $this->rolls[$this->rollIndex] = $pins;
        $this->rollIndex ++;
    }

    public function score()
    {
        $this->score = 0;
        for ($i = 0; $i < count($this->rolls); $i ++) {
            if ( $i >= 2
                && $this->rolls[$i - 1] + $this->rolls[$i - 2] == 10
            ) {
                $this->score += $this->rolls[$i];
            }

            $this->score += $this->rolls[$i];
        }

        return $this->score;
    }
}
