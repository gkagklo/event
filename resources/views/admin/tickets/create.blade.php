@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Ticket</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.tickets.store') }}">
              {!! csrf_field() !!}
            <div class="card-body">   
              <div class="form-group">
                <label for="name">Name <span style="color:red">*</span></label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Enter name" value="{{ old('name', isset($ticket) ? $ticket->name : '') }}">
                @if($errors->has('name'))
                  <p class="help-block" style="color:red"> 
                      {{ $errors->first('name') }}
                  </p>
                @endif
              </div>  
                  <div class="form-group">
                    <label for="price">Price <span style="color:red">*</span></label>
                    <input type="number" step="0.01" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price" placeholder="Enter price" value="{{ old('price', isset($ticket) ? $ticket->price : '') }}">
                    @if($errors->has('price'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('price') }}
                      </p>
                    @endif
                  </div> 
                  <div class="form-group">
                    <label for="amenities">Amenities <span style="color:red">*</span></label>
                    <select name="amenities[]" id="amenities" class="form-control {{ $errors->has('amenities') ? 'is-invalid' : '' }}" multiple="multiple">
                      @foreach($amenities as $id => $amenities)
                          <option value="{{ $id }}" {{ (in_array($id, old('amenities', [])) || isset($ticket) && $ticket->amenities->contains($id)) ? 'selected' : '' }}>{{ $amenities }}</option>
                      @endforeach
                  </select>
                  @if($errors->has('amenities'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('amenities') }}
                      </p>
                  @endif
                </div>
                <div class="form-group">
                    <label for="stock">Stock <span style="color:red">*</span></label>
                    <input type="number" min="0"   class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" id="stock" name="stock" placeholder="Enter stock" value="{{ old('stock', isset($ticket) ? $ticket->stock : '') }}">
                    @if($errors->has('stock'))
                      <p class="help-block" style="color:red"> 
                          {{ $errors->first('stock') }}
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