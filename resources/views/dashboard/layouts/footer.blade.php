
<!-- footer -->
<footer class="custom-footer">
    <div class="container">

        <div class="row mb-4">

            <!-- Column 1 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="footer-heading">Use Eventbrite</h5>
                <ul class="footer-links">
                    <li><a href="#">Create Events</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Event Marketing Platform</a></li>
                    <li><a href="#">Eventbrite Mobile Ticket App</a></li>
                    <li><a href="#">Eventbrite Check-In App</a></li>
                    <li><a href="#">Eventbrite App Marketplace</a></li>
                    <li><a href="#">Event Registration Software</a></li>
                    <li><a href="#">Community Guidelines</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Sitemap</a></li>
                </ul>
            </div>

            <!-- Column 2 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="footer-heading">Plan Events</h5>
                <ul class="footer-links">
                    <li><a href="#">Sell Tickets Online</a></li>
                    <li><a href="#">Performing Arts Ticketing Software</a></li>
                    <li><a href="#">Sell Concert Tickets Online</a></li>
                    <li><a href="#">Event Payment System</a></li>
                    <li><a href="#">Solutions for Professional Services</a></li>
                    <li><a href="#">Event Management Software</a></li>
                    <li><a href="#">Halloween Party Planning</a></li>
                    <li><a href="#">Virtual Events Platform</a></li>
                    <li><a href="#">QR Codes for Event Check-In</a></li>
                    <li><a href="#">Post your event online</a></li>
                </ul>
            </div>

            <!-- Column 3 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="footer-heading">Find Events</h5>
                <ul class="footer-links">
                    <li><a href="#">Bristol Music Events</a></li>
                    <li><a href="#">Southampton Business Events</a></li>
                    <li><a href="#">Oxford Fashion Events</a></li>
                    <li><a href="#">Birmingham Sikh Events</a></li>
                    <li><a href="#">Cambridge Music Events</a></li>
                    <li><a href="#">Edinburgh Events</a></li>
                    <li><a href="#">Belfast Events</a></li>
                    <li><a href="#">London Events</a></li>
                    <li><a href="#">Nottingham Events</a></li>
                    <li><a href="#">Events in Manchester Today</a></li>
                </ul>
            </div>

            <!-- Column 4 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="footer-heading">Connect With Us</h5>
                <ul class="footer-links">
                    <li><a href="#">Contact Support</a></li>
                    <li><a href="#">Contact Sales</a></li>
                    <li><a href="#">X</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">LinkedIn</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">TikTok</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom pt-4">
            <div class="row">
                <div class="col-md-6">
                    <p class="m-0">© 2025 Eventbrite</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="bottom-link">United Kingdom ▼</a>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- LOGIN MODAL -->
<div class="modal fade" id="loginModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">

      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body p-4">
        <form>
          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control form-control-lg" placeholder="Enter your email">
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-lg" placeholder="Enter your password">
          </div>

          <div class="d-flex justify-content-between mb-3">
            <div>
              <input type="checkbox" id="remember">
              <label for="remember" class="ms-1 small">Remember me</label>
            </div>
            <a href="#" class="small text-dark">Forgot Password?</a>
          </div>

          <button type="submit" class="btn modal-button w-100 btn-lg">Login</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- SIGNUP MODAL -->
<div class="modal fade" id="signupModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">

      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Create Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body p-4">
        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf

          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter your name">
          </div>

          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your email">
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Create a password">
          </div>

          <button type="submit" class="btn w-100 btn-lg modal-button">Sign Up</button>

        </form>
      </div>

    </div>
  </div>
</div>




<!-- Bootstrap JS Bundle -->
<script src="{{url('assets/js/jquery-3.6.1.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/js/isotope-pkd-min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script src="{{url('assets/js/aos.js')}}" type="text/javascript"></script>
<script src="{{url('assets/js/custom.js')}}" type="text/javascript" defer></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>





</body>

</html>
