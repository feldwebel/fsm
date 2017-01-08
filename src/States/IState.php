<?php

namespace States;

use Requests\BaseRequest;
use Responses\BaseResponse;

interface IState
{
    /**
     * @param BaseRequest $request
     * @return IState
     */
    public function process(BaseRequest $request);

    /**
     * @return BaseResponse
     */
    public function getResponse();
}