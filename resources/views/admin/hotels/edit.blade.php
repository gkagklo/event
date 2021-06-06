@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Hotel</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.hotels.update',$hotel->id) }}" enctype="multipart/form-data">
              {!! csrf_field() !!}
              {{ method_field('PUT') }}
            <div class="card-body">   
                  <div class="form-group">
                    <label for="name">Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Enter name" value="{{ $hotel->name }}">
                    @if($errors->has('name'))
                      <p class="help-block" style="color:red"> 
                        {{ $errors->first('name') }}
                      </p>
                    @endif
                  </div>
                  <div class="form-group">
                      <label for="address">Address <span style="color:red">*</span></label>
                      <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address" name="address" placeholder="Enter address" value="{{ $hotel->address }}">
                      @if($errors->has('address'))
                        <p class="help-block" style="color:red"> 
                          {{ $errors->first('address') }}
                        </p>
                      @endif
                    </div>   
                  <div class="form-group">
                    <label for="description">Description <span style="color:red">*</span></label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="3" placeholder="Enter description" name="description">{{ $hotel->description }}</textarea>
                    @if($errors->has('description'))
                    <p class="help-block" style="color:red"> 
                      {{ $errors->first('description') }}
                    </p>
                  @endif
                </div>
                <div class="form-group">
                    <label for="rating">Rating <span style="color:red">*</span></label>
                    <input type="number" step="0.5" min="0" max="5" class="form-control  {{ $errors->has('rating') ? 'is-invalid' : '' }}" id="rating" name="rating" placeholder="Enter rating" value="{{ $hotel->rating }}">
                    @if($errors->has('rating'))
                      <p class="help-block" style="color:red"> 
                        {{ $errors->first('rating') }}
                      </p>
                    @endif
                  </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file"  name="image" class="form-control border-input">
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