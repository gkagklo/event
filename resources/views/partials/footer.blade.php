 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">         
          <div class="col-lg-3 col-md-6 footer-info">
            <img src="{{asset('img/logo.png')}}" alt="TheEvenet">
          <p>{{ $settings['footer_description'] ?? '' }}</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              {{ $settings['contact_address'] ?? '' }}<br>
              <strong>Phone:</strong> {{ $settings['contact_phone'] ?? '' }}<br>
              <strong>Email:</strong> {{ $settings['contact_email'] ?? '' }}<br>
            </p>

            <div class="social-links">
              <a href="{{ $settings['footer_twitter'] ?? '' }}" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="{{ $settings['footer_facebook'] ?? '' }}" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="{{ $settings['footer_instagram'] ?? '' }}" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="{{ $settings['footer_googleplus'] ?? '' }}" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="{{ $settings['footer_linkedin'] ?? '' }}" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->