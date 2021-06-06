@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Hotel</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.hotels.store') }}" enctype="multipart/form-data">
              {!! csrf_field() !!}
            <div class="card-body">   
                  <div class="form-group">
                    <label for="name">Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Enter name" value="{{ old('name', isset($hotel) ? $hotel->name : '') }}">
                    @if($errors->has('name'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('name') }}
                      </p>
                    @endif
                  </div> 
                  <div class="form-group">
                      <label for="address">Address <span style="color:red">*</span></label>
                      <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address" name="address" placeholder="Enter address" value="{{ old('address', isset($hotel) ? $hotel->address : '') }}">
                      @if($errors->has('address'))
                        <p class="help-block" style="color:red"> 
                            {{ $errors->first('address') }}
                        </p>
                      @endif
                    </div> 
                  <div class="form-group">
                    <label for="description">Description <span style="color:red">*</span></label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="3" placeholder="Enter description" name="description">{{ old('description', isset($hotel) ? $hotel->description : '') }}</textarea>
                    @if($errors->has('description'))
                    <p class="help-block" style="color:red"> 
                        {{ $errors->first('description') }}
                    </p>
                  @endif
                </div>
                <div class="form-group">
                    <label for="rating">Rating <span style="color:red">*</span></label>
                    <input type="number" step="0.5" min="0" max="5" class="form-control {{ $errors->has('rating') ? 'is-invalid' : '' }}" id="rating" name="rating" placeholder="Enter rating" value="{{ old('rating', isset($hotel) ? $hotel->rating : '') }}">
                    @if($errors->has('rating'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('rating') }}
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