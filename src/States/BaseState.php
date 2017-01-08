<?php

namespace States;

use Requests\BaseRequest;
use Responses\BaseResponse;

class BaseState implements IState
{
    protected $response;

    public function process(BaseRequest $request)
    {
        $this->response = new BaseResponse();
        return new BaseState();
    }

    public function getResponse()
    {
        return $this->response;
    }
}