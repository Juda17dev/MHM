<!DOCTYPE html>
<html lang="en">

<head>
    <title> {{ $title }} </title>
    @include('partials._head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @php
        $user = Auth::user();
    @endphp
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('partials._navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @if ($user->role_id == 3)
            @include('partials._proprietaires_sidebar')
        @elseif($user->role_id == 2)
            @include('partials._locataires_sidebar')
        @elseif ($user->role_id == 1)
            @include('partials._agents_sidebar')
        @endif
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            @yield('content')
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('partials._script')
    @yield('otherscript')

</body>

</html>
