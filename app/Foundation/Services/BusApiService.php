<?php

namespace App\Foundation\Services;

use App\Foundation\Requests\BlueprintRequest;
use App\Foundation\Requests\RequestManager;
use GuzzleHttp\Client;

/**
 * The BusApiService class.
 *
 * @package App\Foundation\Services
 * @author  Inon Baguio <inonbaguio@gmail.com>
 */
class BusApiService
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var RequestManager
     */
    private $requestManager;

    /**
     * @var BlueprintRequest
     */
    private $requestClass;

    /**
     * BusApiService constructor.
     *
     * @param Client $client
     * @param RequestManager $requestManager
     */
    public function __construct(Client $client, RequestManager $requestManager)
    {
        $this->client = $client;
        $this->requestManager = $requestManager;
    }

    /**
     * @param string $requestClass
     *
     * @return string
     */
    public function getData(string $requestClass) : string
    {
        $this->requestClass = $this->requestManager->build($requestClass);

        $response = $this->client->request(
            'GET',
            $this->getRequestUrl(), [
                'query' => $this->requestClass->serializeRequest(),
                'headers' => $this->getRequestHeaders()
            ]
        );

        return $response->getBody()->getContents();
    }

    /**
     * @return string
     */
    private function getRequestUrl() : string
    {
        return config('lrta_bus_api.url') . $this->requestClass->apiRequestSegment();
    }

    /**
     * @return array
     */
    private function getRequestHeaders() : array
    {
        return [
            'AccountKey' => config('lrta_bus_api.key'),
        ];
    }
}