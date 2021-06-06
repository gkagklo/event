@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">         
        @if($checkouts->count() > 0)
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Checkouts List</h3>
              </div>
              <div class="card-body">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Num</th>
                        <th scope="col">Name</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Ticket</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($checkouts as $key=>$checkout)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td>{{ $checkout->name }}</td>
                                <td>{{ $checkout->lastname }}</td>
                                <td>{{ $checkout->email }}</td>
                                <td>{{ $checkout->phone }}</td>
                                <td>{{ $checkout->ticket }}</td> 
                                <td>{{ $checkout->qty }}</td>                           
                                <td>                           
                                      <button class="btn btn-danger waves-effect" type="button" onclick="deleteCheckout({{ $checkout->id }})" >
                                          <i class="material-icons">Delete</i>
                                      </button>
                                  <form id="delete-form-{{ $checkout->id }}" action="{{route('admin.checkouts.destroy',$checkout->id)}}" method="POST" style="display:none;">
                                          {{ csrf_field() }}
                                          {{ method_field('DELETE') }}
                                      </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
              </div>
            </div>
            @else
            <div class="alert alert-warning">
                <strong>Warning!</strong> No data found.
            </div>
            @endif
      </div>
    </div>
</div>

@endsection

@push('js')

<script type="text/javascript">      
    function deleteCheckout(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }

    function updateStatus(id) {
      swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, update it!',
          cancelButtonText: 'No, cancel!',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false,
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
              event.preventDefault();
              document.getElementById('update-form-'+id).submit();
          } else if (
              // Read more about handling dismissals
              result.dismiss === swal.DismissReason.cancel
          ) {
              swal(
                  'Cancelled',
                  'Your data is safe :)',
                  'error'
              )
          }
      })
  }

  </script>

@endpush