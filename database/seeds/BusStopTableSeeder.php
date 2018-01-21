<?php

use App\Foundation\Requests\BusStop;
use App\Foundation\Services\BusApiService;
use Illuminate\Database\Seeder;

class BusStopTableSeeder extends Seeder
{
    /**
     * @var BusApiService
     */
    private $busApiService;

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
        $this->busApiService->getData(BusStop::class);
    }
}
