@extends('layouts.main')
@section('content')

 <!-- ======= Intro Section ======= -->
 <section id="intro">
    <div class="intro-container" data-aos="zoom-in" data-aos-delay="100">   
      <h1 class="mb-4 pb-0">{!! $settings['title'] ?? '' !!}</h1>
      <p class="mb-4 pb-0">{{ $settings['subtitle'] ?? '' }}</p>
      <a href="{{ $settings['youtube_link'] ?? '' }}" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
      <a href="#about" class="about-btn scrollto">About The Event</a>
    </div>
  </section><!-- End Intro Section -->

  <main id="main">
      <!-- ======= About Section ======= -->
      <section id="about">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-6">
              <h2>About The Event</h2>
              <p>{{ $settings['about_description'] ?? '' }}</p>
            </div>
            <div class="col-lg-3">
              <h3>Where</h3>
              <p>{{ $settings['about_where'] ?? '' }}</p>
            </div>
            <div class="col-lg-3">
              <h3>When</h3>
              <p>{{ $settings['about_when'] ?? '' }}</p>
            </div>
          </div>
        </div>
      </section><!-- End About Section -->
     

     

      <!-- ======= Speakers Section ======= -->
      @if($speakers->count() > 0)
      <section id="speakers">
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2>Event Speakers</h2>
            <p>Here are some of our speakers</p>
          </div>
          <div class="row">
            @foreach($speakers as $speaker)
            <div class="col-lg-4 col-md-6">
              <div class="speaker" data-aos="fade-up" data-aos-delay="100">
                <img src="{{asset('storage/speaker/'.$speaker->image)}}" alt="Speaker 1" class="img-fluid">
                <div class="details">
                  <h3><a href="{{ url('speaker/'.$speaker->id) }}">{{ $speaker->name }}</a></h3>
                <p>{{ $speaker->description }}</p>
                  <div class="social">
                  <a href="{{ $speaker->twitter }}"><i class="fa fa-twitter"></i></a>
                    <a href="{{ $speaker->facebook }}"><i class="fa fa-facebook"></i></a>
                    <a href="{{ $speaker->linkedin }}"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      @endif
      <!-- End Speakers Section -->
  

    <!-- ======= Schedule Section ======= -->
    @if($schedules->count() > 0)
    <section id="schedule" class="section-with-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2>Event Schedule</h2>
            <p>Here is our event schedule</p>
          </div>
          <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
            @foreach($schedules as $key => $day)
            <li class="nav-item">
              <a class="nav-link{{ $key === 1 ? ' active' : '' }}" href="#day-{{ $key }}" role="tab" data-toggle="tab">Day {{ $key }}</a>  
            </li>
            @endforeach
          </ul>  
          <h3 class="sub-heading">Voluptatem nulla veniam soluta et corrupti consequatur neque eveniet officia. Eius
            necessitatibus voluptatem quis labore perspiciatis quia.</h3>
          <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">      
            <!-- Schdule Day 1 -->
            @foreach($schedules as $key => $day)
            <div role="tabpanel" class="col-lg-9 tab-pane fade{{ $key === 1 ? ' show active' : '' }}" id="day-{{ $key }}">
              @foreach($day as $schedule)
              <div class="row schedule-item">
                <div class="col-md-2"><time>{{ \Carbon\Carbon::parse($schedule->start_time)->format("h:i A") }}</time></div>
                <div class="col-md-10">
                  @if($schedule->speaker)
                    <div class="speaker">
                      <img src="{{asset('storage/speaker/'.$schedule->speaker->image)}}" alt="">
                    </div>
                  @endif
                  <h4>{{$schedule->title}} @if($schedule->speaker) <span>{{$schedule->speaker->name}}</span>@endif</h4>
                  <p>{{$schedule->subtitle}}</p>
                </div>
              </div>
            @endforeach
            </div>
            @endforeach      
            <!-- End Schdule Day 1 -->
          </div>
        </div>
      </section>
      @endif
      <!-- End Schedule Section -->


          <!-- ======= Venue Section ======= -->
    <section id="venue">
        <div class="container-fluid" data-aos="fade-up">
          <div class="section-header">
            <h2>Event Venue</h2>
            <p>Event venue location info and gallery</p>
          </div>
          <div class="row no-gutters">
            <div class="col-lg-6 venue-map">
              <iframe src="https://maps.google.com/maps?q={{ $settings['latitude'] ?? '' }},{{ $settings['longitude'] ?? '' }}&hl=en&z=14&amp;output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-lg-6 venue-info">
              <div class="row justify-content-center">
                <div class="col-11 col-lg-8">
                  <h3>{{ $settings['venue_address'] ?? '' }}</h3>
                  <p>{{ $settings['venue_description'] ?? '' }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Venue Section -->


  
      <!-- ======= Hotels Section ======= -->
      @if($hotels->count() > 0)
      <section id="hotels" class="section-with-bg"> 
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2>Hotels</h2>
            <p>Here are some nearby hotels</p>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            @foreach($hotels as $hotel)
            <div class="col-lg-4 col-md-6">
              <div class="hotel">
                <div class="hotel-img">
                  <img src="{{asset('storage/hotel/'.$hotel->image)}}" alt="" class="img-fluid">
                </div>
                <h3><a href="#">{{$hotel->name}}</a></h3>
                <div class="stars">
                  @if($hotel->rating == 0.5)
                  <i class="fa fa-star-half-full"></i>
                  @elseif($hotel->rating == 1)
                  <i class="fa fa-star"></i>
                  @elseif($hotel->rating == 1.5)
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-full"></i>
                  @elseif($hotel->rating == 2)
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  @elseif($hotel->rating == 2.5)
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-full"></i>
                  @elseif($hotel->rating == 3)
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  @elseif($hotel->rating == 3.5)
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-full"></i>
                  @elseif($hotel->rating == 4)
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  @elseif($hotel->rating == 4.5)
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-full"></i>
                  @elseif($hotel->rating == 5)
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  @endif         
                </div>
                <p><i class="fas fa-map-marker-alt"></i> Address: {{ $hotel->address }}<br>
                {{ $hotel->description }}</p>
              </div>
            </div>
            @endforeach       
          </div>
        </div>
      </section>
      @endif
      <!-- End Hotels Section -->
      
      <!-- ======= Gallery Section ======= -->
      @if($galleries->count() > 0)
      <section id="gallery"> 
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2>Gallery</h2>
            <p>Check our gallery from the recent events</p>
          </div>
        </div>
        <div class="owl-carousel gallery-carousel" data-aos="fade-up" data-aos-delay="100">
          @foreach($galleries as $gallery)
            <a href="{{asset('storage/gallery/'.$gallery->image)}}" class="venobox" data-gall="gallery-carousel"><img src="{{asset('storage/gallery/'.$gallery->image)}}" alt=""></a>
         @endforeach
        </div>
      </section>
      @endif
      <!-- End Gallery Section -->

      <!-- ======= Supporters Section ======= -->
      @if($sponsors->count() > 0)
      <section id="supporters" class="section-with-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2>Sponsors</h2>
          </div>  
          <div class="row no-gutters supporters-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">        
            @foreach($sponsors as $sponsor)
            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="supporter-logo">
                <img src="{{asset('storage/sponsor/'.$sponsor->image)}}" class="img-fluid" alt="">
              </div>
            </div>
            @endforeach
          </div> 
        </div>
      </section>
      @endif
    <!-- End Sponsors Section -->

      <!-- =======  F.A.Q Section ======= -->
      @if($faqs->count() > 0)
      <section id="faq">
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2>F.A.Q </h2>
          </div> 
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-9">
              <ul id="faq-list">
                @foreach($faqs as $faq)
                <li>
                  <a data-toggle="collapse" class="collapsed" href="#faq{{$faq->id}}">{{ $faq->question }}<i class="fa fa-minus-circle"></i></a>
                  <div id="faq{{$faq->id}}" class="collapse" data-parent="#faq-list">
                    <p>
                      {{ $faq->answer }}
                    </p>
                  </div>
                </li>
                @endforeach 
              </ul>
            </div>
          </div>  
        </div>
      </section>
      @endif
      <!-- End  F.A.Q Section -->


      <!-- ======= Subscribe Section ======= -->
      <section id="subscribe">
        <div class="container" data-aos="zoom-in">
          <div class="section-header">
            <h2>Newsletter</h2>
            <p>Rerum numquam illum recusandae quia mollitia consequatur.</p>
          </div>
          <form method="POST" action="{{route('subscribe')}}">
            {!! csrf_field() !!}
            <div class="form-row justify-content-center">
              <div class="col-auto">
                <input type="email" id="mail" name="mail"  class="form-control {{ $errors->has('mail') ? 'is-invalid' : '' }}" placeholder="Enter your Email" required value="{{ old('mail', isset($subscriber) ? $subscriber->email : '') }}">
                @if($errors->has('mail'))
                <p class="help-block" style="color:white"> 
                    {{ $errors->first('mail') }}
                </p>
              @endif
              </div>
              <div class="col-auto">
                <button type="submit">Subscribe</button>
              </div>
            </div>
          </form> 
        </div>
      </section><!-- End Subscribe Section -->


  
      <!-- ======= Buy Ticket Section ======= -->
      <section id="buy-tickets" class="section-with-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2>Buy Tickets</h2>
            <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
          </div>
          <div class="row">
            @foreach($tickets as $ticket)
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100" style="margin-bottom:25px;">
              <div class="card mb-5 mb-lg-0">
                <div class="card-body">
                  <h5 class="card-title text-muted text-uppercase text-center">{{ $ticket->name }}</h5>
                  <h6 class="card-price text-center">${{ number_format($ticket->price) }}</h6>
                  <hr>
                  <ul class="fa-ul">
                    @foreach($amenities as $amenity)
                      <li @if(!$ticket->amenities->contains($amenity->id))class="text-muted"@endif>
                        <span class="fa-li"><i class="fa fa-{{ $ticket->amenities->contains($amenity->id) ? 'check' : 'times' }}"></i></span>{{ $amenity->name }}
                      </li>
                    @endforeach
                  </ul>
                  <hr>
                  <div class="text-center">
                    @if($ticket->stock > 0)
                      <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="{{ $ticket->name }}">Buy Now</button>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        
  
        <!-- Modal Order Form -->
        <div id="buy-ticket-modal" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Buy Tickets</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{ route('checkout') }}">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Your Last Name" required>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required >
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone" required>
                  </div>
                  <div class="form-group">                   
                  <input type="number" class="form-control" id="qty" name="qty" placeholder="Your Quantity" min="0"  step="1" required >
                  </div>
                  <div class="form-group">
                    <select id="ticket-type" name="ticket" class="form-control" required>
                      <option value="">-- Select Your Ticket Type --</option>
                      @foreach($tickets as $ticket)
                        @if($ticket->stock > 0)
                          <option value="{{ $ticket->name }}">{{ $ticket->name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn">Buy Now</button>
                  </div>
                </form>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->     
      </section><!-- End Buy Ticket Section -->







  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-header">
            <h2>Contact Us</h2>
            <p>Nihil officia ut sint molestiae tenetur.</p>
          </div>
          <div class="row contact-info">
            <div class="col-md-4">
              <div class="contact-address">
                <i class="ion-ios-location-outline"></i>
                <h3>Address</h3>
                <address>{{ $settings['contact_address'] ?? '' }}</address>
              </div>
            </div>
            <div class="col-md-4">
              <div class="contact-phone">
                <i class="ion-ios-telephone-outline"></i>
                <h3>Phone Number</h3>
                <p><a href="tel:+155895548855">{{ $settings['contact_phone'] ?? '' }}</a></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="contact-email">
                <i class="ion-ios-email-outline"></i>
                <h3>Email</h3>
                <p><a href="mailto:{{$settings['contact_email'] ?? ''}}">{{ $settings['contact_email'] ?? '' }}</a></p>
              </div>
            </div>
          </div>
  
          <div class="form">
          <form action="{{route('contact.send')}}" method="post" role="form">
            {!! csrf_field() !!}
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Your Name"  value="{{ old('name', isset($contact) ? $contact->name : '') }}" />
                  @if($errors->has('name'))
                  <p class="help-block" style="color:red"> 
                      {{ $errors->first('name') }}
                  </p>
                @endif
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Your Email" value="{{ old('email', isset($contact) ? $contact->email : '') }}" />
                  @if($errors->has('email'))
                  <p class="help-block" style="color:red"> 
                      {{ $errors->first('email') }}
                  </p>
                @endif
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject" id="subject" placeholder="Subject" value="{{ old('subject', isset($contact) ? $contact->subject : '') }}" />
                @if($errors->has('subject'))
                <p class="help-block" style="color:red"> 
                    {{ $errors->first('subject') }}
                </p>
              @endif
              </div>
              <div class="form-group">
              <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" rows="5"  placeholder="Message" >{{ old('message', isset($contact) ? $contact->message : '') }}</textarea>
              @if($errors->has('message'))
              <p class="help-block" style="color:red"> 
                  {{ $errors->first('message') }}
              </p>
            @endif 
              </div>
              <div class="text-center"><input type="submit" class="btn btn-danger" value="Send Message"></div>
            </form>
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
  
    </main><!-- End #main -->



 

@endsection

