@extends('base', [
    'title' => 'Liste des appartements',
])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-footer">
                            <a href="{{ route('appartements.create') }}" class="btn btn-info float-right">Ajouter</a>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Liste des appartements</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Appartement</th>
                                        <th>Immeuble</th>
                                        <th style="width: 5px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appartements as $appartement)
                                        <tr>
                                            <td>{{ $appartement->libelle }}</td>
                                            <td>{{ $appartement->immeuble->libelle }}</td>
                                            <td>
                                                <div class="nav-item dropdown-menu-left " style="height: 2px;">
                                                    <a class="nav-link" data-toggle="dropdown" href="#">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-xl-left">
                                                        <a href="{{ route('appartements.edit', $appartement) }}"
                                                            class="dropdown-item">
                                                            <i class="fa fa-edit"></i> Modifier
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <form method="POST"
                                                            action="{{ route('appartements.destroy', $appartement) }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="fa fa-trash"></i> Supprimer
                                                            </button>
                                                        </form>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item">
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
                                        <th>Appartement</th>
                                        <th>Immeuble</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('appartements.create') }}" class="btn btn-info float-right">Ajouter</a>
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
