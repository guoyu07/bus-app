<?php

namespace App\Foundation\Requests;

/**
 * The BlueprintRequest interface.
 *
 * @package App\Foundation\Requests
 * @author  Inon Baguio <inonbaguio@gmail.com>
 */
interface BlueprintRequest
{
    /**
     * This function handles the assignment of object properties from the external payload
     *
     * @return void
     */
    public function assembleRequest();

    /**
     * Returns the request segment /BusStop, /BusRoutes used for MyTransport API
     *
     * @return string
     */
    public function apiRequestSegment() : string;

    /**
     * @return array
     */
    public function serializeRequest() : array;
}
