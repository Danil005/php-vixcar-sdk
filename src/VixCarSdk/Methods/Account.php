<?php

namespace VixCarSdk\Methods;

use Curl\Curl;
use VixCarSdk\Utils;

class Account
{
    use Utils;

    private $methodName = 'account';
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
    protected function method(string $method): string
    {
        return $this->fullPath . $method;
    }

    /**
     * Send request to get booking.
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
     * Send request to delete account
     * @method DELETE
     *
     * @param string $username
     * @param string $password
     * @return array
     */
    public function delete(string $username, string $password): array
    {
        $this->useAuth();
        return $this->exec('DELETE', 'delete', [
            'username' => $username,
            'password' => $password
        ]);
    }

    /**
     * Send request to restore account.
     * @method PATCH
     *
     * @return array
     */
    public function restore(): array
    {
        $this->useAuth();
        return $this->exec('PATCH', 'restore');
    }

    /**
     * Send request to name.
     * @method PATCH
     *
     * @param string $name
     * @return array
     */
    public function name(string $name): array
    {
        $this->useAuth();
        return $this->exec('PATCH', 'name', ['name' => $name]);
    }

    /**
     * Send request to surname.
     * @method PATCH
     *
     * @param string $surname
     * @return array
     */
    public function surname(string $surname): array
    {
        $this->useAuth();
        return $this->exec('PATCH', 'surname', ['surname' => $surname]);
    }

    /**
     * Send request to middle_name.
     * @method PATCH
     *
     * @param string $middleName
     * @return array
     */
    public function middleName(string $middleName): array
    {
        $this->useAuth();
        return $this->exec('PATCH', 'middle_name', ['middle_name' => $middleName]);
    }

    /**
     * Send request to connections.
     * @method PATCH
     *
     * @param string $connections
     * @return array
     */
    public function connections(string $connections): array
    {
        $this->useAuth();
        return $this->exec('PATCH', 'connections', ['connections' => $connections]);
    }

}