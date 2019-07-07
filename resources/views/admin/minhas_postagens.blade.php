@extends('layouts.admin')

	@section('js')
		<style type="text/css">
				

		</style>
	@endsection
	@section('area-principal')
 </center>
 	<div class="row " style=" margin-top: 6em;">

          	    @foreach($posts as $post)
          <a href="/postagem/{{$post->id}}">
            <div class=" col-md-3 col-sm-6 col-6">
              <div class='report-module ' style=" border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.9)">
                <div class='thumbnail ' >
                  <a href="/postagem/{{$post->id}} " class="bg-light">
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
                  <a class="btn btn-primary btn-block col-md-3 col-8 m-1" id="but" style="" href=""><i class="fas fa-eye"></i></a>
                  <a class="btn btn-danger btn-block col-md-3 col-8  m-1 " id="but" style="" href="#" data-toggle="modal" data-target="#myModal" id='delete'><i class="far fa-trash-alt"></i></a>
                  <a class="btn btn-warning btn-block col-md-3 col-8  m-1 " id="but" style="" href=""> <i class="fas fa-edit"></i></a>
               </div> 
                  </div>
                </div>
              </div>
            </div>
          </a>
         
          @endforeach

		
   </div>
   {!! $posts -> Links()!!} 



	@endsection
