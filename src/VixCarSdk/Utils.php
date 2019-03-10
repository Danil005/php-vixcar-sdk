<?php

namespace VixCarSdk;

trait Utils
{
    protected static $serverNotAnswer = 'Server not answer';
    private $useAuth = false;

    /**
     * Convert from stdObject to array
     * @param $object
     * @return array
     */
    protected function convert($object): array
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

    /**
     * Set check auth.
     * @param bool $value
     */
    protected function useAuth(bool $value = true):void
    {
        $this->useAuth = $value;
    }

    /**
     * Execute method.
     * @param string $requestMethod
     * @param string $apiMethod
     * @param array $data
     * @return array
     */
    protected function exec(string $requestMethod, string $apiMethod, array $data = null):array
    {
        try {
            if ($this->useAuth) {
                $this->curl->setHeader('Authorization', 'Bearer ' . $this->clientToken);
            }
            if( !isset($data) ) {
                $this->curl->$requestMethod($this->method($apiMethod));
            } else {
                $this->curl->$requestMethod($this->method($apiMethod), $data);
            }
        } catch (\ErrorException $e) {
            echo Utils::$serverNotAnswer;
        }

        return $this->getResponse();
    }
}