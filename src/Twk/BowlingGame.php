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
        $frameIndex = 0;
        for ($frame = 0; $frame < 10; $frame ++) {
            if ( $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] == 10) {
                $this->score += 10 + $this->rolls[$frameIndex + 2];
            } else {
                $this->score += $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
            }
            $frameIndex += 2;
        }

        return $this->score;
    }
}
