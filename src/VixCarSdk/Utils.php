<?php

namespace VixCarSdk;

trait Utils
{
    protected static $serverNotAnswer = 'Server not answer';

    /**
     * Convert from stdObject to array
     * @param $object
     * @return array
     */
    protected function convert($object):array
    {
        return json_decode(json_encode($object), true);
    }

    /**
     * Json request to array
     * @return mixed
     */
    protected function getResponse()
    {
        return json_decode($this->curl->rawResponse, true);
    }
}