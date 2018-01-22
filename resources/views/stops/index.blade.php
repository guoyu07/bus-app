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
                        <form method="GET" action="#">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="text" placeholder="Search for road name: Labrador park, Farrer Road, Marina Bay.." name="q" class="form-control">
                                    <input type="hidden" name="c" id="usersCoordinates" value="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" style="width:100%">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @foreach($stops as $stop)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <div class="flex">
                                    <h4>
                                        <a href="#">
                                            <strong>
                                                {{ $stop->road_name }}
                                            </strong>
                                        </a>
                                    </h4>
                                    <h5>
                                        {{ $stop->description }}
                                    </h5>
                                </div>
                                <a href="javascript:void(0)">
                                   {{ number_format($stop->distance, 2) }} mi
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
                                View Arrival Time
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
                    <i>..fetching</i>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection