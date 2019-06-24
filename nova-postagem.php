<h2>Faça uma nova postagem</h2>
<form action="/controller/action-post.php" method="post" name="form-postagem" enctype="multipart/form-data">
<div class="form-group col-md-6">
    <label for="">Titulo da postagem </label><label style="color:red;">*</label>
    <input class="form-control col-md-6" type="text" name="titulo" required>
</div>
	<div class="form-group col-md-6">
		<label>Imagem principal da postagem<label style="color:red;">*</label><b>"png", "jpg", "jpeg", "bmp"</b></label>
		<div class="file-field">   
		    <div class="btn btn-success btn-sm float-left">
		      <span>Procurar uma imagem</span>
		      <input type="file" id="uploadImage" name='imagem' required>
		    	  </div>	
		  </div>
	</div>
</br>
</br>		<input type="hidden" name="hidden" value="fluidorderuido522">
<div   class="form-row">
	<div class="form-group col-md-6">
			<!---CONcertando conflitos aki  -->
		<div class="form-group col-md-12">
		<button id="ancora" class="btn bg-info"> > </button>
 			 <label for="comment">Descrição do post<label style="color:red;">*</label></label>
			 <textarea  name="descricao" class="form-control col12" rows="8" id="comment" required></textarea>
		</div>
		<div class="form-group col-md-6">
		<label>Anexo de pdf <span class="text-info">(opcional)</span><b></b></label>
		<div class="file-field">   
		    <div class="btn btn-danger btn-sm float-left">
		      <span>Procurar pdf</span>
		      <input type="file"  name='pdf'>
			</div>
		  </div>
		</div>
		<div class="form-group col-md-6">
		<label>Anexo um segundo pdf <span class="text-info">(opcional)</span><b></b></label>
		<div class="file-field">   
		    <div class="btn btn-danger btn-sm float-left">
		      <span>Procurar pdf</span>
		      <input type="file"  name='pdf2'>
		    	  </div>	
		  </div>
		</div>
		<label class="ml-3">Anexo um link para o youtube <span class="text-info">(opcional)</span></label>
		<div class="ml-3 input-group">
		  <div class="input-group-prepend ">
		    <span class="input-group-text bg-danger text-white">Link do youtube</span>
		  </div>
		  <input type="text" name='yt' class="form-control">
		</div>
	</div>
</div>
<a href=""  id="ai"></a>
	<script type="text/javascript">
		$('#ancora').on('click' ,function(e){

			e.preventDefault();
			var link = prompt('Adicione o link, exemplo: http://www.example.com/');
			var nome_link = prompt('Dê um nome ao link').replace(" ", "_");
			var meulink = " <a href='"+link+"'>"+ nome_link +"</a>";

			 $("#comment").val(function() {
			        return this.value + meulink;
			    });
		});

	</script>
</br>
	<input type="submit" name="enviar"  style='margin-left: 5em;' class="col-md-2 btn-success">
</form>
