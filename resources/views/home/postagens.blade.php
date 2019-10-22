@foreach($posts as $post)
  	<a href="/postagem/{{encrypt($post->id)}}">
       	<div class="col-md-3 col-12 mt-1" style=''>
          	<div class='report-module ' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(200, 200, 226, 0.9)">
            	<div class='thumbnail' >
              		<a href="/postagem/{{encrypt($post->id)}} " class="bg-light">
	                	<center>
	                  		<img class="card-img-top" style="height: 20vh; width: 100%; object-fit: cover; " src="/upload_imagem/{{$post->imagem_principal}}">
	               		</center>
	                	<h6 class="col-md-12 col-12 " style="">{{$post->titulo}}</h6>
              		</a>
            	</div>
	            <div class='post-content'>
	              	<div class='post-meta float-right'>
	                	<div class="row">
	                  		<a class="btn btn-success col-12 btn-block " id="but" style="border:1px solid black;" href="/postagem/{{encrypt($post->id)}}">
	                  			Ver Postagem
	                  		</a >
	                	</div>
	              	</div>
	           	</div>
          	</div>
        </div>
    </a>
@endforeach
