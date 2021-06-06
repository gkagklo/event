@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Speaker</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.speakers.update',$speaker->id) }}" enctype="multipart/form-data">
              {!! csrf_field() !!}
              {{ method_field('PUT') }}
            <div class="card-body">   
                  <div class="form-group">
                    <label for="name">Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Enter name" value="{{ $speaker->name }}">
                    @if($errors->has('name'))
                      <p class="help-block" style="color:red"> 
                        {{ $errors->first('name') }}
                      </p>
                    @endif
                  </div>  
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter description" name="description">{{ $speaker->description }}</textarea>
                </div>
                <div class="form-group">
                  <label for="full_description">Full description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter full description" name="full_description">{{ $speaker->full_description }}</textarea>
              </div>
                <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file"  name="image" class="form-control border-input">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter twitter" value="{{ $speaker->twitter }}">
                </div> 
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter facebook" value="{{ $speaker->facebook }}">
                </div>
                <div class="form-group">
                    <label for="linkedin">Linkedin</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter linkedin" value="{{ $speaker->linkedin }}">
                </div> 
                <div class="form-group">
                  <label for="googleplus">Googleplus</label>
                  <input type="text" class="form-control" id="googleplus" name="googleplus" placeholder="Enter googleplus" value="{{ $speaker->googleplus }}">
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