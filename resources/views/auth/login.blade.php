

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link rel="icon" href="{{ asset('assets/images/brand/logo-2.png')}}">
    <link href="{{ asset('assets/js/alert/sweetalert2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/alert/sweetalert2.min.css') }}" rel="stylesheet" />
    <title>LOGIN</title>
    <style type="text/css">
        @font-face {
            font-family: Poppins;
            src: url('https://simta.tik.ft.unm.ac.id/assets/fonts/Poppins/Poppins-Regular.ttf');
        }
    
        body.authentication-bg-2 {
            background-image: url('https://thumbs.dreamstime.com/b/vector-music-pattern-music-seamless-background-vector-music-pattern-music-seamless-background-vector-illustration-113988721.jpg');
            background-position: center;
        }
    </style>
    
</head>
<body class="authentication-bg-2">

    <div class="container">
        <div class="row justify-content-center mt-8">
            <div class="col-md-5">
                <div class="card">
                @if(session('error'))
                <div class="alert alert-primary">
                    {{ session('error') }}
                </div>
                @endif
                </div>

                <div class="card">
                    <div class="">
                        <h3 class="text-center pt-6">LOGIN</h3>
                    </div>
    
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
    
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label class="" for="nra">Nomor Induk Anggota</label>
                                <input class="form-control @error('nra') is-invalid  @enderror" type="text" name="nra" id="nra" placeholder="G10.015.2021" required autofocus>
                                @error('nra')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="" for="password">password</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" required autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
    
                            
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input bg-dark" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked'
                                        : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                                <button type="submit" class="btn btn-block btn-primary bg-dark">{{ __('Log in') }}</button>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <a href="register" class="btn btn-block btn-primary bg-dark">Daftar Sebagai Anggota PSM UNM</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
</body>
</html>

