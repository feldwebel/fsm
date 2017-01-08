<?php

namespace Responses;

class BaseResponse
{
    const RESPONSE = 'Base Response';

    public function getResponse()
    {
        return static::RESPONSE;
    }
}