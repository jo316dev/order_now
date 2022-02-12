<div class="form-group">
    <label for="">Perfil</label>
    <input type="text" class="form-control" name="name" placeholder="Insira o nome do Perfil"
        value="{{ $profile->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" class="form-control" name="description" placeholder="Insira a descrição do Perfil"
        value="{{ $profile->description ?? old('description') }}">
</div>


<button type="submit" class="btn btn-primary">Enviar</button>
