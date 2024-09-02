@extends('base', [
    'title' => "Détails de l'appartement",
])

@section('content')
    <div class="col-12">
        <div class="callout callout-info">
            <h2><i class="fas fa-home"></i> Appartement: {{ $appartement->libelle }}</h2>

        </div>


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-info-circle"></i> Informations relatives
                        <small class="float-right">
                            <a href="{{ route('appartements.edit', $appartement) }}" class="btn btn-info">
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
                                <h5>Immeuble: </h5>
                                <br>
                                <h5>Adresse: </h5>
                                <br>
                                <h5>Locataire: </h5>
                                <br>
                                <h5>Numéro du locataire: </h5>
                                <br>
                                <h5>Email du locataire: </h5>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-8 invoice-col">
                            <br>
                            <address>
                                <h5>{{ $appartement->immeuble->libelle }}</h5>
                                <br>
                                <h5>{{ $appartement->immeuble->adresse }}</h5>
                                <br>
                                <h5>{{ $appartement->locataire->nom . ' ' . $appartement->locataire->prenom }}</h5>
                                <br>
                                <h5>{{ $appartement->locataire->telephone }}</h5>
                                <br>
                                <h5>{{ $appartement->locataire->email }}</h5>
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
