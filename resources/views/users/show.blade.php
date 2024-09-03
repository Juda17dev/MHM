@extends('base', [
    'title' => "Détails du compte",
])

@section('content')
    <div class="col-12">
        <div class="callout callout-info">
            <h2><i class="fas fa-user"></i>  {{ $user->nom . ' ' . $user->prenom }}</h2>

        </div>


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-info-circle"></i> Informations relatives
                        <small class="float-right">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-info">
                                <i class="fa fa-edit"></i> Modifer
                            </a>
                        </small>
                    </h4>

                </div>
                <!-- /.col -->
            </div>
            <div class="dropdown-divider"></div>

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <div class="row invoice-info">
                        <div class="col-sm-3 invoice-col">
                            <br>
                            <address>
                                <h5>Non : </h5>
                                <br>
                                <h5>Prenom: </h5>
                                <br>
                                <h5>Téléphone:</h5>
                                <br>
                                <h5>Email:</h5>
                                <br>
                                <h5>Immeuble:</h5>
                                <br>
                                <h5>Appartement</h5>
                                <br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-8 invoice-col">
                            <br>
                            <address>
                                <h5>{{ $user->nom }}</h5>
                                <br>
                                <h5>{{ $user->prenom }}</h5>
                                <br>
                                <h5>{{ $user->telephone }}</h5>
                                <br>
                                <h5>{{ $user->email }}</h5>
                                <br>
                                <h5>{{ $user->immeubles }}</h5>
                                <br>
                                <h5>{{ $user->appartements }}</h5>
                            </address>
                        </div>
                        <!-- /.col -->

                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->




        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->
@endsection
