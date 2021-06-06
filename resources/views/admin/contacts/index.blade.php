@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">         
        @if($contacts->count() > 0)
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Contacts List</h3>
              </div>
              <div class="card-body">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Num</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Sent At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $key => $contact)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $contact->name }}</td>    
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->created_at }}</td>               
                                <td>
                                    <a href="{{ route('admin.contacts.show',$contact->id) }}" class="btn btn-sm btn-info">
                                        <i class="material-icons">View</i>
                                    </a>
                                    <button rel="tooltip" title="Remove"
                                                    class="btn btn-sm btn-danger btn-icon table-action"
                                                    onclick="deleteContact({{ $contact->id }})">
                                                Delete
                                    </button>
                                    <div class="collapse">
                                            <form id="delete-form-{{ $contact->id }}" action="{{ route('admin.contacts.destroy',$contact->id) }}" method="POST" style="display:none;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                            </form>
                                    </div>
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
    function deleteContact(id) {
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
  </script>

@endpush