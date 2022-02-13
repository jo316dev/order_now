<div class="form-group">
    <label for="">Permissões</label>
    <input type="text" class="form-control" name="name" placeholder="Insira o nome do Perfil"
        value="{{ $permission->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" class="form-control" name="description" placeholder="Insira a descrição do Perfil"
        value="{{ $permission->description ?? old('description') }}">
</div>


<button type="submit" class="btn btn-primary">Enviar</button>
