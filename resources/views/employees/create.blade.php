@extends('/layouts.master')
@section('container')
<form action="{{ route('employees.store') }}" method="post">
    @csrf
    @method('POST')

    <div class="mb-3">
        <label for="exampleFormControlInput1">First Name</label>
        <input class="form-control form-control-solid" id="first_name" name="first_name" type="text" placeholder="First Name">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1">Last Name</label>
        <input class="form-control form-control-solid" id="last_name" name="last_name" type="text" placeholder="Last Name">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1">Company</label>
        <select name="company_id" id="company_id" class="form-control">
            <option value="">-</option>
            @foreach($companies as $key => $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1">Email Address</label>
        <input class="form-control form-control-solid" id="email" name="email" type="email" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1">Phone</label>
        <input class="form-control form-control-solid" id="phone" name="phone" type="text" placeholder="08xx-xxxx-xxxx">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection