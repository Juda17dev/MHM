@extends('base', [
    'title' => 'listes des visites',
])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-footer">
                            <a href="{{ route('visiteurs.create') }}" class="btn btn-info float-right">Nouveau</a>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Ma liste de visite</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Visiteurs</th>
                                        <th>Statut</th>
                                        <th style="width: 5px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visites as $visite)
                                        <tr>
                                            <td>{{ $visite->nom . ' ' . $visite->prenom }}</td>
                                            {{-- <td>{{  }}</td>
                                            <td>{{ $visite->identite }}</td>
                                            <td>{{ $visite->agent->nom . ' ' . $visite->agent->prenom }}</td> --}}
                                            <td>{{ $visite->statut }}</td>
                                            <td>
                                                <div class="nav-item dropdown-menu-left " style="height: 2px;">
                                                    <a class="nav-link" data-toggle="dropdown" href="#">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-xl-left">
                                                        <a href="#"
                                                            class="dropdown-item">
                                                            <i class="fa fa-edit"></i> Modifier
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <form method="POST"
                                                            action="#"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="fa fa-trash"></i> Supprimer
                                                            </button>
                                                        </form>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="{{ route('visiteurs.show', $visite) }}"
                                                            class="dropdown-item">
                                                            <i class="fa fa-eye"></i> Détail
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Visiteurs</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('visiteurs.create') }}" class="btn btn-info float-right">Nouveau</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
