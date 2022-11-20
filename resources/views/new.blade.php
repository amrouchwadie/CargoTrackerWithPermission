@extends('layouts.app')

@section('title', 'New Shipping')

@section('content')
<br><br><br><br>
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8 display-none">
            
        </div>

        <div class="col-md-8">
            <div class="card" style="min-height: 100%">
                <div class="card-header"><b>{{ __('New Cargo Shipping') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cargo_name">Cargo Name</label>
                                    <input id="cargo_name" class="form-control @error('cargo_name') is-invalid @enderror" type="text" name="cargo_name" value="{{ old('cargo_name') }}">
                                    @error('cargo_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cargo_desc">Cargo Description</label>
                                    <textarea name="cargo_desc" id="" class="form-control @error('cargo_desc') is-invalid @enderror">
                                        {{ old('cargo_desc') }}
                                    </textarea>
                                    @error('cargo_desc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="origin">Origin</label>
                                    <select name="origin" id="origin" class="form-control @error('destination') is-invalid @enderror">
                                        @if ($locations->count() >0)
                                        @foreach ($locations as $item)
                                            <option value="{{ $item->id }}">{{ $item->location }}</option>
                                        @endforeach
                                        @else
                                            <option>No Location added yet</option>
                                        @endif
                                    </select>
                                    @error('origin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="destination">Destination</label>
                                    <select name="destination" id="destination" class="form-control @error('destination') is-invalid @enderror">
                                        @if ($locations->count() >0)
                                        @foreach ($locations as $item)
                                            <option value="{{ $item->id }}">{{ $item->location }}</option>
                                        @endforeach
                                        @else
                                            <option>No Location added yet</option>
                                        @endif
                                    </select>
                                    @error('destination')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bus">Bus</label>
                                    <select name="bus" id="bus" class="form-control @error('bus') is-invalid @enderror">
                                        @if ($buses->count() >0)
                                        @foreach ($buses as $item)
                                            <option value="{{ $item->bus_no }}">{{ $item->bus_no }}</option>
                                        @endforeach
                                        @else
                                            <option>No bus added yet</option>
                                        @endif
                                    </select>
                                    @error('bus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sender_name">Sender Name</label>
                                    <input id="sender_name" class="form-control @error('sender_name') is-invalid @enderror" type="text" name="sender_name" value="{{ old('sender_name') }}">
                                    @error('sender_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sender_phone">Sender Phone</label>
                                    <input id="sender_phone" class="form-control @error('sender_phone') is-invalid @enderror" type="text" name="sender_phone" value="{{ old('sender_phone') }}" placeholder="07xxxxxxxxx">
                                    @error('sender_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="receiver_name">Receiver Name</label>
                                    <input id="receiver_name" class="form-control @error('receiver_name') is-invalid @enderror" type="text" name="receiver_name" value="{{ old('receiver_name') }}">
                                    @error('receiver_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="receiver_phone">Receiver Phone</label>
                                    <input id="receiver_phone" class="form-control @error('receiver_phone') is-invalid @enderror" type="text" name="receiver_phone" value="{{ old('receiver_phone') }}" placeholder="07xxxxxxxxx">
                                    @error('receiver_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div >
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
