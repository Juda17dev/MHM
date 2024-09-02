@extends('base',[
    'title'=>'Ajouter un appartement'
]);

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Ajouter un appartement</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @include('appartements._form',[
                    "action" => route('appartements.store'),
                ])
            </div>
        </div>
    </section>
@endsection

@section('script')
    <!-- jQuery -->
    <script src="{{ asset('../../plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('../../plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('../../dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('../../dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
