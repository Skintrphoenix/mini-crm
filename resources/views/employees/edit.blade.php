@extends('/layouts.master')
@section('container')
<form action="{{ route('employees.update', $employees->id) }}" method="post">
    @csrf
    @method('PUT')


    <div class="mb-3">
        <label for="exampleFormControlInput1">First Name</label>
        <input class="form-control form-control-solid" id="first_name" name="first_name" value="{{ $employees->first_name }}" type="text" placeholder="First Name">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1">Last Name</label>
        <input class="form-control form-control-solid" id="last_name" name="last_name" value="{{ $employees->last_name }}" type="text" placeholder="Last Name">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1">Company</label>
        <select name="company_id" id="company_id" class="form-control">
            @if($employees->hasCompany())
                <option value="{{ $employees->company->id }}">{{ $employees->company->name }}</option>
                <option value="">-</option>
                @foreach($companies as $key => $value)
                    @if($value->id !== $employees->company->id)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endif
                @endforeach
            @else
                <option value="">-</option>
                @foreach($companies as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1">Email Address</label>
        <input class="form-control form-control-solid" id="email" value="{{ $employees->email }}" name="email" type="email" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1">Phone</label>
        <input class="form-control form-control-solid" id="phone" value="{{ $employees->phone }}" name="phone" type="text" placeholder="08xx-xxxx-xxxx">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection