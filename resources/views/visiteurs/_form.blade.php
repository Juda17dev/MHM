<form class="form-horizontal" method="POST" action="{{ $action }}">
    @csrf
    @isset($method)
        @method('put')
    @endisset
    <div class="card-body">
        <div class="form-group row">
            <label for="Nm" class="col-sm-2 col-form-label">Nom: </label>
            <div class="col-sm-10">
                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
                    placeholder="Non du visiteur" value="{{ old('nom', $visiteur->nom) }}">
                @error('nom')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="Prenom" class="col-sm-2 col-form-label">Prenom: </label>
            <div class="col-sm-10">
                <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror"
                    placeholder="Prenom du visiteur" value="{{ old('prenom', $visiteur->prenom) }}">
                @error('prenom')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="Identite" class="col-sm-2 col-form-label">Identite: </label>
            <div class="col-sm-10">
                <input type="file" accept=".jpg,.jpeg,.png" name="identite"
                    class="form-control @error('indentite') is-invalid @enderror" placeholder="Identite du visiteur"
                    value="{{ old('identite', $visiteur->identite) }}">
                @error('indentite')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @if (Auth::user()->role_id == 1)
            <div class="form-group row">
                <label for="Locataire" class="col-sm-2 col-form-label">Locataire: </label>
                <div class="col-sm-10">
                    <select class="custom-select rounded-0" name="locataire">
                        @foreach ($locataires as $locataire)
                            <option value="{{ $locataire->id }}">{{ $locataire->nom . ' ' . $locataire->prenom }}
                            </option>
                        @endforeach
                    </select>
                    <input type="number" name="agent" value="{{ Auth::user()->id }}" hidden>
                </div>
            </div>
        @elseif (Auth::user()->role_id == 2)
            <div class="form-group row">
                <label for="Agent" class="col-sm-2 col-form-label">Agent: </label>
                <div class="col-sm-10">
                    <select class="custom-select rounded-0" name="agent">
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->nom . ' ' . $agent->prenom }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="locataire" value="{{ Auth::user()->id }}" hidden>
                </div>
            </div>
        @endif

        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Ajouter</button>
            <button type="submit" class="btn btn-default float-right">Cancel</button>
        </div>
        <!-- /.card-footer -->
    </div>
</form>
