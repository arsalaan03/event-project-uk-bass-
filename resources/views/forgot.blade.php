<!-- header  -->

@extends('dashboard.layouts.main')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">



<!-- bread cum part  -->


<!-- login  section  -->

<section class="login-section">
    <a href="index.php" class="text-decoration-none d-flex align-items-center mb-2 text-white">
        <i class="fas fa-arrow-left me-2"></i> Back to Home
    </a>

    <div class="container-fluid">
        <div class="row">
            <!-- Left Side Image -->
            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center image-side p-0">
                <img src="assets/images/login-form.png" alt="Login Image" class="img-fluid">
            </div>

            <!-- Right Side Form -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center form-side">
                <div class="login-form">

                    <h2>Forgot Your Password?</h2>
                    <p class="mb-4">Enter your registered email address.</p>

                    <form>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>

                       <a href="varification-code.php" class="submit-btn">Continue</a>




                    </form>
                </div>
            </div>
        </div>
    </div>
</section>







<!-- footer  -->

@endsection
