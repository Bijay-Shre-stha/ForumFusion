@include('layouts.app')

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

                        <div class="google mt-2">
                            <a href="{{ route('google.login') }}" class="btn btn-danger w-100">
                                <i class="fab fa-google fa-fw"></i> Continue with Google
                            </a>
                        </div>
                    </form>
                    <br>
                    <p> By continuing, you agree to ForumFusion's <b>Terms of Services, Privacy Policy</b>
                    </p>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
