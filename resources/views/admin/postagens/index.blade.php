@extends('layouts.admin')

	@section('js')
	@endsection
	@section('area-principal')

  @if(session('success'))
                <ol class="float-right alert alert-success alert-dismissible fade col-md-4 show mt-2" role="alert">
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </ol>
                <?php Session::pull('success')?>
              @endif
              @if(session('fail'))
                <ol class="float-right alert alert-warning alert-dismissible fade col-md-4 show mt-2" role="alert">
                    {{session('fail')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </ol>
                <?php Session::pull('fail')?>
              @endif


        <div class="row m-2 " style=" " >
            @foreach($posts as $count => $post)
              <a href="/postagem/{{encrypt($post->id)}}">
                <div class=" col-md-3 col-sm-6 col-6" style=''>
                  <div class='report-module ' style=" border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(200, 200, 226, 0.9)">
                    <div class='thumbnail' >
                      <a href="/postagem/{{encrypt($post->id)}} " class="bg-light">
                        <center>
                        <img class="card-img-top"  style="height: 20vh; width: 100%;" src="/upload_imagem/{{$post->imagem_principal}}">
                      </center>
                        <h6 class="col-md-12 col-12 title" style="">{{$post->titulo}}</h6>
                      </a>
                    </div>
                    <div class='post-content'>
                      <h6 class='description col-md-12 col-12' style="">{{ str_limit($post->descricao, 30)}}</h6>
                      <div class='post-meta float-right'>
                      <div class="row">
                      <a class="btn btn-primary btn-block col-md-3 col-3 m-1" id="but" style="" href=""><i class="fas fa-eye"></i></a>
                      <a class="btn btn-danger btn-block col-md-3 col-3  m-1 "  data-toggle="modal" data-target="#delete{{$count}}" id='delete'><i class="far fa-trash-alt"></i></a>
                      <a class="btn btn-warning btn-block col-md-3 col-3  m-1 " id="but" style="" href="{{route('postagens.edit', $post->id)}}"> <i class="fas fa-edit"></i></a>
                      @can('admin')
                        <a class="btn btn-success btn-block col-md-1 col-2  m-1 "  style="" href="{{route('postagens.arquivar', $post->id)}}"> <i class=""></i></a>
                      @endcan
                  </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <div class="modal modal-danger fade" id="delete{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title text-center" id="myModalLabel" style="">Excluir esta postagem?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class=" col-md-12 col-sm-12 col-12">
                          <div class='report-module ' style=" border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.9)">
                            <div class='thumbnail ' >
                              <a href="#" class="bg-light">
                                <center>
                                <img class="card-img-top" style="max-width:15em; max-height:15em; width: auto;
              height: auto; position: center;" src="/upload_imagem/{{$post->imagem_principal}}">
                              </center>
                                <h4>{{$post->titulo}}</h4>
                              </a>
                            </div>
                            <div class='post-content'>
                              <h3 class='title' style=""></h3>
                              <p class='description' style="">{{ str_limit($post->descricao, 30)}}</p>
                              <div class='post-meta float-right'>
                              <div class="row">
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 <input type="hidden" name="category_id" id="cat_id" value="">
                    <div class="modal-footer">
                        <div style="margin-right: 10em;">
                            <a href="/admin/post/delete/{{$post->id}}" count="{{$count}}"  class="btn btn-success deletar-sucesso">Sim</a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                        </div>
                    </div>
                </div>
              </div>
            </div>


          @endforeach


   </div>
   {!! $posts -> Links()!!}



	@endsection
