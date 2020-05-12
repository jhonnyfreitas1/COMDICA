@extends('layouts.admin')

	@section('area-principal')

    <!-- Import Css Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

<br>
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('admin.comdica')}}">Home</a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                    Galeria
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
                Galeria
            </h1>
        </div>
        <div class="col-md-3 text-right" >
            <a href="{{route('galeria.create')}}" class="btn btn-success">
                Adicionar
            </a>
        </div>
    </div>

    <table class="table table-hover" id="table">
        <thead>
            <tr  class="bg-info text-light">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albuns as $count => $album)
            <tr>
                <th scope="row">{{$album->id}}</th>
                <td>
                    <strong>
                        <a style="cursor:default" class="text-dark">{{$album->titulo}}</a>
                    </strong>
                </td>
                <td>
                    <a href="{{route('galeria.edit', $album->id)}}" class="btn btn-outline-info btn-sm mr-2">Editar</a>
                    <a href="#"  href="#"  id="{{$album->id}}" url="{{ route('galeria.destroy', $album->id)}}" class="btn btn-outline-danger btn-sm mr-2"  onClick="confirmExclusao({{$album->id}}, 'esse álbum');">Excluir</a>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Import Js Datatables -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>

    <script>
    $.noConflict();
    jQuery( document ).ready(function( $ ) {

        // Datatables
        $('#table').DataTable( {
            oLanguage:{
                sProcessing: "Processando...",
                sLengthMenu: "Mostar _MENU_ registros pro página",
                sZeroRecords: "Nada encontrado com esse critérios",
                sEmptyTable: "Não há dados para serem mostrados",
                sLoadingRecords: "Carregando...",
                sInfo: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
                sInfoFiltered: "(filtro aplicado em _MAX_ registros)",
                sInfoPostFix: "",
                sInfoThousands: ".",
                sSearch: "Pesquisar:",
                sUrl: "",
                oPaginate:{
                    sFirst: "Primeira",
                    sPrevious: "Anterior",
                    sNext: "Próxima",
                    sLast: "Última",
                },
            },

            bPaginate: true, //Next and Previous embaixo da tabela
            bLengthChange: false,  //Show and entries em cima da tabela
            bFilter: true, //Search em cima da tabela
            bInfo: false,  //Showing em baixo da tabela);
            responsive: true,
        } );
    });
    </script>
@endsection
