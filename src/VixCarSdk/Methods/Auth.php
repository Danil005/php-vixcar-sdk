<?php

namespace VixCarSdk\Methods;

use Curl\Curl;
use VixCarSdk\Client;
use VixCarSdk\Utils;

class Auth extends Client
{
    use Utils;

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
        try {
            $this->curl->post($this->path . '/auth.login', [
                'username' => $username,
                'password' => $password,
                'client_id' => $this->clientId
            ]);
        } catch (\ErrorException $e) {
            echo Utils::$serverNotAnswer;
        }

        return $this->getResponse();
    }

    /**
     * Send request to logout.
     * @return array
     */
    public function logout(): array
    {
        try {
            $this->curl->setHeader('Authorization', 'Bearer ' . $this->clientToken);

            $this->curl->post($this->path . '/auth.logout');
        } catch (\ErrorException $e) {
            echo Utils::$serverNotAnswer;
        }

        return $this->getResponse();
    }


    /**
     * Send request to join.
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
        try {
            $this->curl->put($this->path . '/auth.join', [
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'name' => $name,
                'surname' => $surname,
                'middle_name' => $middleName,
                'number_phone' => $numberPhone
            ]);
        } catch (\ErrorException $e) {
            echo Utils::$serverNotAnswer;
        }

        return $this->getResponse();
    }
}