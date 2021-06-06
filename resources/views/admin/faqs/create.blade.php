@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Faq</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.faqs.store') }}">
              {!! csrf_field() !!}
            <div class="card-body">   
                  <div class="form-group">
                    <label for="question">Question <span style="color:red">*</span></label>
                    <textarea class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" rows="3" placeholder="Enter question" name="question">{{ old('question', isset($faq) ? $faq->question : '') }}</textarea>
                    @if($errors->has('question'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('question') }}
                      </p>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="answer">Answer <span style="color:red">*</span></label>
                    <textarea class="form-control {{ $errors->has('answer') ? 'is-invalid' : '' }}" rows="3" placeholder="Enter answer" name="answer">{{ old('answer', isset($faq) ? $faq->answer : '') }}</textarea>
                    @if($errors->has('answer'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('answer') }}
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