@extends('base', [
    'title' => 'listes des visiteurs',
])


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-footer">
                            <a href="{{ route('visiteurs.create') }}" class="btn btn-info float-right">Ajouter</a>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Liste des visiteurs</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>identite</th>
                                        <th>Locataire</th>
                                        <th>Agent</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visiteurs as $visiteur)
                                        <tr>
                                            <td>{{ $visiteur->nom }}</td>
                                            <td>{{ $visiteur->prenom }}</td>
                                            <td>{{ $visiteur->identite }}</td>
                                            <td>{{ $visiteur->locataire->nom.' '.$visiteur->agent->prenom }}</td>
                                            <td>{{ $visiteur->agent->nom.' '.$visiteur->agent->prenom }}</td>
                                            <td>{{ $visiteur->statut }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('visiteurs.create') }}" class="btn btn-info float-right">Ajouter</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <!-- jQuery -->
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/dist/js/demo.js') }}"></script>
@endsection

