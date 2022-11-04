@extends('/layouts.master')
@section('container')
<!-- DataTales Example -->
@if(Session::has('message'))
<div class="alert alert-primary" role="alert">
{{ Session::get("message") }}
</div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
        <a href="{{ route('employees.create') }}" class="btn btn-small btn-primary">Add new employee</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($employees->all() as $key => $value)
                    <tr>
                        <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                        
                        @if($value->hasCompany())
                            <td>{{ $value->company->name }}</td>
                        @else
                            <td>-</td>
                        @endif
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone }}</td>

                        <td>
                            <a class="btn btn-small btn-warning" href="{{ route('employees.edit', $value->id) }}">Edit</a>
                            <a class="btn btn-small btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" onclick="loadDeleteModal('{{ route('employees.destroy', $value->id) }}')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="" method="post" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

                