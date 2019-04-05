@extends('layout.principal')

@section('conteudo')

<h1>Listagem de contatos</h1>
<table class="table table-bordered table-hover">
	@foreach($contatos as $c)
	<tr>
		<td>{{$c->nome}}</td>
		<td>{{$c->email}}</td>
		<?php if($c->facebook != ''){ ?>
			<td><a href="{{ $c->facebook }}" target="_blank">Facebook</a></td>
		<?php }else{ ?>
			<td></td>
		<?php } ?>
		<?php if($c->linkedin != ''){ ?>
			<td><a href="{{ $c->linkedin }}" target="_blank">Linkedin</a></td>
		<?php }else{ ?>
			<td></td>
		<?php } ?>
		<td>
			<a href="/mostra/{{$c->id}}">
				<span class="glyphicon glyphicon-search"></span>
			</a>
		</td>
		<td>
			<a href="/edita/{{$c->id}}">
				<span class="glyphicon glyphicon-pencil"></span>
			</a>
		</td>
		<td>
			<a href="{{action('ContatoController@remove', $c->id)}}">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	@endforeach
</table>
<a href="/novo" class="btn btn-primary">Novo</a>

@if(old('nome'))
	<div class="alert alert-success">
		<strong>Sucesso!</strong>O contato {{ old('nome') }} foi salvo.
	</div>
@endif

@stop