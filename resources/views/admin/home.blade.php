@extends('layouts.admin')
@section('content')

        <!-- Info boxes -->
        <div class="row">

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>  
                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number"> {{ $users->count() }} </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-user-tag"></i></span>  
                    <div class="info-box-content">
                        <span class="info-box-text">Roles</span>
                        <span class="info-box-number"> {{ $roles->count() }} </span>
                    </div>
                </div>
            </div>
            

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa-fw fas fa-cogs"></i></span>  
                    <div class="info-box-content">
                        <span class="info-box-text">Settings</span>
                        <span class="info-box-number"> {{ $settings->count() }} </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa-fw fas fa-user"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Speakers</span>
                  <span class="info-box-number">
                    {{ $speakers->count() }}
                  </span>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa-fw far fa-clock"></i></span> 
                <div class="info-box-content">
                  <span class="info-box-text">Schedules</span>
                  <span class="info-box-number"> {{ $schedules->count() }} </span>
                </div>
              </div>
            </div>
 
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa-fw fas fa-hotel"></i></span> 
                <div class="info-box-content">
                  <span class="info-box-text">Hotels</span>
                  <span class="info-box-number"> {{ $hotels->count() }} </span>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-fw fas fa-images"></i></span>  
                <div class="info-box-content">
                  <span class="info-box-text">Galleries</span>
                  <span class="info-box-number"> {{ $galleries->count() }} </span>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-dark elevation-1"><i class="fa-fw fas fa-hand-holding-usd"></i></span>  
                    <div class="info-box-content">
                        <span class="info-box-text">Sponsors</span>
                        <span class="info-box-number"> {{ $sponsors->count() }} </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fa-fw fas fa-question"></i></span>  
                    <div class="info-box-content">
                        <span class="info-box-text">Faqs</span>
                        <span class="info-box-number"> {{ $faqs->count() }} </span>
                    </div>
                </div>
            </div> 
            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fa-fw fas fa-check"></i></span>  
                    <div class="info-box-content">
                        <span class="info-box-text">Amenities</span>
                        <span class="info-box-number"> {{ $amenities->count() }} </span>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa-fw fas fa-money-bill"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tickets</span>
                        <span class="info-box-number">
                          {{ $tickets->count() }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-credit-card"></i></span> 
                    <div class="info-box-content">
                        <span class="info-box-text">Checkouts</span>
                        <span class="info-box-number"> {{ $checkouts->count() }} </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa-fw fas fa-envelope"></i></span> 
                <div class="info-box-content">
                  <span class="info-box-text">Contacts</span>
                  <span class="info-box-number"> {{ $contacts->count() }} </span>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="far fa-thumbs-up"></i></span>  
                <div class="info-box-content">
                  <span class="info-box-text">Subscribers</span>
                  <span class="info-box-number"> {{ $subscribers->count() }} </span>
                </div>
              </div>
            </div>


          </div>

@endsection