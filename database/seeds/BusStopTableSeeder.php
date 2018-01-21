<?php

use App\Foundation\Requests\BusStop;
use App\Foundation\Services\BusApiService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusStopTableSeeder extends Seeder
{
    /**
     * @var BusApiService
     */
    private $busApiService;

    /**
     * @var array
     */
    private $busStops = [];

    /**
     * BusStopTableSeeder constructor.
     *
     * @param BusApiService $busApiService
     */
    public function __construct(BusApiService $busApiService)
    {
        $this->busApiService = $busApiService;
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $response = $this->parseData();

        foreach($response['value'] as $key => $stops) {
            $this->busStops[] = [
                'code' => $stops['BusStopCode'],
                'road_name' => $stops['RoadName'],
                'description' => $stops['Description'],
                'latitude' => $stops['Latitude'],
                'longitude' => $stops['Longitude'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            unset($response['value'][$key]);
        }

        DB::table('bus_stops')->insert($this->busStops);
    }

    /**
     * @return array
     */
    private function parseData() : array
    {
        return $this->busApiService->getData(BusStop::class);
    }
}
