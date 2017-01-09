<?php

namespace States;

use Requests\BaseRequest;
use Responses\BaseResponse;

class BaseState implements IState
{
    public function process(BaseRequest $request): IState
    {
        return $this;
    }

    public function getResponse(): BaseResponse
    {
        return new BaseResponse();
    }
}