<?php

namespace VixCarSdk;

use VixCarSdk\Methods\Auth;
use Curl\Curl;

class Client
{
    protected $clientId, $clientToken, $curl, $path, $version;

    /**
     * Client constructor.
     * @param int $clientId
     * @param string $clientToken
     * @param string $path
     */
    public function __construct(int $clientId, string $clientToken, string $path)
    {
        $this->clientId = $clientId;
        $this->clientToken = $clientToken;
        $this->path = $path;
        try {
            $this->curl = new Curl();
        } catch (\ErrorException $e) {
            echo "cURL library is not loaded";
        }
    }

    public function getPath():string
    {
        return $this->path;
    }

    public function auth():Auth
    {
        return new Auth($this->clientId, $this->clientToken, $this->path);
    }
}