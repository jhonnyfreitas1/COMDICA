@extends('layouts.app')
@section('js')
@endsection
@section('content')
  @php($url = 'https://comdicaaracoiabape.com.br'.$_SERVER["REQUEST_URI"])
  <div class="container col-md-10"> 
    <div class="row">
      <div class="col-lg-4  ">
        <h1 class=" my-4 text-light bg-success text-center" style="text-shadow: 2px 2px black;">{{$postagem->titulo}}</h1>
        <div class="list-group">
        @if($postagem->pdf1 != false)
          <a href="/upload_pdf/{{$postagem->pdf1}}" class="list-group-item "><i class="far fa-file-pdf text-danger"></i>  Anexo pdf 1</a>
        @endif  
        @if($postagem->pdf2 != false)
          <a href="/upload_pdf/{{$postagem->pdf2}}" class="list-group-item "><i class="far fa-file-pdf text-danger"></i>  Anexo pdf 2</a>
        @endif  
        <div id="fb-root"></div>
          <iframe src="https://www.facebook.com/plugins/share_button.php?href={{$url}}&layout=button&size=large&width=121&height=28&appId" width="121" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
          <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="true"></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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
            <p class="card-text">{!! $postagem->descricao !!}</p>        
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('home.presult')
  <script type="text/javascript">
    $(document).ready(function(){

      $('.pagination').hide();
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    });
  </script>
@endsection