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
                <form method="post" action="{{ route('companies.create') }}" enctype="multipart/form-data">

                @csrf
                @method('POST')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Name</label>
                        <input class="form-control form-control-solid" id="name" name="name" type="text" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Email Address</label>
                        <input class="form-control form-control-solid" id="email" name="email" type="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Website</label>
                        <input class="form-control form-control-solid" id="website" name="website" type="text" placeholder="www.example.com">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Logo</label>
                        <input class="form-control-file" type="file" name="file" id="formFile">
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