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
                        {{--<div class="panel-body">--}}
                            {{--<div class="body">--}}
                                {{--Id accusantium rerum ut et. Ea tenetur ut rerum neque. Quisquam qui sint quo non. Iste sit amet at.--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="panel-footer">
                            0 Visits
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection