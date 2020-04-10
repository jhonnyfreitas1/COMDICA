@extends('layouts.admin')

    @section('area-principal')
    <br>
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('admin.comdica')}}">Home</a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                    Usuários
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
                Usuários
            </h1>
        </div>
        <div class="col-md-3 text-right" >
            <a href="{{route('admin.register')}}" class="btn btn-success">
                Adicionar
            </a>
        </div>
    </div>
	<!-- <h1>Usuários</h1> -->
    <table class="table table-hover">
        <thead>
            <tr  class="bg-info text-light">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
		  	@foreach($usuarios as $usuario)
		    <tr>
		      <th scope="row">{{$usuario->id}}</th>
		      <td>
              <strong>
		      	<a href="{{route('admin.show_user', $usuario->id)}}" class="text-dark">{{$usuario->name}}</a>
              </strong>
		      </td>
		      @can('admin')
			      <td>
			      	<a href="{{route('admin.edit_user', $usuario->id)}}" class="btn btn-outline-info btn-sm mr-2">Editar</a>
	    			<a href="{{route('admin.destroy_user', $usuario->id)}}" class="btn btn-outline-danger btn-sm mr-2">Excluir</a>
			      </td>
		      @endcan
		    </tr>
		    @endforeach
		  </tbody>
		</table>

    @endsection
