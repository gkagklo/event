@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Amenity</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.amenities.store') }}">
              {!! csrf_field() !!}
            <div class="card-body">   
                  <div class="form-group">
                    <label for="name">Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Enter name" value="{{ old('name', isset($amenity) ? $amenity->name : '') }}">
                    @if($errors->has('name'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('name') }}
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