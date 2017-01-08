<?php

namespace States;

use Requests\BaseRequest;
use Requests\CoinRequest;
use Requests\PassThroughRequest;
use Responses\OpenedResponse;

class OpenedState extends BaseState
{

    public function process(BaseRequest $request)
    {
        if ($request instanceof CoinRequest) {
            return new OpenedState();
        }

        if ($request instanceof PassThroughRequest) {
            return new ClosedState();
        }
    }

    public function getResponse()
    {
        return new OpenedResponse();
    }

}