@extends('layouts.app')

@section('title', 'Locations')

@section('content')


<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">{{__('Update Document')}}</h3>
                <hr>
                
                <form action="{{route('busdocs.update', $busdocs->id)}}" method="post" enctype="multipart/form-data">  
                    @csrf
                    @method('PUT')
                               
                        <div class="form-group">
                                 <input type="hidden" name="_token" value="{{Session::token()}}">
                           
                        </div>
                        <div class="form-group">
                            <label for="label"><b>{{__('Document')}}</b></label><br>
                            {{$busdocs->pdf}}"
                            <input type="file" placeholder="file" class="form-control" id="pdf" name="pdf" value="{{$busdocs->pdf}}" >
                        </div>
                        
                        <div class="form-group">
                            <label for="label"><b>{{__('Buses')}}</b></label>
                    <select name="bus_id" class="form-control" id="bus_id">

                        <option selected>{{__('Version')}}</option>
                    @foreach ($buss as $bus )
                  
                        <option value="{{$bus->bus_no}}" {{ $bus->bus_no == $busdocs->bus_id  ? 'selected' : '' }} >{{$bus->bus_no}}</option>
                      
                    @endforeach
                </select>
                        </div>
                    <br>

                        
                        <button type="submit" class="btn btn-success">Sauvgarde</button>
                    </form>

                
                
            </div>
        </div>
    </div> 
</div>

@endsection