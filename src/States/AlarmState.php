<?php

namespace States;

use Responses\AlarmResponse;

class AlarmState extends BaseState
{

    public function getResponse()
    {
        return new AlarmResponse();
    }
}