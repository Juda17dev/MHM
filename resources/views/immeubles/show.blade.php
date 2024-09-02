@extends('base', [
    'title' => "Détails de l'immeuble",
])

@section('content')
    <div class="col-12">
        <div class="callout callout-info">
            <h2><i class="fas fa-building"></i> Nom de l'immeuble: {{ $immeuble->libelle }}</h2>
            <br>
            <h4><i class="fas fa-map-marker-alt"></i> Addresse de votre immeuble: {{ $immeuble->adresse }}</h4>

        </div>

        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-city text-dark"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total des appartements</span>
                        <span class="info-box-number">
                            {{ $nbrappartement }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users text-dark"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total des locataires</span>
                        <span class="info-box-number">{{ $nbrlocataire }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-shield text-dark"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total des agents</span>
                        <span class="info-box-number">{{ $nbragent }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-check text-dark"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total des visiteurs</span>
                        <span class="info-box-number">2,000</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <br>
        <div class="dropdown-divider"></div>
        <!-- Main content -->
        <br>

        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-home"></i> Liste des appartements
                        <small class="float-right">
                            <a href="{{ route('appartements.create') }}" class="btn btn-info">
                                <i class="fa fa-plus"></i>    Ajouter
                            </a>
                        </small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Appartements</th>
                                <th style="width: 5px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appartements as $appartement)
                                <tr>
                                    <td>{{ $appartement->libelle }}</td>
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
                                                <a href="{{ route('appartements.show', $appartement) }}"
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
                                <th>Appartements</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->




        </div>

        <br>
        <div class="dropdown-divider"></div>
        <!-- /.invoice -->
        <br>

        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-home"></i> Liste des agents
                        <small class="float-right">
                            <a href="{{ route('users.create') }}" class="btn btn-info">
                                <i class="fa fa-user-plus"></i> Ajouter
                            </a>
                        </small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Agents</th>
                                <th style="width: 5px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agents as $agent)
                                <tr>
                                    <td>{{ $agent->nom . ' ' . $agent->prenom }}</td>
                                    <td>
                                        <div class="nav-item dropdown-menu-left " style="height: 2px;">
                                            <a class="nav-link" data-toggle="dropdown" href="#">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-xl-left">
                                                <a href="{{ route('users.edit', $agent) }}"
                                                    class="dropdown-item">
                                                    <i class="fa fa-edit"></i> Modifier
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <form method="POST"
                                                    action="{{ route('users.destroy', $agent) }}"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="fa fa-trash"></i> Supprimer
                                                    </button>
                                                </form>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{ route('users.show', $agent) }}"
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
                                <th>Agents</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->




        </div>
    </div><!-- /.col -->
@endsection
