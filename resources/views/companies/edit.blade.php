@extends('/layouts.master')
@section('container')

<form action="{{ route('companies.update', $companies->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="mb-3">
        <label for="exampleFormControlInput1">Name</label>
        <input class="form-control form-control-solid" id="name" name="name" type="text" placeholder="Company Name" value="{{ $companies->name }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1">Email Address</label>
        <input class="form-control form-control-solid" id="email" name="email" type="email" placeholder="name@example.com" value="{{ $companies->email }}">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Logo</label>
        <input class="form-control-file" type="file" name="logo" id="logo">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1">Website</label>
        <input class="form-control form-control-solid" id="website" name="website" type="text" placeholder="www.example.com" value="{{ $companies->website }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection