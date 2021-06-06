@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Amenity</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.amenities.update',$amenity->id) }}">
              {!! csrf_field() !!}
              {{ method_field('PUT') }}
            <div class="card-body">   
                  <div class="form-group">
                    <label for="name">Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Enter name" value="{{ $amenity->name }}">
                    @if($errors->has('name'))
                      <p class="help-block" style="color:red"> 
                        {{ $errors->first('name') }}
                      </p>
                    @endif
                  </div>                 
              </div>                 
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            
          </div>
    </div>
  </div>
</div>


@endsection