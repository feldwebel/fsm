<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Requests\CoinRequest;
use Requests\PassThroughRequest;
use Responses\AlarmResponse;
use Responses\ClosedResponse;
use Responses\OpenedResponse;
use Turnstile;

class TurnstileStateSwitchingTest extends TestCase
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

    /**
     * @test
     */
    public function opened2Closed()
    {
        $device = Turnstile::opened();

        $this->assertInstanceOf(ClosedResponse::class, $device->operate(new PassThroughRequest()));
    }

    /**
     * @test
     */
    public function alarm2Opened()
    {
        $device = Turnstile::alarm();

        $this->assertInstanceOf(OpenedResponse::class, $device->operate(new CoinRequest()));
    }
}