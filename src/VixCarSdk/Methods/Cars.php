<?php

namespace VixCarSdk\Methods;

use Curl\Curl;
use VixCarSdk\Utils;

class Cars
{
    use Utils;

    private $methodName = 'cars';
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
     * Send request to get cars.
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
     * Send request to get count cars.
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
     * Send request to create car.
     * @method POST
     *
     * @param string $carName
     * @param string $carNumber
     * @param string $vin
     * @return array
     */
    public function create(string $carName, string $carNumber, string $vin): array
    {
        $this->useAuth();
        return $this->exec('POST', 'create', [
            'car_name' => $carName,
            'car_number' => $carNumber,
            'vin' => $vin
        ]);
    }

    /**
     * Send request to delete car
     * @method DELETE
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id):array
    {
        $this->useAuth();
        return $this->exec('DELETE', 'delete', ['id' => $id]);
    }

    /**
     * Send request to update car.
     * @method PATCH
     *
     * @param int $id
     * @param string $carName
     * @param string $carNumber
     * @param string $vin
     * @return array
     */
    public function update(int $id, string $carName = "", string $carNumber = "", string $vin = ""):array
    {
        $this->useAuth();
        $data['id'] = $id;
        if( $carName ) $data['car_name'] = $carName;
        if( $carNumber ) $data['car_number'] = $carNumber;
        if( $vin ) $data['vin'] = $vin;
        return $this->exec('PATCH', 'update', $data);
    }


}