<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/alert/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/alert/sweetalert2.min.css') }}">
    <title>REGISTER</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style type="text/css">
        @font-face {
            font-family: Poppins;
            src: url('https://simta.tik.ft.unm.ac.id/assets/fonts/Poppins/Poppins-Regular.ttf');
        }

        body.authentication-bg-2 {
            background-image: url('https://thumbs.dreamstime.com/b/vector-music-pattern-music-seamless-background-vector-music-pattern-music-seamless-background-vector-illustration-113988721.jpg');
            background-position: center;
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="authentication-bg-2">
    <div class="container">
        <div class="row justify-content-center mt-8">
            <div class="col-md-5">
                <div class="card">
                    @if (session('error'))
                        <div class="alert alert-primary">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <div class="card">
                    <div class="">
                        <h3 class="text-center pt-6">REGISTER</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap"
                                    required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="nra">NRA (Nomor Registrasi Anggota)</label>
                                <input class="form-control @error('nra') is-invalid @enderror" type="text"
                                    name="nra" id="nra" required>
                                @error('nra')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="passwordInput"
                                        required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary bg-dark" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <div class="input-group">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password_confirmation"
                                        id="confirmPasswordInput" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary bg-dark" type="button"
                                            id="toggleConfirmPassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-block bg-dark btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const passwordInput = document.getElementById('passwordInput');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function() {
            togglePasswordVisibility(passwordInput, togglePassword);
        });

        const confirmPasswordInput = document.getElementById('confirmPasswordInput');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

        toggleConfirmPassword.addEventListener('click', function() {
            togglePasswordVisibility(confirmPasswordInput, toggleConfirmPassword);
        });

        function togglePasswordVisibility(input, toggleButton) {
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);

            if (type === 'password') {
                toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
            } else {
                toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
            }
        }
    </script>
</body>

</html>
