@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Manage {{ $user->name }}</h3>
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.users.update',$user->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control"  name="name"  placeholder="Enter name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control"  name="email"  placeholder="Enter email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label> Roles </label><br>
                                    @foreach($roles as $role)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="roles[]"  value="{{ $role->id }}" {{ $user->hasAnyRole($role->name)?'checked':''}}>
                                            <label class="form-check-label"> {{ $role->name }} </label>
                                            </div>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection