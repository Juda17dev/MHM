<form class="form-horizontal" method="POST" action="{{ $action }}">
    @csrf
    @isset($method)
        @method('put')
    @endisset
    <div class="card-body">
        <div class="form-group row">
            <label for="Appartement" class="col-sm-2 col-form-label">Appartement</label>
            <div class="col-sm-10">
                <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror" placeholder="Designation" value="{{ old('libelle',$appartement) }}">
                @error('libelle')
                    <span class="error invalid-feedback
                    ">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="Immeuble" class="col-sm-2 col-form-label">Immeuble</label>
            <div class="col-sm-10">
                <select class="custom-select rounded-0" name="immeuble">
                    @foreach ($immeubles as $immeuble)
                        <option value="{{ $immeuble->id }}">{{ $immeuble->libelle }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Ajouter</button>
            <button type="submit" class="btn btn-default float-right">Cancel</button>
        </div>
        <!-- /.card-footer -->
</form>