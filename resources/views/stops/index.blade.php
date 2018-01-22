@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        Bus Stop Search
                    </div>

                    <div class="panel-body">
                        <form method="GET" action="#" id="busSearchForm">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" placeholder="Search for road name: Woodlands, Farrer Road, Marina Bay.." name="q" class="form-control" id="stopSearchField">
                                    <input type="hidden" name="c" id="usersCoordinates" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <a href="javascript:void(0)" class="btn btn-success"  id="nearMe">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                    Near Me
                                    </a>
                                    <button class="btn btn-primary" type="submit" style="width:60%">Search</button>
                                </div>
                            </div>
                        </form>
                        <h4>
                            @if(!empty(request('q')))
                                <strong>Bus Stops near <i>"{{ ucwords(request('q')) }}"</strong></i>
                            @elseif((!empty(request('c'))))
                                <strong><i>Stops nearby you within 5km..</i></strong>
                            @endif
                        </h4>
                    </div>
                </div>

                @foreach($stops as $stop)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <div class="flex">
                                    <h3>
                                        <a href="#">
                                            <strong>
                                                {{ $stop->road_name }}
                                            </strong>
                                        </a>
                                    </h3>
                                    <h5>
                                        {{ $stop->description }}
                                    </h5>
                                </div>
                                <a href="javascript:void(0)">
                                    <h4>
                                        {{ number_format($stop->distance, 2) }} km.
                                    </h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a
                               href="#"
                               data-toggle="modal"
                               data-target="#myModal"
                               class="viewArrivals"
                               data-code="{{ $stop->code }}"
                            >
                                View Arrival Times
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="busStopTitle"...loading</h4>
                </div>
                <div class="modal-body" id="stopDetails">
                    <strong class="text-center">..fetching</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
