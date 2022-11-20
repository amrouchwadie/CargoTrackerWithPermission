
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/ass/css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="{{ route('register') }}" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">Create account</h2>
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
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="{{ route('login') }}" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="/ass/vendor/jquery/jquery.min.js"></script>
    <script src="/ass/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>