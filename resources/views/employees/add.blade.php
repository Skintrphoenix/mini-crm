@extends('../layouts.master')
@section('container')
<div id="wrapper">

    <!-- Sidebar -->
    @include('../partials.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('../partials.topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <form method="post" action="{{ route('employees.create') }}" enctype="multipart/form-data">

                @csrf
                @method('POST')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">First Name</label>
                        <input class="form-control form-control-solid" id="first_name" name="first_name" type="text" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Last Name</label>
                        <input class="form-control form-control-solid" id="last_name" name="last_name" type="text" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Company</label>
                        <?php

use App\Models\Companies;
use App\Models\Employees;


                $company = Companies::all();

            ?>
                        <select class="form-control" name="company">
                            @foreach($company as $comp)
                                <option value="{{$comp->id}}" >{{$comp->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Email Address</label>
                        <input class="form-control form-control-solid" id="email" name="email" type="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Phone</label>
                        <input class="form-control form-control-solid" id="phone" name="phone" type="text" placeholder="name@example.com">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                
                
                    
                </form>
            </div>
        </div>
    </div>
   
</div>
<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


@endsection