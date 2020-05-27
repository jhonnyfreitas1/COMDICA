@extends('layouts.admin')

	@section('area-principal')
<!-- Import Css Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

<style>
    div.dt-buttons {
        clear: both;
    }
</style>
<br>

    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('admin.comdica')}}">Home</a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                    Atas
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
                Atas
            </h1>
        </div>
        <div class="col-md-3 text-right" >
            <a href="{{route('atas.create')}}" class="btn btn-success">
                Adicionar
            </a>
        </div>
    </div>

    <table class="display" style="width:100%" id="table">
        <thead>
            <tr  class="bg-info text-light">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ano</th>
                <th scope="col" style="display:none">Tipo</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        @if(sizeOf($atas) >= 1)
        <tbody>
            @foreach($atas as $count => $ata)
            <tr>
                <th scope="row">{{$ata->id}}</th>
                <td>
                    <strong>
                        <a class="text-dark">{{ $ata->nome }}</a>
                    </strong>
                </td>
                <td>
                    <strong>
                        <a class="text-dark">{{ $ata->ano }}</a>
                    </strong>
                </td>
                <td style="display:none">
                    <strong>
                        <a href="{{route('atas.show', $ata->id)}}" class="text-dark">@if($ata->tipo == "ordinaria") 1 @else 2 @endif</a>
                    </strong>
                </td>
                <td>
                    <a href="{{route('atas.edit', $ata->id)}}" class="btn btn-outline-info btn-sm mr-2">Editar</a>
                    <a href="#"  id="{{$ata->id}}" url="{{ route('atas.destroy', $ata->id)}}" class="btn btn-outline-danger btn-sm mr-2" onClick="confirmExclusao({{$ata->id}}, 'essa ata');">Excluir</a>
                </tr>
            @endforeach
        </tbody>
        @endif
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
            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Ordinaria',
                    action: function ( e, dt, node, config ) {
                        this
                        .columns( 3 )
                        .search(1)
                        .draw();
                    }
                },
                {
                    text: 'Extraordinaria',
                    action: function ( e, dt, node, config ) {
                        this
                        .columns( 3 )
                        .search( 2 )
                        .draw();
                    }
                }
            ],
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
            bLengthChange: true,  //Show and entries em cima da tabela
            bFilter: true, //Search em cima da tabela
            bInfo: false,  //Showing em baixo da tabela);
            responsive: true,
        } );
    });
    </script>
@endsection
