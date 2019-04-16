<form action="/controller/action-post.php" method="post" name="form-postagem" enctype="multipart/form-data">
<div class="form-group col-md-6">
    <label for="">Titulo do post</label>
    <input class="form-control col-md-6" type="text" name="titulo">
</div>
	<div class="form-group col-md-6">
		<label>Imagem principal do post<b>*.jpg, .png</b></label>
		<div class="file-field">   
		    <div class="btn btn-success btn-sm float-left">
		      <span>Choose file</span>
		      <input type="file" name='imagem'>
		    </div>	
		  </div>
	</div>
</br>
</br>		<input type="hidden" name="hidden" value="fluidorderuido522">
<div   class="form-row">
	<div class="form-group col-md-6">
			<!---CONcertando conflitos aki  -->
		<div class="form-group col-md-12">
 			 <label for="comment">Descrição do post</label>
			 <textarea  name="descricao" class="form-control col12" rows="8" id="comment"></textarea>
		</div>
		
	</div>
</div>
			
<div class="form-group col-md-6">
	<label for="">Categoria do post</label>
	<select name="categoria" class="form-control">
		<option></option>
		<option>Post educativo</option>
		<option>Tutorial</option>
		<option>Notícia</option>
		<option>Vídeo</option>
		<option>Entrevista</option>
		<option>Pesquisa</option>
		<option>Ata</option>
		<option>Evento</option>
	</select>
</div>
	<label>Selecione um arquivo <b>*.jpg, .gif, .pdf, .mp3, .mp4</b></label>
<div class="file-field">
   
    <div class="btn btn-primary btn-sm float-left">
      <span>Choose file</span>
      <input type="file">
    </div>	
  </div>
</br>
	<input type="submit" name="enviar"  style='margin-left: 5em; 'class="col-md-2 btn-success">
</form>
