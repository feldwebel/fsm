<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Requests\CoinRequest;
use Requests\PassThroughRequest;
use Responses\AlarmResponse;
use Responses\ClosedResponse;
use Responses\OpenedResponse;
use Turnstile;

class UserScenarioTest extends TestCase
{
    /**
     * @test
     */
    public function mainSuccessScenario()
    {
        $device = Turnstile::closed();

        $this->assertInstanceOf(OpenedResponse::class, $device->operate(new CoinRequest()));
        $this->assertInstanceOf(ClosedResponse::class, $device->operate(new PassThroughRequest()));
    }

    /**
     * @test
     */
    public function raisingAnAlarmScenario()
    {
        $device = Turnstile::closed();

        $this->assertInstanceOf(AlarmResponse::class, $device->operate(new PassThroughRequest()));
        $this->assertInstanceOf(OpenedResponse::class, $device->operate(new CoinRequest()));
    }

    /**
     * @test
     */
    public function gracefullyEatingMoney()
    {
        $device = Turnstile::closed();

        $this->assertInstanceOf(OpenedResponse::class, $device->operate(new CoinRequest()));
        $this->assertInstanceOf(OpenedResponse::class, $device->operate(new CoinRequest()));
        $this->assertInstanceOf(ClosedResponse::class, $device->operate(new PassThroughRequest()));
    }
}