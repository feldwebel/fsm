<?php

namespace States;

use Requests\BaseRequest;
use Requests\CoinRequest;
use Responses\AlarmResponse;

class AlarmState extends BaseState
{

    public function process(BaseRequest $request)
    {
        switch (get_class($request)) {
            case CoinRequest::class:
                return new OpenedState();
            default:
                return $this;
        }
    }

    public function getResponse()
    {
        return new AlarmResponse();
    }
}