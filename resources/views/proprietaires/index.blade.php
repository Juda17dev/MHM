@extends('base', [
    'title' => 'Bienvenue',
])


@section('content')
    {{-- <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $nbrimmeuble }}</h3>

                            <p>Immeubles</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-building"></i>
                        </div>
                        <a href="{{ route('immeubles.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $nbrlocataire }}</h3>

                            <p>Locataires</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="{{ route('users.locataires') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $nbragent }}</h3>

                            <p>Agents</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-shield"></i>
                        </div>
                        <a href="{{ route('users.agents') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $nbrvisiteur }}</h3>

                            <p>Visiteurs</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('visiteurs.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="border-top my-4 h-2"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Récapitulation des visites</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4">
                                <canvas id="visitors-chart" height="400" width="1000"></canvas>
                            </div>
                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> Visites acceptées
                                </span>
                                <span>
                                    <i class="fas fa-square text-gray"></i> Visites réfusées
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="border-top my-4 h-2"></div>

                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Récapitulation des visites</h3>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="position-relative mb-4">
                                <canvas id="sales-chart" height="400"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> Visites acceptées
                                </span>

                                <span>
                                    <i class="fas fa-square text-gray"></i> Visites réfusées
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <!-- Main row -->
            {{--  <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->  --}}
        </div>
        <!-- /.container-fluid -->
    </section> --}}
@endsection

@section('otherscript')
    @include('proprietaires.visite-charts')
@endsection
