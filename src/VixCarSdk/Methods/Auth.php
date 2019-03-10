<?php

namespace VixCarSdk\Methods;

use Curl\Curl;
use VixCarSdk\Client;
use VixCarSdk\Utils;

class Auth
{
    use Utils;

    private $methodName = 'auth';
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
    private function method(string $method):string
    {
        return $this->fullPath . $method;
    }

    /**
     * Send request to login.
     * @method POST
     *
     * @param string $username
     * @param string $password
     * @return array
     */
    public function login(string $username, string $password): array
    {
        return $this->exec('POST', 'login', [
            'username' => $username,
            'password' => $password,
            'client_id' => $this->clientId
        ]);
    }

    /**
     * Send request to logout.
     * @method POST
     *
     * @return array
     */
    public function logout(): array
    {
        $this->useAuth();
        return $this->exec('POST', 'logout');
    }


    /**
     * Send request to join.
     * @method PUT
     *
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $name
     * @param string $surname
     * @param string $middleName
     * @param string $numberPhone
     * @return array
     */
    public function join(
        string $username,
        string $password,
        string $email,
        string $name,
        string $surname,
        string $middleName,
        string $numberPhone
    ): array {
        return $this->exec('POST', 'join', [
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'name' => $name,
            'surname' => $surname,
            'middle_name' => $middleName,
            'number_phone' => $numberPhone
        ]);
    }
}