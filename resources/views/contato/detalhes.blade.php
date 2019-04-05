@extends('layout.principal')

@section('conteudo')
<h1>Detalhes do contato: {{$c->nome}}</h1>
<ul>
	<li>
		<b>email:</b>{{$c->email}}
	</li>
	@if($c->facebook)
	<li>
		<b><a href="{{$c->facebook}}" target="_blank">Facebook</a></b>
	</li>
	@endif
	@if($c->linkedin)
	<li>
		<b><a href="{{$c->linkedin}}" target="_blank">Linkedin</a></b>
	</li>
	@endif
</ul>
<h2>Telefones</h2>
@if($c->telefones)
<table class="table table-bordered table-hover">
	@foreach($c->telefones as $t)
	<tr>
		<td>{{ $t->telefone }}</td>
		@foreach($tipos as $tipo)
			@if($t->tipo_id == $tipo->id)
				<td>{{ $tipo->tipo }}</td>
			@endif
		@endforeach
		<td>
			<a href="{{action('TelefoneController@edita', $t->id)}}">
				<span class="glyphicon glyphicon-pencil"></span>
			</a>
		</td>
		<td>
			<a href="{{action('TelefoneController@remove', $t->id)}}">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	@endforeach
</table>
@endif
<a href="/telefone/novo/{{$c->id}}" class="btn btn-primary">Novo</a>
@stop