@extends('base', [
    'title' => 'listes des immeubles',
])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-footer">
                            <a href="{{ route('immeubles.create') }}" class="btn btn-info float-right">Ajouter</a>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title text-lg"><i class="fas fa-city"></i>  Liste des immeubles</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom de l'immeuble</th>
                                        <th>Adresse</th>
                                        <th style="width: 5px">Action</th </tr>
                                </thead>
                                <tbody>
                                    @foreach ($immeubles as $immeuble)
                                        <tr>
                                            <td>{{ $immeuble->libelle }}</td>
                                            <td>{{ $immeuble->adresse }}</td>
                                            <td>
                                                <div class="nav-item dropdown-menu-left " style="height: 2px;">
                                                    <a class="nav-link" data-toggle="dropdown" href="#">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-xl-left">
                                                        <a href="{{ route('immeubles.edit', $immeuble) }}"
                                                            class="dropdown-item">
                                                            <i class="fa fa-edit"></i> Modifier
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <form method="POST"
                                                            action="{{ route('immeubles.destroy', $immeuble) }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="fa fa-trash"></i> Supprimer
                                                            </button>
                                                        </form>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="{{ route('immeubles.show',$immeuble) }}" class="dropdown-item">
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
                                        <th>Nom de l'immeuble</th>
                                        <th>Adresse</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('immeubles.create') }}" class="btn btn-info float-right">Ajouter</a>
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

