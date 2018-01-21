<?php

namespace App\Foundation\Requests;

/**
 * The BusArrivals class.
 *
 * @package App\Foundation\Requests
 * @author  Inon Baguio <inonbaguio@gmail.com>
 */
class BusArrivals extends AbstractRequest
{
    /**
     * @var string
     */
    private $code = '';

    /**
     * This function handles the assignment of object properties from the external payload
     *
     * @return void
     */
    public function assembleRequest()
    {
        $this->setCode($this->payload['code']);
    }

    /**
     * Returns the request segment /BusStop, /BusRoutes used for MyTransport API
     *
     * @return string
     */
    public function apiRequestSegment(): string
    {
        return 'BusArrivalv2';
    }

    /**
     * @return array
     */
    public function serializeRequest(): array
    {
        return [
            'BusStopCode' => $this->getCode()
        ];
    }

    /**
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }
}