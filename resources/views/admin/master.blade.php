<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard | Upcube - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.icon')}}">

    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
</head>
<body data-topbar="dark">
    <div id="layout-wrapper">
        @include('admin.includes.header')
        @include('admin.includes.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('adminContent')
                </div>
            </div>
            @include('admin.includes.footer')
        </div>
    </div>
    <div class="rightbar-overlay"></div>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--tinymce js-->
    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }} "></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }} "></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

 <script src="{{ asset('assets/js/code.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="{{ asset('assets/js/code.js') }}"></script>
</body>
</html>
