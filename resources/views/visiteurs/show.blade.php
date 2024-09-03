@extends('base', [
    'title' => "Détails du visiteur",
])

@section('content')
    <div class="col-12">
        <div class="callout callout-info">
            <h2><i class="fas fa-user-check"></i> Visiteur: {{ $visiteur->nom . ' ' . $visiteur->prenom }}</h2>

        </div>


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-info-circle"></i> Informations relatives
                        <small class="float-right">
                            <a href="{{ route('visiteurs.edit', $visiteur) }}" class="btn btn-info">
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
                                <h5>Identité du visiteur</h5>
                                <br>
                                <h5>Locataire: </h5>
                                <br>
                                {{-- <h5>Adresse: </h5>
                                <br>
                                <h5>Locataire: </h5>
                                <br> --}}
                                <h5>Numéro du locataire: </h5>
                                <br>
                                <h5>Email du locataire: </h5>
                                <br>
                                <h5>Agent</h5>
                                <br>
                                <h5>Numéro de l'agent</h5>
                                <br>
                                <h5>Email del'agent</h5>
                                <br>
                                <h5>Statut</h5>
                                <br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-8 invoice-col">
                            <br>
                            <address>
                                <h5>{{ $visiteur->identite }}</h5>
                                <br>
                                <h5>{{ $visiteur->locataire->nom.'  '.$visiteur->locataire->prenom }}</h5>
                                <br>
                                {{-- <h5>{{ $appartement->immeuble->adresse }}</h5> --}}
                                {{-- <br> --}}
                                {{-- <h5>{{ $visiteur->locataire->nom . ' ' . $visiteur->locataire->prenom }}</h5> --}}
                                {{-- <br> --}}
                                <h5>{{ $visiteur->locataire->telephone }}</h5>
                                <br>
                                <h5>{{ $visiteur->locataire->email }}</h5>
                                <br>
                                <h5>{{ $visiteur->agent->nom.'  '.$visiteur->agent->prenom }}</h5>
                                <br>
                                <h5>{{ $visiteur->agent->telephone }}</h5>
                                <br>
                                <h5>{{ $visiteur->agent->email }}</h5>
                                <br>
                                <h5>{{ $visiteur->statut }}</h5>
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
