<?php

namespace spec\Twk;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Twk\BowlingGame');
    }

    public function it_should_score_0()
    {
        $this->rollMany(0, 20);

        $this->score()->shouldReturn(0);
    }

    public function it_should_score_20()
    {
        $this->rollMany(1, 20);

        $this->score()->shouldReturn(20);
    }

    public function it_should_score_14_with_one_spare()
    {
        $this->roll(2);
        $this->roll(8);
        $this->roll(2);
        $this->rollMany(0, 17);

        $this->score()->shouldReturn(14);
    }

    public function it_should_score_19_with_one_spare()
    {
        $this->rollSpare();
        $this->roll(2);
        $this->roll(5);
        $this->rollMany(0, 16);

        $this->score()->shouldReturn(19);
    }

    public function it_should_score_24_with_one_strike()
    {
        $this->rollStrike();
        $this->roll(3);
        $this->roll(4);
        $this->rollMany(0, 16);

        $this->score()->shouldReturn(24);
    }

    public function it_should_score_300_as_a_perfect_game()
    {
        $this->rollMany(10, 12);

        $this->score()->shouldReturn(300);
    }

    public function it_should_score_267()
    {
        $this->rollMany(10, 9);
        $this->rollSpare();
        $this->roll(5);

        $this->score()->shouldReturn(267);
    }

    private function rollMany($pins, $times) {
        for ($i = 1; $i <= $times; $i++) {
            $this->roll($pins);
        }
    }

    private function rollSpare()
    {
        $this->roll(2);
        $this->roll(8);
    }

    private function rollStrike()
    {
        $this->roll(10);
    }

}
