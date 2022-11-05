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
            <table class="table table-bordered" id="emp_tables" width="100%" cellspacing="0">
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
@push('script')
<script>
        
        $('#emp_tables').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('employees.index') }}', // memanggil route yang menampilkan data json
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'company',
                    name: 'company'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
    </script>

@endpush