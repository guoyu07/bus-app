<?php

namespace App\Foundation\Requests;

use \Illuminate\Http\Request;

/**
 * The RequestManager class.
 *
 * @package App\Foundation\Requests
 * @author  Inon Baguio <inonbaguio@gmail.com>
 */
class RequestManager
{
    /**
     * @var Request
     */
    private $request;

    /**
     * RequestManager constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $requestClass
     *
     * @return BlueprintRequest
     */
    public function build(string $requestClass) : BlueprintRequest
    {
        return new $requestClass($this->request->all());
    }
}
