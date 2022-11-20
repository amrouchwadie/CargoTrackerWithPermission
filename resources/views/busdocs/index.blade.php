@extends('layouts.app')

@section('title', 'Locations')

@section('content')
<br><br><br>

<div class="container">
  <div class="row justify-content-center">
 

      <div class="col-md-8">
          <div class="card" >
              <div class="card-header">{{ __('Buses') }}</div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

             
                  <br>
                
    <a href="{{ route('busdocs.create')}}" class="btn btn-primary">{{__('Add Document')}} </a>
    <div class="row justify-content-center">

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
    
        <th >Default Name</th>
        <th >Buses</th>
        <th >Action</th>
         <th ></th>
         <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($busdocs as $busdoc)
        
      <tr>
        
        <th scope="row">{{$busdoc->id}}</th>

        
      
        <td><a href="{{URL::to('documents/'.$busdoc->pdf)}}">{{$busdoc->pdf}}</a></td>
        <td>
            {{$busdoc->bus_id}}
        
    </select>

        </td>
        <td><a type="button" class="btn btn-success" href="{{URL::to('documents/'.$busdoc->pdf)}}" target="{{URL::to('documents/'.$busdoc->pdf)}}" download="{{URL::to('documents/'.$busdoc->pdf)}}" >Downloads</a></td>
        <td>
          <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"  href="{{ route('busdocs.edit', $busdoc->id) }}"  >{{__('Update')}}</a>
        </td>
      
        <td>   
           <form action="{{ route('busdocs.destroy',  $busdoc->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" type="submit"  onclick="return confirm('Etes-vous sûr de la suppression?');" >{{__('Delete')}}</button>
        </form></td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection