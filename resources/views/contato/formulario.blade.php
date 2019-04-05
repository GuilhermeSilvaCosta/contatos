@extends('layout.principal')

@section('conteudo')

<h1>Novo Contato</h1>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/adiciona" method="post">
    <input type="hidden"
        name="_token" value="{{{ csrf_token() }}}" >
    <input type="hidden"
        name="id" value="{{old('id') ?? $c->id}}" >
    <div class="form-group">
        <label>Nome</label>
        <input name="nome" class="form-control" value="{{old('nome') ?? $c->nome}}" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input name="email" class="form-control" value="{{old('email') ?? $c->email}}" required>
    </div>
    <div class="form-group">
        <label>Facebook</label>
        <input name="facebook" class="form-control" value="{{old('facebook') ?? $c->facebook}}">
    </div>
    <div class="form-group">
        <label>Linkedin</label>
        <input name="linkedin" class="form-control" value="{{old ('linkedin') ?? $c->linkedin}}">
    </div>
    <button type="submit" class="btn btn-primary btn-block">
        Salvar
    </button>
</form>

@stop