@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="container">
<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Ajouter Utilisateur </h3>
                <hr>
                
                    <form action="{{route('users.index')}}" method="post" enctype="multipart/form-data">  
                    {{ csrf_field() }}       
                               
                    <div class="form-group">
                        <input  id="first_name" type="text" class="form-input @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="Your First Name" autofocus/>
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                    <div class="form-group">
                        <input id="last_name" type="text" class="form-input @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Your Last Name" required autocomplete="last_name" autofocus/>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <input id="phone" type="text" class="form-input @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Your Phone Number" required autocomplete="phone"/>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your E-mail" required autocomplete="email"/>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password"/>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-input" name="password_confirmation" placeholder="Repeat your password" required autocomplete="new-password"/>
                    </div>
                                          <div class="form-group">
                            <label for=""><b>Role*</b></label>
                        <select name="group_id" class="custom-select" id="group_id">                       
                            @foreach ($groups as $group )       
                            <option value="{{$group->id}}">{{$group->name}}</option>
                          @endforeach
                            </select>
                        </div>   
    
                        
                        <button type="submit" class="btn btn-success">Ajouter Utilisateur</button>
                    </form>

                
                
            </div>
        </div>
    </div> 
</div>
<script src="assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
</script>
</div>
@endsection