<?php
use Carbon\Carbon;
?>
@foreach($response['Services'] as $details)

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
            Details of Bus Code: {{ $details['ServiceNo'] }}
            <span class="pull-right">Operator - {{ $details['Operator']  }}</span>
        </div>

        <!-- Table -->
        <table class="table">
            <thead>
                <th>Arrival Time</th>
                <th>Destination Bus Stop</th>
                <th>Waiting time</th>
            </thead>
            <tbody>
                <tr>
                    <th>{{ \App\Foundation\DateUtility::parse($details['NextBus']['EstimatedArrival'])->toDayDateTimeString() ?? '--' }}</th>
                    <th>{{ $details['NextBus']['DestinationCode'] }}</th>
                    <th>{{ \App\Foundation\DateUtility::parse($details['NextBus']['EstimatedArrival'])->diffForHumans() ?? '--' }}</th>
                </tr>
                <tr>
                    <th>{{ \App\Foundation\DateUtility::parse($details['NextBus2']['EstimatedArrival'])->toDayDateTimeString() ?? '--' }}</th>
                    <th>{{ $details['NextBus2']['DestinationCode'] }}</th>
                    <th>{{ \App\Foundation\DateUtility::parse($details['NextBus2']['EstimatedArrival'])->diffForHumans() ?? '--' }}</th>
                </tr>
                <tr>
                    <th>{{ \App\Foundation\DateUtility::parse($details['NextBus3']['EstimatedArrival'])->toDayDateTimeString() ?? '--' }}</th>
                    <th>{{ $details['NextBus3']['DestinationCode'] }}</th>
                    <th>{{ \App\Foundation\DateUtility::parse($details['NextBus3']['EstimatedArrival'])->diffForHumans() ?? '--' }}</th>
                </tr>
            </tbody>
        </table>
    </div>
@endforeach
