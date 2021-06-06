  <!-- ======= Header ======= -->
  <header id="header"@if(Route::current()->getName() != 'welcome') class="header-fixed"@endif>
    <div class="container">

      <div id="logo" class="pull-left">
          <h1>
              <a href="{{ route('welcome') }}#intro">
                <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                {{ env('APP_NAME', 'The Event') }}
              </a>
          </h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="/">Home</a></li>
          <li><a href="{{ Route::current()->getName() != 'welcome' ? route('welcome') : '' }}#about">About</a></li>
          <li><a href="{{ Route::current()->getName() != 'v' ? route('welcome') : '' }}#speakers">Speakers</a></li>
          <li><a href="{{ Route::current()->getName() != 'welcome' ? route('welcome') : '' }}#schedule">Schedule</a></li>
          <li><a href="{{ Route::current()->getName() != 'welcome' ? route('welcome') : '' }}#venue">Venue</a></li>
          <li><a href="{{ Route::current()->getName() != 'welcome' ? route('welcome') : '' }}#hotels">Hotels</a></li>
          <li><a href="{{ Route::current()->getName() != 'welcome' ? route('welcome') : '' }}#gallery">Gallery</a></li>
          <li><a href="{{ Route::current()->getName() != 'welcome' ? route('welcome') : '' }}#supporters">Sponsors</a></li>
          <li><a href="{{ Route::current()->getName() != 'welcome' ? route('welcome') : '' }}#faq">Faq</a></li>
          <li><a href="{{ Route::current()->getName() != 'welcome' ? route('welcome') : '' }}#contact">Contact</a></li>
          <li class="buy-tickets"><a href="{{ Route::current()->getName() != 'welcome' ? route('welcome') : '' }}#buy-tickets">Buy Tickets</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- End Header -->