@extends('layouts.admin')

    @section('area-principal')
	<h1>Usuários</h1>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nome</th>
		      @can('admin')
		      	<th scope="col">Ações</th>
		    	@endcan
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($usuarios as $usuario)
		    <tr>
		      <th scope="row">{{$usuario->id}}</th>
		      <td>
		      	<a href="{{route('admin.show_user', $usuario->id)}}">{{$usuario->name}}</a>
		      </td>
		      @can('admin')
			      <td>
			      	<a href="{{route('admin.edit_user', $usuario->id)}}">Editar</a> 
			      	<a href="{{route('admin.destroy_user', $usuario->id)}}">Excluir</a> 
			      </td>
		      @endcan
		    </tr>
		    @endforeach
		  </tbody>
		</table>

    @endsection