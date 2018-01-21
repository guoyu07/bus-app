<?php

namespace App\Foundation\Requests;

/**
 * The AbstractRequest class.
 *
 * @package App\Foundation\Requests
 * @author  Inon Baguio <inonbaguio@gmail.com>
 */
abstract class AbstractRequest implements BlueprintRequest
{
    /**
     * @var array
     */
    protected $payload;

    /**
     * AbstractRequest constructor.
     *
     * @param array $payload
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;

        $this->assembleRequest();
    }
}