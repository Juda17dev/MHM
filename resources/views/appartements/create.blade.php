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
