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
                                <h6 class="m-0 font-weight-bold text-primary">Companies</h6>

                                <a href="{{ route('companies.add') }} "class="btn btn-primary align-self-end">Add New Company</a>
                            
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
                                        <?php

use App\Http\Controllers\CompaniesController;

                                            $comp = new CompaniesController();
                                            $data = $comp->showAll();
                                            
                                        ?>
                                        @foreach($data as $datas)
                                        <tr>
                                            <td>{{ $datas['name'] }}</td>
                                            <td>{{ $datas['email'] }}</td>
                                            <td><img src="comp_logo/{{ $datas['id'] }}.jpg" alt="" height="60px"></td>
                                            <td> <a href="http://{{ $datas['website'] }}">{{ $datas['website'] }}</a></td>
                                            <td>
                                                <form action="{{ route('companies.edit', $datas['id']) }}" method="get">
                                                    <input type="submit" value="Edit" class="btn btn-warning">
                                                </form>
                                                <form action="{{ route('companies.delete', $datas['id']) }}" method="post">
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