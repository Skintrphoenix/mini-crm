@extends('../layouts.master')
@section('container')
    <!-- Page Wrapper -->
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

                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Employees</h6>

                                <a href="{{ route('employees.add') }} "class="btn btn-primary align-self-end">Add New Employees</a>
                            
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
                                        <?php

use App\Http\Controllers\EmployeesController;
use App\Models\Companies;

                                            $comp = new EmployeesController();
                                            $data = $comp->showAll();
                                            
                                            
                                        ?>
                                        @foreach($data as $datas)
                                        <tr>
                                            <td>{{ $datas['first_name'] }} {{ $datas['last_name'] }}</td>
                                            <?php
                                                $company = Companies::where('id', 'LIKE', '%' . $datas['company'] . '%')->first();
                                            ?>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $datas['email'] }}</td>
                                            
                                            <td>{{ $datas['phone'] }}</td>
                                            <td>
                                                <form action="{{ route('employees.edit', $datas['id']) }}" method="get">
                                                    <input type="submit" value="Edit" class="btn btn-warning">
                                                </form>
                                                <form action="{{ route('employees.delete', $datas['id']) }}" method="post">
                                                    <input type="submit" value="Delete" class="btn btn-danger">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>


                                            
                                                

                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('../partials.logout')

    @endsection