@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Setting</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.settings.update',$setting->id) }}">
              {!! csrf_field() !!}
              {{ method_field('PUT') }}
            <div class="card-body">   
                  <div class="form-group">
                    <label for="key">Key <span style="color:red">*</span></label>
                    <input type="key" class="form-control  {{ $errors->has('key') ? 'is-invalid' : '' }}" id="key" name="key" placeholder="Enter key" value="{{ $setting->key }}">
                    @if($errors->has('key'))
                      <p class="help-block" style="color:red"> 
                        {{ $errors->first('key') }}
                      </p>
                    @endif
                  </div>  
                  <div class="form-group">
                    <label for="value">Value</label>
                    <textarea class="form-control" rows="3" placeholder="Enter value" name="value">{{ $setting->value }}</textarea>
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