<div class="form-group">
    <label for="">Plano</label>
    <input type="text" class="form-control" name="name" placeholder="Insira o nome do plano"
        value="{{ $plan->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" class="form-control" name="description" placeholder="Insira a descrição do plano"
        value="{{ $plan->description ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">Valor</label>
    <input type="text" class="form-control" name="price" placeholder="Valor do plano em R$"
        value="{{ $plan->price ?? old('price') }}">
</div>

<button type="submit" class="btn btn-primary">Enviar</button>
