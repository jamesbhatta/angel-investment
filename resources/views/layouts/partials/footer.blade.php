<!-- Footer -->
<footer>
    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="col-md-3 col-sm-3 ">
                <div class="social-wrap">
                    <div class="socail-img">
                        <img src="{{ asset('img/logo.png') }}" alt="" height="80px">
                        <img src="{{ asset('img/NicePng_paypal-png_224654.png') }}" class="ms-3" alt="" height="80px">
                    </div>

                    <div class="social-links">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-github"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 footer-m">
                <div class="quick-links">
                    <h4>Quicks Link</h4>
                    <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="{{ route('business-proposals.index') }}">Investments</a></li>
                        <li><a href="">Services</a></li>
                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Sign Up</a></li>
                        @endguest
                        <li><a href="">Contact Us</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 footer-m">
                <div class="quick-links">
                    <h4>Entrepreneurs Pages</h4>
                    <ul>
                        <li><a href="{{ route('pitches.create.step-one') }}">Add a pitch</a></li>
                        <li><a href="">Entrepreneur FAQs</a></li>
                        <li><a href="">Services</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 footer-m">
                <div class="quick-links">
                    <h4>Investor Pages</h4>
                    <ul>
                        @guest
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endguest
                        <li><a href="{{ route('business-proposals.index') }}">Business Proposal</a></li>
                        <li><a href="">Investor in Impact</a></li>
                        <li><a href="">Investor FAQs</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-md-flex">
                <ul class="bottom-menu d-flex list-unstyled">
                    <li><a class="facebook" href="#">Terms and Conditions</a></li>
                    <li class="ms-4"><a class="twitter" href="#">Privacy Policy</a></li>
                </ul>
            <div class="ms-auto">
                <p class="copyright-text">© 2021 Angel Investment Network Ltd - Connecting Global & Local
                    Entrepreneurs with Angel Investors</a>.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer-end -->
