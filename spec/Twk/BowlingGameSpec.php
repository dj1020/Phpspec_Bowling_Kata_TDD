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
        for ($i = 1; $i <= 20; $i++) {
            $this->roll(0);
        }

        $this->score()->shouldReturn(0);
    }
}
