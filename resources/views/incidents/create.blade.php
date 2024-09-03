@extends('base',[
    'title'=>'Ajouter un incident'
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
                @include('incidents._form',[
                    "action" => route('incidents.store'),
                ])
            </div>
        </div>
    </section>
@endsection
