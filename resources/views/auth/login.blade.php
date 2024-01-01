<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login</title>
    <meta name="google-signin-client_id"
        content="848005554800-hq4fu22o449tu1ff2g9tsgdbaksljs9c.apps.googleusercontent.com">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />

    <!--  -->
    <link rel="stylesheet" href="/assets/css/style.css" />

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/assets/images/saas.png">
</head>

<body>

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
                        <h1>Welcome to ACAS!</h1>
                        <form action="" method="">
                            @csrf
                            <div class="">
                                <input class="email w-100" type="email" name="email"
                                    placeholder="Enter Your Email Address" />

                                    <div class="input_container">
                                        <input id="password" class="password w-100" type="password" name="password"
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
                            Don't have an account? <a href="/" class=" text-decoration-none sign_up fw-bolder">Sign Up</a>
                        </div><br>
                        <p> By continuing, you agree to ACAS's <b>Terms of Services, Privacy Policy</b>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </body>

</html>

<script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        var eyeIcon = document.querySelector(".eye-icon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.innerHTML = '<i class="far fa-eye-slash"></i>';
        } else {
            passwordInput.type = "password";
            eyeIcon.innerHTML = '<i class="far fa-eye"></i>';
        }
    }
</script>
