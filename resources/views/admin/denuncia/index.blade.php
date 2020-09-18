@extends('layouts.admin')

	@section('js')
	@endsection
	@section('area-principal')
    <!-- Import Css Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

    <br>
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('usuario.index')}}">Home</a>
            </li>

            <li class="breadcrumb-item" >
                <span class="text-secondary">
                    Denúncias
                </span>
            </li>
        </ol>
    </nav>
    <div class="row mb-4">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
                Denúncias
            </h1>
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
          @for($i=0;sizeOf($denuncias) > $i; $i++ )

              <tr>
                <th scope="row">{{$denuncias[$i]->id}}</th>
                <td>
                    <strong>
                        <a href="{{ route('denuncias.show',$denuncias[$i]->hashDenun) }}" class="text-dark">
                            {{$denuncias[$i]->hashDenun}}
                        </a>
                    </strong>
                </td>
                <td>
                  <a href="#" url="{{ route('denuncias.show',$denuncias[$i]->hashDenun) }}" class="showDenun btn btn-outline-info btn-sm mr-2">Detalhe da denúncia</a>
                    @if(isset($encam) and $encam[$i] != '')
                        <a href="#" url="{{ route('denuncias.encaminhar',$denuncias[$i]->id) }}" hash="{{$denuncias[$i]->hashDenun}}" onClick="encaminhar(e{{$denuncias[$i]->id}})" id="e{{$denuncias[$i]->id}}" nomeEncaminhar="{{$encam[$i]}}" data-toggle="modal" data-target="#Modal" class="btn btn-outline-success btn-sm mr-2">Encaminhar {{$encam[$i]}}</a>
                    @endif
                    @if(isset($finDenun) and$finDenun[$i] != '')
                        <a  href="#" url="{{ route('denuncias.finalizar',$denuncias[$i]->id) }}" hash="{{$denuncias[$i]->hashDenun}}" onClick="finalizar(f{{$denuncias[$i]->id}})" id="f{{$denuncias[$i]->id}}" nomeEncaminhar="{{$encam[$i]}}" data-toggle="modal" data-target="#Modal"class="btn btn-outline-danger btn-sm mr-2">{{$finDenun[$i]}}</a>
                    @endif
                </td>
              </tr>

              <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel"></h5>
                    </div>
                    <form method="post" id="formSubmit">
                    @csrf
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Descrição:</label>
                                    <textarea class="form-control" name="desc"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" id="modal-submit" class="btn btn-success"></button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
          @endfor
        </tbody>
      </table>
    <!-- </div> -->

    <!-- Import Js Datatables -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>

    <script>
        function encaminhar(name){
            const nomeEncam = ($('#'+name.id).attr('nomeEncaminhar') );
            $('#modal-submit').html('Encaminhar '+nomeEncam);
            $('#modal-submit').attr('encham',true);
            const hash = ($('#'+name.id).attr('hash') );
            $('#modalLabel').html('Denúncia: <strong>'+hash+'</strong>');

            // alterando a action do form
            const url = ($('#'+name.id).attr('url') );
            $('#formSubmit').attr('action',url);
        }
        function finalizar(name){
            $('#modal-submit').attr('encham',false);
            $('#modal-submit').html('Finalizar denúncia');
            const hash = ($('#'+name.id).attr('hash') );
            $('#modalLabel').html('Denúncia: <strong>'+hash+'</strong>');


            // alterando a action do form
            const url = ($('#'+name.id).attr('url') );
            $('#formSubmit').attr('action',url);
        }
        function submitButton(){
            $('#modal-submit').css({pointerEvents: "none"});
        }

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


        $('.showDenun').click(function(e){
            const url = $(this).attr('url');
            console.log(url);
            e.preventDefault();
            $('#floating-display-ts').show();
            window.location.href = url
        });

    });
    </script>
	@endsection
