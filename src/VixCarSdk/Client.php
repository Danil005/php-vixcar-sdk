<?php

namespace VixCarSdk;

use VixCarSdk\Methods\Account;
use VixCarSdk\Methods\Auth;
use Curl\Curl;
use VixCarSdk\Methods\Booking;
use VixCarSdk\Methods\Cars;
use VixCarSdk\Methods\History;
use VixCarSdk\Methods\Services;

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

    /**
     * Get path api.
     * @return string
     */
    public function getPath():string
    {
        return $this->path;
    }

    /**
     * Return Auth class.
     *
     * @return Auth
     */
    public function auth():Auth
    {
        return new Auth($this->clientId, $this->clientToken, $this->path, $this->curl);
    }

    /**
     * Return Services class.
     *
     * @return Services
     */
    public function services():Services
    {
        return new Services($this->clientId, $this->clientToken, $this->path, $this->curl);
    }

    /**
     * Return Services class.
     *
     * @return Cars
     */
    public function cars():Cars
    {
        return new Cars($this->clientId, $this->clientToken, $this->path, $this->curl);
    }

    /**
     * Return Booking class.
     *
     * @return Booking
     */
    public function booking():Booking
    {
        return new Booking($this->clientId, $this->clientToken, $this->path, $this->curl);
    }

    /**
     * Return History class.
     *
     * @return History
     */
    public function history():History
    {
        return new History($this->clientId, $this->clientToken, $this->path, $this->curl);
    }

    /**
     * Return Account class.
     *
     * @return Account
     */
    public function account():Account
    {
        return new Account($this->clientId, $this->clientToken, $this->path, $this->curl);
    }



}