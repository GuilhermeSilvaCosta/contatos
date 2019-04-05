@extends('layout.principal')

@section('conteudo')

<h1>Novo Telefone</h1>

<form action="/telefone/adiciona" method="post">
    <input type="hidden"
        name="_token" value="{{{ csrf_token() }}}" >
    <input type="hidden"
        name="id" value="{{old('id') ?? $t->id}}" >
    <input type="hidden"
        name="contato_id" value="{{old('contato_id') ?? $t->contato_id}}" >
    <div class="form-group">
        <label>Telefone</label>
        <input name="telefone" class="form-control" value="{{old('telefone') ?? $t->telefone}}" required>
    </div>
    <select name="tipo_id" class="custom-select">
        @foreach($tipos as $tipo)
            @if($t->tipo_id == $tipo->id)
                <option value="{{$tipo->id}}" selected>{{$tipo->tipo}}</option>
            @else
                <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
            @endif
        @endforeach
    </select>
    <br>
    <br>    
    <button type="submit" class="btn btn-primary btn-block">
        Salvar
    </button>
</form>

@stop