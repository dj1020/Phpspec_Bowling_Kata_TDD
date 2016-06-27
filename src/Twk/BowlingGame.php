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
        $frame = 0;
        $i = 0;
        for ($frame = 0; $frame < 10; $frame ++) {
            if ( $this->rolls[$i] + $this->rolls[$i + 1] == 10) {
                $this->score += 10 + $this->rolls[$i + 2];
                $i += 2;
            } else {
                $this->score += $this->rolls[$i] + $this->rolls[$i + 1];
                $i += 2;
            }
        }

        return $this->score;
    }
}
