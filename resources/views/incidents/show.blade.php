@extends('base', [
    'title' => "Détails de l'appartement",
])

@section('content')
    <div class="col-12">
        <div class="callout callout-info">
            <h2><i class="fas fa-home"></i> Objet: {{ $incident->objet }}</h2>

        </div>


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-info-circle"></i> Description:
                        <small class="float-right">
                            <a href="{{ route('incidents.edit', $incident) }}" class="btn btn-info">
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
                        <p >
                            {{ $incident->description }}
                        </p>

                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->




        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->
@endsection
