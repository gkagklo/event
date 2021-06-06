@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Gallery</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.galleries.update',$gallery->id) }}" enctype="multipart/form-data">
              {!! csrf_field() !!}
              {{ method_field('PUT') }}
            <div class="card-body">    
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