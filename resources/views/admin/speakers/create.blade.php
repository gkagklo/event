@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Speaker</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.speakers.store') }}" enctype="multipart/form-data">
              {!! csrf_field() !!}
            <div class="card-body">   
                  <div class="form-group">
                    <label for="name">Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Enter name" value="{{ old('name', isset($speaker) ? $speaker->name : '') }}">
                    @if($errors->has('name'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('name') }}
                      </p>
                    @endif
                  </div>  
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter description" name="description">{{ old('description', isset($speaker) ? $speaker->description : '') }}</textarea>
                </div>
                <div class="form-group">
                  <label for="full_description">Full description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter full description" name="full_description">{{ old('full_description', isset($speaker) ? $speaker->full_description : '') }}</textarea>
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
                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter twitter" value="{{ old('twitter', isset($speaker) ? $speaker->twitter : '') }}">
                </div> 
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter facebook" value="{{ old('facebook', isset($speaker) ? $speaker->facebook : '') }}">
                </div>
                <div class="form-group">
                    <label for="linkedin">Linkedin</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter linkedin" value="{{ old('linkedin', isset($speaker) ? $speaker->linkedin : '') }}">
                </div> 
                <div class="form-group">
                  <label for="googleplus">Googleplus</label>
                  <input type="text" class="form-control" id="googleplus" name="googleplus" placeholder="Enter googleplus" value="{{ old('googleplus', isset($speaker) ? $speaker->googleplus : '') }}">
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