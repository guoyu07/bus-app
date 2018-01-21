<?php

namespace App\Http\Controllers;

use App\Foundation\Blueprints\Coordinates;
use App\Foundation\Repositories\BusStopRepository;
use Illuminate\Http\Request;

class BusStopsController extends Controller
{
    /**
     * @var BusStopRepository
     */
    private $busStopRepository;

    /**
     * BusStopsController constructor.
     *
     * @param BusStopRepository $busStopRepository
     */
    public function __construct(BusStopRepository $busStopRepository)
    {
        $this->busStopRepository = $busStopRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stops = [];
        $coordinatesParam = $this->getCoordinates();

        if (empty($coordinatesParam)) {
            return view('stops.index', compact('stops'));
        }

        $coordinates = new Coordinates(
            $coordinatesParam[0],
            $coordinatesParam[1]
        );

        $stops = $this->busStopRepository->getBusStopsByRadius(
            $coordinates,
            request('q', '')
        );

        return view('stops.index', compact('stops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    #---------------------------------------------------------------------------------------------------
    # Private functions
    #---------------------------------------------------------------------------------------------------

    /**
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
