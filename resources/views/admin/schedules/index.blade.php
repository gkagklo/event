@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">         
            <a class="btn btn-success" href="{{ route("admin.schedules.create") }}" >
               Add New  
            </a><br><br>
        @if($schedules->count() > 0)
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Schedules List</h3>
              </div>
              <div class="card-body">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Day number</th>
                        <th scope="col">Start time</th>
                        <th scope="col">Title</th>
                        <th scope="col">Subtitle</th>
                        <th scope="col">Speaker</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->day_number }}</td>
                                <td>{{ $schedule->start_time }}</td>    
                                <td>{{ $schedule->title }}</td>
                                <td>{{ $schedule->subtitle }}</td>
                                <td>{{ $schedule->speaker->name }}</td>               
                                <td>
                                    <a href="{{ route('admin.schedules.edit', $schedule->id) }}">
                                        <button type="button" class="btn btn-primary btn-sm"> Edit</button>
                                    </a>
                                    <button rel="tooltip" title="Remove"
                                                    class="btn btn-sm btn-danger btn-icon table-action"
                                                    onclick="deleteSchedule({{ $schedule->id }})">
                                                Delete
                                    </button>
                                    <div class="collapse">
                                            <form id="delete-form-{{ $schedule->id }}" action="{{ route('admin.schedules.destroy',$schedule->id) }}" method="POST" style="display:none;">
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
    function deleteSchedule(id) {
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