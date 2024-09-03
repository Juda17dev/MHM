@extends('base',[
    'title'=>'Modifier un appartement'
])
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Modifier mes informations</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @include('incidents._form',[
                    'action' => route('incidents.update',$appartement),
                    'method' => true
                ])
            </div>
        </div>
    </section>
@endsection
