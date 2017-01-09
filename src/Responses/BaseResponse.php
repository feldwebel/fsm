<?php

namespace Responses;

class BaseResponse
{
    const RESPONSE = 'Base Response';

    public function getMessage()
    {
        return static::RESPONSE;
    }
}