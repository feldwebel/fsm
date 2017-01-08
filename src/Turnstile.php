<?php

use Action\Action;
use States\AlarmState;
use States\ClosedState;
use States\IState;
use States\OpenedState;

class Turnstile
{
    private $state;

    public static function createClosed()
    {
        return new self(new ClosedState());
    }

    public static function createOpened()
    {
        return new self(new OpenedState());
    }

    public static function createAlarm()
    {
        return new self(new AlarmState());
    }

    public function __construct(IState $state)
    {
        $this->state = $state;
    }

    public function operate(Action $action)
    {
        $this->state = $this->state->process($action);

        return $this->state->getResponse();
    }
}