@extends('layouts.app')
	
		@section('js')

		@endsection
	@section('content')

	  <div class="container col-md-10">	
    <div class="row">

      <div class="col-lg-4	">
        <h1 class=" my-4 text-light bg-success text-center" style="text-shadow: 2px 2px black;">{{$postagem->titulo}}</h1>
        <div class="list-group">
        @if($postagem->pdf1 != false)
          <a href="/upload_pdf/{{$postagem->pdf1}}" class="list-group-item "><i class="far fa-file-pdf text-danger"></i>  Anexo pdf 1</a>
          @endif	
          @if($postagem->pdf2 != false)
          <a href="/upload_pdf/{{$postagem->pdf2}}" class="list-group-item "><i class="far fa-file-pdf text-danger"></i>  Anexo pdf 2</a>
          @endif	
          <a class="list-group-item fa fa-facebook fa-2 active font-weight-bold" href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://localhost:8000&p[images][0]=localhost:800/{{$postagem->imagem_principal}}&p[title]={{$postagem->titulo}}&p[summary]={{$postagem->descricao}}" target="_blank" onclick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false"> Compartilhar</a>        
        </div>
             @if($postagem->link_yt != false)
				<div class="col-md-12 mt-4 embed-responsive embed-responsive-16by9">
      
        <iframe class="embed-responsive-item" src="{{$postagem->link_yt}}" allowfullscreen></iframe>
					</div>					
		@endif		
      </div>
      <!-- /.col-lg-3 -->
		
      <div class="col-lg-8">
        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="/upload_imagem/{{$postagem->imagem_principal}}" alt="">
          <div class="card-body">
            <h3 class="card-title">{{$postagem->titulo}}</h3>
         	</br>
          		  <p class="card-text">{{$postagem->descricao}}asdas</p>
          
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Leave a Review</a>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
	@endsection
