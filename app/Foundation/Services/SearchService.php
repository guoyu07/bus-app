<?php

namespace App\Foundation\Services;

use App\Foundation\Blueprints\Coordinates;
use App\Foundation\Repositories\BusStopRepository;
use Illuminate\Http\Request;

/**
 * The SearchService class.
 *
 * @package App\Foundation\Services
 * @author  Inon Baguio <inon.baguio@bwoil.com>
 */
class SearchService
{
    /**
     * @var BusApiService
     */
    private $busApiService;

    /**
     * @var BusStopRepository
     */
    private $busStopRepository;

    /**
     * BusStopsController constructor.
     *
     * @param BusStopRepository $busStopRepository
     * @param BusApiService $busApiService
     */
    public function __construct(
        BusApiService $busApiService,
        BusStopRepository $busStopRepository
    ) {
        $this->busApiService = $busApiService;
        $this->busStopRepository = $busStopRepository;
    }

    /**
     * @param string $busStopName
     *
     * @return \App\Models\BusStop|null
     */
    public function searchByName(string $busStopName)
    {
        $searchResult = $this->busStopRepository->getBusStopByname($busStopName);

        if (empty($searchResult)) {
            return null;
        }

        $coordinates = new Coordinates(
            $searchResult->latitude,
            $searchResult->longitude
        );

        return $this->busStopRepository->getBusStopsByRadius($coordinates);
    }

    /**
     * @return \App\Models\BusStop|null
     */
    public function searchNearMe()
    {
        $coordinatesParam = $this->getCoordinates();

        $coordinates = new Coordinates(
            $coordinatesParam[0],
            $coordinatesParam[1]
        );

        return $this->busStopRepository->getBusStopsByRadius($coordinates);
    }

    /**
     * Returns coordinates from params.
     *
     * Will remove concrete implementation of request() here, let the world spin for now :)
     *
     * @return array
     */
    private function getCoordinates() : array
    {
        if (empty(request('c'))) {
            return [];
        }

        return explode(',', request('c'));
    }
}
