@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Schedule</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.schedules.store') }}">
              {!! csrf_field() !!}
            <div class="card-body">   
                  <div class="form-group">
                    <label for="day_number">Day Number <span style="color:red">*</span></label>
                    <input type="number" min="1" class="form-control {{ $errors->has('day_number') ? 'is-invalid' : '' }}" id="day_number" name="day_number" placeholder="Enter day number" value="{{ old('day_number', isset($schedule) ? $schedule->day_number : '') }}">
                    @if($errors->has('day_number'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('day_number') }}
                      </p>
                    @endif
                  </div>
                  <div class="form-group">
                        <label for="start_time">Start Time <span style="color:red">*</span></label>
                        <input type="time" class="form-control {{ $errors->has('start_time') ? 'is-invalid' : '' }}" id="start_time" name="start_time" placeholder="Enter start time" value="{{ old('start_time', isset($schedule) ? $schedule->start_time : '') }}">
                        @if($errors->has('start_time'))
                          <p class="help-block" style="color:red"> 
                              {{ $errors->first('start_time') }}
                          </p>
                        @endif
                </div>
                <div class="form-group">
                    <label for="title">Title <span style="color:red">*</span></label>
                    <textarea class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" rows="3" placeholder="Enter title" name="title">{{ old('title', isset($schedule) ? $schedule->title : '') }}</textarea>
                    @if($errors->has('title'))
                    <p class="help-block" style="color:red"> 
                        {{ $errors->first('title') }}
                    </p>
                  @endif
                </div>
                <div class="form-group">
                        <label for="subtitle">Subtitle <span style="color:red">*</span></label>
                        <textarea class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" rows="3" placeholder="Enter subtitle" name="subtitle">{{ old('subtitle', isset($schedule) ? $schedule->subtitle : '') }}</textarea>
                        @if($errors->has('subtitle'))
                        <p class="help-block" style="color:red"> 
                            {{ $errors->first('subtitle') }}
                        </p>
                      @endif
                </div>
                <div class="form-group">
                    <label class="bmd-label-floating">Speaker <span style="color:red">*</span></label>
                    <select class="form-control {{ $errors->has('speaker') ? 'is-invalid' : '' }}" name="speaker">
                        <option selected="true" disabled="disabled">Select Speaker</option>   
                        @foreach($speakers as $speaker)
                            <option value="{{ $speaker->id }}"  @if(old('speaker') == $speaker->id) {{ 'selected' }} @endif>{{ $speaker->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('speaker'))
                        <p class="help-block" style="color:red"> 
                            {{ $errors->first('speaker') }}
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