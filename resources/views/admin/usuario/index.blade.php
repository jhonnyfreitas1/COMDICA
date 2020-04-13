@extends('layouts.admin')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('area-principal')

<!-- Mensagem ao deletar -->
<div id="alertaMensagem" class="alert alert-success alert-dismissible fade  show message"  role="alert">
    <p id="alertaMensagemText">Usuário Excluído</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

    <br>
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('usuario.index')}}">Home</a>
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
            <a href="{{route('usuario.register')}}" class="btn btn-success">
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
		  	@foreach($usuarios as $count => $usuario)
		    <tr id="{{$usuario->id}}">
		      <th scope="row">{{$usuario->id}}</th>
		      <td>
              <strong>
		      	<a href="{{route('usuario.show', $usuario->id)}}" class="text-dark">{{$usuario->name}}</a>
              </strong>
		      </td>
		      @can('admin')
			      <td>
			      	<a href="{{route('usuario.edit', $usuario->id)}}" class="btn btn-outline-info btn-sm mr-2">Editar</a>
                    <!-- <a href="#"  id="excluir" class="btn btn-outline-danger btn-sm mr-2">Excluir</a> -->
                    <a class="destroy btn btn-outline-danger btn-sm mr-2" data-catid="{{$usuario->id}}" data-toggle="modal" data-target="#delete{{$count}}"  href="#">
                        Excluir
					</a>

			      </td>
		      @endcan
		    </tr>


            <!-- Modal -->
            <div class="modal fade" id="delete{{$count}}" tabindex="-2" role="dialog" aria-labelledby="modal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal">Excluir Usuário?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                                <a href="#" data-dismiss="modal" count="{{$count}}" url="{{ route('usuario.destroy',$usuario->id)}}" class="btn btn-success deletar-sucesso">Sim</a>
                                <button id="closeModal"type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                        </div>
                    </div>
                </div>
            </div>

	    @endforeach
	  </tbody>
	</table>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $('#alertaMensagem').hide();

            $('.deletar-sucesso').on("click", function(event){
                var url = $(this).attr('url');

                $.ajax({
                    url: url,
                    type: "POST",
                    header: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _token : $('meta[name="csrf-token"]').attr('content')
                    },
                }).done(function(data){
                    window.location.reload()
                }).fail(function(jqXHR, ajaxOptions, thrownError){
                    console.log('No response from server');
                });
            });
        });
    </script>

    @endsection
