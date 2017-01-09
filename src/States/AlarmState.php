<?php

namespace States;

use Requests\BaseRequest;
use Requests\CoinRequest;
use Responses\AlarmResponse;
use Responses\BaseResponse;

class AlarmState extends BaseState
{

    public function process(BaseRequest $request): IState
    {
        switch (get_class($request)) {
            case CoinRequest::class:
                return new OpenedState();
            default:
                return $this;
        }
    }

    public function getResponse(): BaseResponse
    {
        return new AlarmResponse();
    }
}