@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Sponsor</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.sponsors.store') }}" enctype="multipart/form-data">
              {!! csrf_field() !!}
            <div class="card-body">   
                  <div class="form-group">
                    <label for="name">Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Enter name" value="{{ old('name', isset($sponsor) ? $sponsor->name : '') }}">
                    @if($errors->has('name'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('name') }}
                      </p>
                    @endif
                  </div>  
                <div class="form-group">
                    <label for="image" class="form-control-label">Image <span style="color:red">*</span></label>
                    <input type="file" id="image" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                    @if($errors->has('image'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('image') }}
                      </p>
                    @endif
                </div>
              </div>                 
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            
          </div>
    </div>
  </div>
</div>


@endsection