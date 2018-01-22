<?php

namespace App\Http\Controllers;

use App\Foundation\Blueprints\Coordinates;
use App\Foundation\Repositories\BusStopRepository;
use App\Foundation\Requests\BusArrivals;
use App\Foundation\Services\BusApiService;
use App\Foundation\Services\SearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BusStopsController extends Controller
{
    /**
     * @var SearchService
     */
    private $searchService;

    /**
     * BusStopsController constructor.
     *
     * @param SearchService $searchService
     */
    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stops = [];

        if (!empty(request('q'))) {
            $stops = $this->searchService->searchByName(request('q', ''));

            return view('stops.index', compact('stops'));
        }

        if (!empty(request('c'))) {
            $stops = $this->searchService->searchNearMe();

            return view('stops.index', compact('stops'));
        }

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
     * @param string $code
     *
     * @return JsonResponse|View
     */
    public function show(string $code)
    {
        request()->merge([
            'code' => $code
        ]);

        $response = $this->busApiService->getData(BusArrivals::class);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $response,
                'html' => view('stops.partials.details', compact('response'))->render()
            ]);
        }


        return view('stops.partials.details', compact('response'));
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
}
