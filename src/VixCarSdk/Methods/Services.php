<?php

namespace VixCarSdk\Methods;

use Curl\Curl;
use VixCarSdk\Utils;

class Services
{
    use Utils;
    private $methodName = 'services';
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
     * Send request to get services.
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
     * Send request to get count services.
     * @method GET
     *
     * @return array
     */
    public function count(): array
    {
        $this->useAuth();
        return $this->exec('GET', 'count');
    }

    /**
     * Send request to get price list service.
     * @method GET
     *
     * @param $id
     * @return array
     */
    public function price(int $id):array
    {
        $this->useAuth();
        return $this->exec('GET', 'price', ['id' => $id]);
    }
}