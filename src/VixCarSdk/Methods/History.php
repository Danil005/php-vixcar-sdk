<?php

namespace VixCarSdk\Methods;

use Curl\Curl;
use VixCarSdk\Utils;

class History
{
    use Utils;
    private $methodName = 'history';
    private $fullPath, $clientId, $clientToken, $curl;

    public function __construct(int $clientId, string $clientToken, string $path, Curl $curl)
    {
        $this->clientId = $clientId;
        $this->clientToken = $clientToken;
        $this->curl = $curl;
        $this->fullPath = $path . '/' . $this->methodName . '.';
    }

    /**
     * Select Method
     * @param string $method
     * @return string
     */
    private function method(string $method): string
    {
        return $this->fullPath . $method;
    }

    /**
     * Send request to get history.
     * @method GET
     *
     * @return array
     */
    public function get(): array
    {
        $this->useAuth();
        return $this->exec('GET', 'get');
    }

    /**
     * Send request to get count history.
     * @method GET
     *
     * @return array
     */
    public function count(): array
    {
        $this->useAuth();
        return $this->exec('GET', 'count');
    }
}