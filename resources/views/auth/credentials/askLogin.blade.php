@include('layouts.app')
@if (session('login_required_message'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Hello User!</strong> {{ session('login_required_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<body class="bg-light">
    <div class="container-fluid" style="">
        <div class="row">
            <!-- Column for the image -->
            <div class="col d-none d-md-block image_container">
                <img src="assets/images/saas.png" class="w-75 d-block" />
            </div>

            <!-- Column for the form -->
            <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                <div class="welcome_container mt-5">
                    <h1>Welcome to ForumFusion!</h1>
                    <form action="" method="">
                        @csrf
                        <div class="">
                            <input class="input email w-100" type="email" name="email"
                                placeholder="Enter Your Email Address" />

                            <div class="input_container">
                                <input id="password" class="input password w-100" type="password" name="password"
                                    placeholder="********" />
                                <span class="eye-icon" onclick="togglePassword()">
                                    <i class="far fa-eye"></i>
                                </span>
                            </div>

                            <a href="/forgot-password" class=" text-decoration-none forget">Forgot Password?</a>
                            <br>
                            <button class="btn btn-success w-100">Login</button>
                        </div>
                        <div class="mt-1">or</div>
                        <div class="google mt-2">
                            <a href="{{ route('google.login') }}" class="btn btn-danger w-100">
                                <i class="fab fa-google fa-fw"></i> Continue with Google
                            </a>
                        </div>
                        {{-- <div class="facebook mt-2 ">
                                <a href="{{ route('facebook.login') }}" class="btn btn-primary w-100">
                                    <i class="fab fa-facebook fa-fw"></i> Continue with Facebook
                                </a>
                            </div> --}}
                    </form>
                    <div class="text-center mt-2  ">
                        Don't have an account? <a href="/" class=" text-decoration-none sign_up fw-bolder">Sign
                            Up</a>
                    </div><br>
                    <p> By continuing, you agree to ForumFusion's <b>Terms of Services, Privacy Policy</b>
                    </p>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
