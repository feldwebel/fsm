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
        switch (get_class($request)) {
            case CoinRequest::class:
                return new OpenedState();
            case PassThroughRequest::class:
                return new ClosedState();
            default:
                return $this;
        }
    }

    public function getResponse()
    {
        return new OpenedResponse();
    }

}