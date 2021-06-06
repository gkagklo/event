@extends('layouts.admin')
@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <a class="btn btn-success" href="{{ route("admin.roles.create") }}" >
              Add New  
           </a><br><br>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Roles List</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
              @foreach($roles as $role)
                  <tr>
                    <td>{{ $role->name }}</td>
                    <th>
                          <a href="{{ route('admin.roles.edit', $role->id) }}">
                              <button type="button" class="btn btn-primary btn-sm"> Edit</button>
                          </a>
                          <button rel="tooltip" title="Remove"
                                          class="btn btn-sm btn-danger btn-icon table-action"
                                          onclick="deleteRole({{ $role->id }})">
                                      Delete
                          </button>
                          <div class="collapse">
                                  <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy',$role->id) }}" method="POST" style="display:none;">
                                          {{ csrf_field() }}
                                          {{ method_field('DELETE') }}
                                  </form>
                          </div>
                      </th>
                  </tr>
              @endforeach
                  </tbody>
                </table>
              </div>
            </div>
      </div>
    </div>
</div>


@endsection


@push('js')

<script type="text/javascript">      
    function deleteRole(id) {
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