@extends('base', [
    'title' => 'Ajouter un utilisateur',
]);

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Creer un compte d'utilisateur</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="Nom" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" class="form-control" placeholder="Nom">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Prenom" class="col-sm-2 col-form-label">Prenom</label>
                    <div class="col-sm-10">
                        <input type="text" name="prenom" class="form-control" placeholder="Prenom">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tel" class="col-sm-2 col-form-label">Telephone</label>
                    <div class="col-sm-10">
                        <input type="text" name="telephone" class="form-control" placeholder="Téléphone">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select class="custom-select rounded-0" name="role" id="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row" id="immeuble-group">
                    <label for="immeuble" class="col-sm-2 col-form-label">Immeuble</label>
                    <div class="col-sm-10">
                        <select class="custom-select rounded-0" name="immeuble" id="immeuble">
                            <option value="">Sélectionnez un immeuble</option>
                            @foreach ($immeubles as $immeuble)
                                <option value="{{ $immeuble->id }}">{{ $immeuble->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row d-none" id="appartement-group">
                    <label for="appartement" class="col-sm-2 col-form-label">Appartement</label>
                    <div class="col-sm-10">
                        <select class="custom-select rounded-0" name="appartement" id="appartement">
                            <option value="">Sélectionnez un appartement</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="string" name="password" class="form-control" placeholder="Mot de pass">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create an account</button>
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role');
            const immeubleGroup = document.getElementById('immeuble-group');
            const appartementGroup = document.getElementById('appartement-group');
            const immeubleSelect = document.getElementById('immeuble');
            const appartementSelect = document.getElementById('appartement');
            const appartementsData = @json($appartements);

            // Ensure Immeuble is always visible by default
            immeubleGroup.classList.remove('d-none');

            roleSelect.addEventListener('change', function() {
                const roleId = this.value;

                // Reset Appartement field
                appartementGroup.classList.add('d-none');
                appartementSelect.innerHTML = '<option value="">Sélectionnez un appartement</option>';

                // Show Appartement field if roleId is 2
                if (roleId == 2) {
                    appartementGroup.classList.remove('d-none');
                }
            });

            immeubleSelect.addEventListener('change', function() {
                const immeubleId = this.value;

                // Filter apartments based on the selected Immeuble
                appartementSelect.innerHTML = '<option value="">Sélectionnez un appartement</option>';
                if (appartementsData[immeubleId]) {
                    appartementsData[immeubleId].forEach(appartement => {
                        const option = document.createElement('option');
                        option.value = appartement.id;
                        option.textContent = appartement.libelle;
                        appartementSelect.appendChild(option);
                    });
                }
            });
        });
    </script>
@endsection
