<?php

namespace States;

use Requests\BaseRequest;
use Responses\BaseResponse;

class BaseState implements IState
{
    public function process(BaseRequest $request)
    {
        return $this;
    }

    public function getResponse()
    {
        return new BaseResponse();
    }
}