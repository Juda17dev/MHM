<form class="form-horizontal" method="POST" action="{{ $action }}">
    @csrf
    @isset($method)
        @method('put')
    @endisset
    <div class="card-body">
        <div class="form-group row">
            <label for="Immeuble" class="col-sm-2 col-form-label">Nom de l'immeuble</label>
            <div class="col-sm-10">
                <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror" placeholder="Designation" value="{{ old('libelle', $immeuble->libelle) }}">
                @error('libelle')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="Adresse" class="col-sm-2 col-form-label">Adresse</label>
            <div class="col-sm-10">
                <input type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror" placeholder="Adresse" value="{{ old('adresse', $immeuble->adresse) }}" >
                @error('adresse')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Enregistrer</button>
            <button type="submit" class="btn btn-default float-right">Cancel</button>
        </div>
        <!-- /.card-footer -->
    </div>
</form>
