@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Setting</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.settings.store') }}">
              {!! csrf_field() !!}
            <div class="card-body">   
                  <div class="form-group">
                    <label for="key">Key <span style="color:red">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" id="key" name="key" placeholder="Enter key" value="{{ old('key', isset($setting) ? $setting->key : '') }}">
                    @if($errors->has('key'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('key') }}
                      </p>
                    @endif
                  </div>     
                  <div class="form-group">
                    <label for="value">Value </label>
                    <textarea class="form-control" rows="3" placeholder="Enter value" name="value">{{ old('value', isset($setting) ? $setting->value : '') }}</textarea>
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