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
        <h6 class="m-0 font-weight-bold text-primary">Companies</h6>
        <a href="{{ route('companies.create') }}" class="btn btn-small btn-primary">Add new company</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0" id="comp_tables">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
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
@section('script')
<script>
    $('#comp_tables').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('companies.index') }}', // memanggil route yang menampilkan data json
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'logo',
                    name: 'logo'
                },
                {
                    data: 'website',
                    name: 'website'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
</script>
@endsection