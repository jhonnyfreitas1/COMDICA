@extends('layouts.admin')

    @section('area-principal')

    @section('admin-js')
        <script src='/js/nova_postagem.js'> </script>
        <link rel="stylesheet" type="text/css" href="/js/nova_postagem.css">
    @endsection
@isset($postagem)
    <form style="background:#dcdcdc; margin:3%; padding:1em;"
            class=" mt-2 border border-secondary col-offset-6 centered col-md-10 row"
            method="post"  id='form-postagem' action="{{route('postagens.update', $postagem->id)}}" enctype="multipart/form-data">
            @method('put')
@else
    <form style="background:#dcdcdc; margin:3%; padding:1em;"
            class=" mt-2 border border-secondary col-offset-6 centered col-md-10 row"
            method="post"  id='form-postagem' action="{{route('postagens.store')}}" enctype="multipart/form-data">
@endif
        <div class="form-row col-md-12">
            <div class="form-group col-md-12 ">
                <label for="">Titulo da postagem </label><label style="color:red;">*</label>
                @isset($postagem)
                    <input class="form-control col-md-12" value="{{$postagem->titulo}}" type="text" name="titulo" required>
                @else
                    <input class="form-control col-md-12" value="" type="text" name="titulo" required>
                @endif
            </div>
            <div class="form-group col-md-12 col-12 ">
                <label>Imagem principal da postagem<label style="color:red;">*</label><b>Tipos: ".png", ".jpg", ".jpeg", ".bmp"</b></label>
                <div class="file-field">
                    <div class="btn btn-success btn-sm col-12 col-md-12">
                        <span class="float-left">Procurar imagem</span>
                        <!-- <input type="file" id="uploadImage" name='imagem' class='float-left col-6 col-md-8' required> -->
                        @isset($postagem)
                            <input type="file" id="uploadImage" value="{{$postagem->imagem_principal}}" name='imagem' class='float-left col-6 col-md-8' >
                        @else
                            <input type="file" id="uploadImage" name='imagem' class='float-left col-6 col-md-8' required>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div   class="form-row">
            <div class="form-group col-md-12">
                <div class="form-group col-md-12">
                    <button id="ancora" class="btn bg-warning"> >Link </button>
                    <label for="comment">Descrição do post<label style="color:red;">*</label></label>
                    @isset($postagem)
                        <textarea  name="descricao" class="form-control col12" rows="8" id="comment" required>{{$postagem->descricao}}</textarea>
                    @else
                        <textarea id='input-descricao-postagem' name="descricao" class="form-control col12" rows="8" id="comment" required></textarea>
                    @endisset

                </div>
                <div class="input-group m-3 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light" for="inputGroupSelect01">Categorias </label>
                    </div>
                    <select class="categoria bg-light" name="categoria" id="categoria" required="required">
                        <option disabled> ---- </option>
                        @isset($postagem)
                            <option @if($postagem->categoria == 1) selected @endif value="1">PROJETOS FINANCIADOS</option>
                            <option @if($postagem->categoria == 2) selected @endif value="2">REUNIÕES, ATAS, RESOLUÇÕES</option>
                            <option @if($postagem->categoria == 3) selected @endif value="3">NOTÍCIAS</option>
                            <option @if($postagem->categoria == 4) selected @endif value="4">PUBLICAÇÕES, EVENTOS, FÓRUMS, CONFERÊNCIAS</option>
                            <option @if($postagem->categoria == 5) selected @endif value="5">2º PROCESSO DE ESCOLHA</option>
                        @else
                            <option  value="1">PROJETOS FINANCIADOS</option>
                            <option  value="2">REUNIÕES, ATAS, RESOLUÇÕES</option>
                            <option  value="3">NOTÍCIAS</option>
                            <option  value="4">PUBLICAÇÕES, EVENTOS, FÓRUMS, CONFERÊNCIAS</option>
                            <option  value="5">2º PROCESSO DE ESCOLHA</option>
                        @endisset
                    </select>
                    <div id='anexos_pdf' class="form-group col-md-11 mt-2 bg-info form-group11">
                        <button class='btn text-light' id='newpdf'><i class="fas fa-plus"></i> Novo PDF</button>
                        <label>Anexo de pdf <span class="text-warning col-md-10">(opcional)</span><b></b></label>
                        @isset($pdf)
                            @foreach ($pdf as $pdfs)
                            <div style="border:1px solid">
                                <h4>{{$pdfs->nome_pdf}}</h4>
                                <a href="{{route('pdf.destroy',$pdfs->id)}}">Excluir</a>
                            </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <input type="hidden" id='token' name="_token" value="{{ csrf_token() }}">

                <label class="ml-3">Anexo um link para o youtube <span class="text-warning">(opcional)</span></label>
                <div class="ml-1  mr-1 input-group col-md-12">
                    <div class="input-group-prepend ">
                        <span class="input-group-text bg-danger text-white">Link do youtube</span>
                    </div>
                    @isset($postagem)
                        <input type="text" name='yt' value="{{$postagem->link_yt}}" class="form-control">
                    @else
                        <input type="text" name='yt' class="form-control">
                    @endisset
                </div>
            </div>
        </div>
        </br>
        @isset($postagem)
            <button type="submit" style='margin-left: 5em;' class=" text-light border  border-light float-left col-md-4 mb-3 col-6 btn-success">Editar</button>
        @else
            <button type="submit" style='margin-left: 5em;' class=" text-light border  border-light float-left col-md-4 mb-3 col-6 btn-success">Adicionar</button>
        @endisset
    </form>
@endsection
