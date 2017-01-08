<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Requests\CoinRequest;
use Requests\PassThroughRequest;
use Responses\AlarmResponse;
use Responses\OpenedResponse;
use Turnstile;

class TurnstileTest extends TestCase
{

    /**
     * @test
     */
    public function closed2Opened()
    {
        $device = Turnstile::closed();

        $this->assertInstanceOf(OpenedResponse::class, $device->operate(new CoinRequest()));
    }

    /**
     * @test
     */
    public function closed2Alarm()
    {
        $device = Turnstile::closed();

        $this->assertInstanceOf(AlarmResponse::class, $device->operate(new PassThroughRequest()));
    }

    public function mainScenario()
    {

    }
}