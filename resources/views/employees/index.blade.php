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
        <a href="/employees/create" class="btn btn-small btn-primary">Add new employee</a>
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
                            <a class="btn btn-small btn-warning" href="{{ URL::to('employees/' . $value->id . '/edit') }}">Edit</a>
                            <form action="{{ URL::to('employees/' . $value->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-small btn-danger">


                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection

                