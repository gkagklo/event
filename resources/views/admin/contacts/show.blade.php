@extends('layouts.admin')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">    
        <div class="col-md-12">
          <div class="card">        
            <div class="card-header card-header-primary">              
            <h4 class="card-title ">{{ $contact->subject }}</h4>
            </div>
            <div class="card-content">
                <div class="row" >
                  <div class="col-md-12" style="margin:15px;">
                  <strong>Name:  </strong>  {{ $contact->name }}<br>
                  <b>Email:</b>  {{ $contact->email }}  <br>
                  <strong> Message: </strong> <br>
                  <p> {{ $contact->message }} </p> <hr>
                  </div>
                </div>
                <a href=" {{route('admin.contacts.index')}} " type="button" class="btn btn-danger" style="margin:15px;">Back</a>  
              </div>
          
          </div>
          
        </div>
      
      </div>
    </div>
  </div>

@endsection