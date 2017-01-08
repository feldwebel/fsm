<?php

namespace States;

use Requests\BaseRequest;

class ClosedState extends BaseState
{
    public function process(BaseRequest $request)
    {
        if ($request->isCoin()) {}
    }

    public function getResponse()
    {
        return new BaseResponse();
    }
}