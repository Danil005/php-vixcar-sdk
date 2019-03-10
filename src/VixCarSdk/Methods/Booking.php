<?php

namespace VixCarSdk\Methods;

use Curl\Curl;
use VixCarSdk\Utils;

class Booking
{
    use Utils;

    private $methodName = 'booking';
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
     * Send request to get count booking.
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
     * Send request to create booking.
     * @method POST
     *
     * @param int $serviceId
     * @param int $cardId
     * @param string $timeBooking
     * @return array
     */
    public function create(int $serviceId, int $cardId, string $timeBooking): array
    {
        $this->useAuth();
        return $this->exec('POST', 'create', [
            'service_id' => $serviceId,
            'car_id' => $cardId,
            'time_booking' => $timeBooking
        ]);
    }

    /**
     * Send request to delete booking.
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
     * Send request to update booking.
     * @method PATCH
     *
     * @param int $id
     * @param int $carId
     * @param string $timeBooking
     * @return array
     */
    public function update(int $id, int $carId = null, string $timeBooking = ""):array
    {
        $this->useAuth();
        $data['id'] = $id;
        if( $carId ) $data['car_id'] = $carId;
        if( $timeBooking ) $data['time_booking'] = $timeBooking;
        return $this->exec('PATCH', 'update', $data);
    }

    /**
     * Send request to close booking.
     * @method POST
     *
     * @param int $id
     * @return array
     */
    public function close(int $id):array
    {
        $this->useAuth();
        return $this->exec('POST', 'close', ['id' => $id]);
    }

}