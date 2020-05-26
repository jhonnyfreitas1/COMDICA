@extends('layouts.newIndex');

@section('content')
<head>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> --}}
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
</head>
<style>

   .dt-button{
       background-color:white;
       outline:none;
       padding: 10px;
       text-decoration: none;
       border: 2px solid #5BA479;
       font-family: Comdica;
       color: #5BA479;
       transition: 0.3s;
    }
    .dt-button:hover{
        border: 2px solid white;
        background-color:#5BA479;
        color: white;
        transition: 0.3s;
    }
   .dt-button:hover{
       cursor: pointer;
   }
   .even{
       background-color:#F7FFFA;
   }
   label{
       font-family: Comdica;
   }
   input{
       border: 2px solid #5BA479;
   }

</style>
<br><br><br><br><br>
    <section class="produtos container">
        <h2 class="subtitulo">Resolucões</h2>
        <table class="table table-hover" id="table">
            <thead>
                <tr  class="bg-info text-light">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ano</th>
                </tr>
            </thead>
            @if(sizeOf($resolucoes) > 1)
            <tbody>
                @foreach($resolucoes as $count => $resolucao)
                <tr>
                    <th scope="row">{{$resolucao->id}}</th>
                    <td>
                        <strong>
                            <a href="{{route('showResolucao', ['id' => $resolucao->id])}}" class="text-dark">{{ $resolucao->nome }}</a>
                        </strong>
                    </td>
                    <td>
                        <strong>
                            <a href="{{route('showResolucao', ['id' => $resolucao->id])}}" class="text-dark">{{ $resolucao->ano }}</a>
                        </strong>
                    </td>
                @endforeach
            </tbody>
            @endif
        </table>
        <br><br>
        <a href="{{route('atas')}}" class="btn">Visualizar Atas</a>
    </section>
    <!-- Import Js Datatables -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>

    <script>
    $.noConflict();
    jQuery( document ).ready(function( $ ) {

        // Datatables
        $('#table').DataTable( {
            "order": [[ 2, "asc" ]],
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
