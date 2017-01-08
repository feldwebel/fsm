<?php

use Requests\BaseRequest;
use States\AlarmState;
use States\ClosedState;
use States\IState;
use States\OpenedState;

class Turnstile
{
    private $state;

    public static function closed()
    {
        return new self(new ClosedState());
    }

    public static function opened()
    {
        return new self(new OpenedState());
    }

    public static function alarm()
    {
        return new self(new AlarmState());
    }

    public function __construct(IState $state)
    {
        $this->state = $state;
    }

    public function operate(BaseRequest $request)
    {
        $this->state = $this->state->process($request);

        return $this->state->getResponse();
    }
}