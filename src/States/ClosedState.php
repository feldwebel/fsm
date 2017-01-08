<?php

namespace States;

use Requests\BaseRequest;
use Requests\CoinRequest;
use Requests\PassThroughRequest;
use Responses\ClosedResponse;

class ClosedState extends BaseState
{
    public function process(BaseRequest $request)
    {
        if ($request instanceof CoinRequest) {

            return new OpenedState();
        }

        if ($request instanceof PassThroughRequest) {

            return new AlarmState();
        }
    }
    
    public function getResponse()
    {
        return new ClosedResponse();
    }
}