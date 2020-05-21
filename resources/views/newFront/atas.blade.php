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
        <table class="display" style="width:100%" id="table">
            <thead>
                <tr  class="bg-info text-light">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ano</th>
                    <th scope="col" style="display:none">Tipo</th>
                </tr>
            </thead>
            @if(sizeOf($atas) >= 1)
            <tbody>
                @foreach($atas as $count => $ata)
                <tr>
                    <th scope="row">{{$ata->id}}</th>
                    <td>
                        <strong>
                            <a href="{{route('atas.show', $ata->id)}}" class="text-dark">{{ $ata->nome }}</a>
                        </strong>
                    </td>
                    <td>
                        <strong>
                            <a href="{{route('atas.show', $ata->id)}}" class="text-dark">{{ $ata->ano }}</a>
                        </strong>
                    </td>
                    <td style="display:none">
                        <strong>
                            <a href="{{route('atas.show', $ata->id)}}" class="text-dark">@if($ata->tipo == "ordinaria") 1 @else 2 @endif</a>
                        </strong>
                    </td>
                    @endforeach
                </tbody>
                @endif
            </table>
            <!-- Import Js Datatables -->
    </section>
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
                        text: 'Extraordinária',
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