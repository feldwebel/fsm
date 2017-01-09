<?php

namespace States;

use Requests\BaseRequest;
use Requests\CoinRequest;
use Requests\PassThroughRequest;
use Responses\BaseResponse;
use Responses\ClosedResponse;

class ClosedState extends BaseState
{
    public function process(BaseRequest $request): IState
    {
        switch(get_class($request)) {
            case CoinRequest::class:
                return new OpenedState();
            case PassThroughRequest::class:
                return new AlarmState();
            default:
                return $this;
        }
    }

    public function getResponse(): BaseResponse
    {
        return new ClosedResponse();
    }
}