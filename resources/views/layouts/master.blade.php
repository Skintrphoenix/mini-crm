<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - {{ $title }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{$folder}}vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{$folder}}css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{$folder}}vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">


@yield('container')

    <!-- Bootstrap core JavaScript-->
    <script src="{{$folder}}vendor/jquery/jquery.min.js"></script>
    <script src="{{$folder}}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{$folder}}vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{$folder}}js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="{{$folder}}vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{$folder}}js/demo/chart-area-demo.js"></script>
<script src="{{$folder}}js/demo/chart-pie-demo.js"></script>

<script src="{{$folder}}js/demo/datatables-demo.js"></script>
<script src="{{$folder}}vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{$folder}}vendor/datatables/dataTables.bootstrap4.min.js"></script>

</body>

</html>