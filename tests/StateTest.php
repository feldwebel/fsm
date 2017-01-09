<?php

namespace Tests;


use PHPUnit\Framework\TestCase;
use Requests\BaseRequest;
use Requests\CoinRequest;
use Requests\PassThroughRequest;
use States\AlarmState;
use States\ClosedState;
use States\IState;
use States\OpenedState;

class StateTest extends TestCase
{
    private $states = [];
    private $requests = [];

    /**
     * @param IState $state
     * @param BaseRequest $request
     * @param string $newState
     *
     * @test
     * @dataProvider StateSwitchDataProvider
     */
    public function StateSwitchTest(IState $state, BaseRequest $request, string $newState)
    {
        $this->assertInstanceOf($newState, $state->process($request));
    }

    /**
     * @return array
     */
    public function StateSwitchDataProvider()
    {
        return [
            [$this->getState(ClosedState::class), $this->getRequest(CoinRequest::class), OpenedState::class],
            [$this->getState(ClosedState::class), $this->getRequest(PassThroughRequest::class), AlarmState::class],
            [$this->getState(OpenedState::class), $this->getRequest(CoinRequest::class), OpenedState::class],
            [$this->getState(OpenedState::class), $this->getRequest(PassThroughRequest::class), ClosedState::class],
            [$this->getState(AlarmState::class), $this->getRequest(CoinRequest::class), OpenedState::class],
            [$this->getState(AlarmState::class), $this->getRequest(PassThroughRequest::class), AlarmState::class],
        ];
    }

    /**
     * @param string $stateName
     * @return IState
     */
    private function getState(string $stateName)
    {
        if (!array_key_exists($stateName, $this->states)) {
            $this->states[$stateName] = new $stateName();
        }

        return $this->states[$stateName];
    }

    /**
     * @param string $requestName
     * @return BaseRequest
     */
    private function getRequest(string $requestName)
    {
        if (!array_key_exists($requestName, $this->requests)) {
            $this->requests[$requestName] = new $requestName();
        }

        return $this->requests[$requestName];
    }
}