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
        <a href="/companies/create" class="btn btn-small btn-primary">Add new company</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                <tbody>
                    @foreach($companies as $key => $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td><a href="{{ asset('storage/images/'.$value->logo . '.jpg') }}"><img src="{{ asset('storage/images/'. $value->logo . '.jpg') }}" alt="" height="40px"></a></td>
                        <td><a href="http://{{ $value->website }}">{{ $value->website }}</a> </td>

                        <td>
                            <a class="btn btn-small btn-warning" href="{{ URL::to('companies/' . $value->id . '/edit') }}">Edit</a>
                            <form action="{{ URL::to('companies/' . $value->id) }}" method="post">
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

                