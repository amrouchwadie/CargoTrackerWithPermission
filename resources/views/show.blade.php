@extends('layouts.app')

@section('title', $txn->cargo_name)

@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
      

        <div class="col-md-8">
            <div class="card" style="min-height: 100%">
                <div class="card-header">
                    Viewing {{ $txn->cargo_name }}
                    <a href="javascript: history.go(-1)"><span class="float-right fa fa-backward"> Back</span></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table table-light table-responsive">
                            <tbody>
                                <tr>
                                    <td>Reference ID</td>
                                    <td>{{ $txn->cargo_id }}</td>
                                </tr>
                                <tr>
                                    <td>Cargo Name</td>
                                    <td>{{ $txn->cargo_name }}</td>
                                </tr>
                                <tr>
                                    <td>Cargo Description</td>
                                    <td>{{ $txn->cargo_desc }}</td>
                                </tr>
                                <tr>
                                    <td>Origin</td>
                                    <td>
                                        @php
                                            echo App\Models\Location::find($txn->origin)->location
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td>Destination</td>
                                    <td>
                                        @php
                                            $location = App\Models\Location::find($txn->destination)
                                        @endphp
                                        {{ $location->location }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bus</td>
                                    <td>{{ $txn->bus }}</td>
                                </tr>
                                <tr>
                                    <td>Duration</td>
                                    <td>
                                        {{ $location->duration }} Hours
                                    </td>
                                </tr>
                                <tr>
                                    <td>Time Remaining</td>
                                    <td>
                                        @php
                                            $hours = $txn->created_at->addHours($location->duration);
                                            echo $hours->diffInHours(now()).' Hours and ' . $hours->diffInMinutes(Carbon\Carbon::parse(now())) .' minutes';
                                            //(now()->diffInHours(Carbon\Carbon::parse($txn->created_at)))

                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sender Name</td>
                                    <td>{{ $txn->sender_name }}</td>
                                </tr>
                                <tr>
                                    <td>Sender Phone Number</td>
                                    <td>{{ $txn->sender_phone }}</td>
                                </tr>
                                <tr>
                                    <td>Receiver Name</td>
                                    <td>{{ $txn->receiver_name }}</td>
                                </tr>
                                <tr>
                                    <td>Receiver Phone Number</td>
                                    <td>{{ $txn->receiver_phone }}</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
