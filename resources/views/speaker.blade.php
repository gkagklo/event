@extends('layouts.main')
@section('content')

<main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
    <section id="speakers-details">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Speaker Details</h2>
          <p>Praesentium ut qui possimus sapiente nulla.</p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <img src="{{asset('storage/speaker/'.$speakerDetails->image)}}" alt="" class="img-fluid">
          </div>

          <div class="col-md-6">
            <div class="details">
              <h2>{{ $speakerDetails->name }}</h2>
              <div class="social">
                <a href="{{ $speakerDetails->twitter }}"><i class="fa fa-twitter"></i></a>
                <a href="{{ $speakerDetails->facebook }}"><i class="fa fa-facebook"></i></a>
                <a href="{{ $speakerDetails->googleplus }}"><i class="fa fa-google-plus"></i></a>
                <a href="{{ $speakerDetails->linkedin }}"><i class="fa fa-linkedin"></i></a>
              </div>
                <p>{!! $speakerDetails->full_description  !!}</p>
            </div>
          </div>

        </div>
      </div>

    </section>

  </main><!-- End #main -->

@endsection