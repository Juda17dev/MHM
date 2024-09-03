<form class="form-horizontal" method="POST" action="{{ $action }}">
    @csrf
    @isset($method)
        @method('put')
    @endisset
    <div class="card-body">
        <div class="form-group row">
            <label for="Appartement" class="col-sm-2 col-form-label">Appartement</label>
            <div class="col-sm-10">
                <input type="text" name="objet" class="form-control @error('objet') is-invalid @enderror" placeholder="Entrer l'objet" value="{{ old('objet') }}">
                @error('objet')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="Description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control  @error('description') is-invalid @enderror"  name="description" rows="3" placeholder="Enter ..." placeholder="Entrer la description" value="{{ old('description') }}"></textarea>
                @error('description')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Ajouter</button>
            <button type="submit" class="btn btn-default float-right">Cancel</button>
        </div>
        <!-- /.card-footer -->
</form>
