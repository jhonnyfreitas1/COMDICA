<h2>Faça uma nova postagem</h2>
   <div class="modal" id="exemplomodal" style="display:none ;" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
             <h4 class="modal-title" id="gridSystemModalLabel">Aguarde processando o envio da nova postagem</h4>
      				  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
         					 <span aria-hidden="true">&times;</span>
        			</button>
            </div>
            <div class="modal-body">
            	<div id="return"></div>
					<div id="progressBar">
						<span></span>
					</div>
			   <div class="modal-footer">		   
              		<button type="button" id='fechar' class="btn btn-info float-right close" data-dismiss="modal">Fechar</button>
            	</div>
            </div>
          </div>
        </div>
      </div>
  


<form action="/controller/action-post.php" method="post"  id='form-postagem' name="form-postagem" enctype="multipart/form-data">
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
</br>
<input type="hidden" name="hidden" value="fluidorderuido522">
<div   class="form-row">
	<div class="form-group col-md-6">
	<!---CONcertando conflitos aki  -->
		<div class="form-group col-md-12">
		<button id="ancora" class="btn bg-warning"> >Link </button>
 			 <label for="comment">Descrição do post<label style="color:red;">*</label></label>
			 <textarea  name="descricao" class="form-control col12" rows="8" id="comment" required></textarea>
		</div>
		<div class="form-group col-md-6">
		<label>Anexo de pdf <span class="text-info">(opcional)</span><b></b></label>
		<div class="file-field">   
		    <div class="btn btn-danger btn-sm float-left">
		      <span>Procurar pdf</span>
		  
		      	<input type="file" id="files2"  name='pdf'>
		      	<div id="progress_bar1">
				
				<div class="percent1">0%</div>
				</div>
			</div>
		  </div>
		</div>
		<div class="form-group col-md-6">
		<label>Anexo um segundo pdf <span class="text-info">(opcional)</span><b></b></label>
		<div class="file-field">   
		    <div class="btn btn-danger btn-sm float-left">
		      <span>Procurar pdf</span>
		      
		      <input type="file" id="files" name='pdf2'>
		      	
		      <div id="progress_bar">
				
				<div class="percent">0%</div>
				</div>
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

			$('.close').on('click', function(e){
				$('#exemplomodal').hide();
			})
		$('#ancora').on('click' ,function(e){


			e.preventDefault();
			var link = prompt('Adicione o link, exemplo: http://www.example.com/');
			var nome_link = prompt('Dê um nome ao link').replace(" ", "_");
			var meulink = " <a href='"+link+"'>"+ nome_link +"</a>";

			 $("#comment").val(function() {
			        return this.value + meulink;
			    });
		});
		var formFiles, divReturn, progressBar;

formFiles = $('#form-postagem');
divReturn = document.getElementById('return');
progressBar = document.getElementById('progressBar');

		$('#form-postagem').on('submit' ,function(e){
			e.preventDefault();
			sendForm(e);	
			$('#exemplomodal').show();
			function sendForm(evt) {

			var formData, ajax, pct;

			formData = new FormData(evt.target);

			ajax = new XMLHttpRequest();

			ajax.onreadystatechange = function () {

				if (ajax.readyState == 4) {
					divReturn.textContent = ajax.response;
					progressBar.style.display = 'none';
				} else {
					progressBar.style.display = 'block';
					divReturn.style.display = 'block';
					divReturn.textContent = 'Enviando arquivo!';
				}
			}
			ajax.upload.addEventListener('progress', function (evt) {

				pct = Math.floor((evt.loaded * 100) / evt.total);
				progressBar.style.width = pct + '%';
				progressBar.getElementsByTagName('span')[0].textContent = pct + '%';

			}, false);

			ajax.open('POST', 'controller/action-post.php');
			ajax.send(formData);

			}
		
		});
	</script>
</br>
	<input type="submit" name="enviar"  style='margin-left: 5em;' class="col-md-2 btn-success">
</form>
<div id="return"></div>

<div id="progressBar">
	<span></span>
</div>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: sans-serif;
 
}
  #progress_bar1 {
    margin: 10px 0;
    padding: 3px;
    border: 1px solid #000;
    font-size: 14px;
    clear: both;
    opacity: 0;
    -moz-transition: opacity 1s linear;
    -o-transition: opacity 1s linear;
    -webkit-transition: opacity 1s linear;
  }
  #progress_bar1.loading1 {
    opacity: 1.0;
  }
  #progress_bar1 .percent1 {
    background-color: #99ccff;
    height: auto;
    width: 0;																											
  }

  #progress_bar {
    margin: 10px 0;
    padding: 3px;
    border: 1px solid #000;
    font-size: 14px;
    clear: both;
    opacity: 0;
    -moz-transition: opacity 1s linear;
    -o-transition: opacity 1s linear;
    -webkit-transition: opacity 1s linear;
  }
  #progress_bar.loading {
    opacity: 1.0;
  }
  #progress_bar .percent {
    background-color: #99ccff;
    height: auto;
    width: 0;																											
  }
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
}

.upload {
    display: inline-block;
    width: 100%;
    max-width: 600px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    padding: 25px;
    margin: 14px;
}

h1 {
    font-size: 1em;
    color: #6f48ad;
    margin-bottom: 20px;
}

form {
    position: relative;
    display: block;

    margin-bottom: 10px;
}

#formFiles input {
    position: relative;
    border: thin solid #ddd;
    padding: 12px;
    width: 100%;
    border-radius: 3px;
    margin-bottom: 10px;
}

#formFiles button {
    position: relative;
    cursor: pointer;
    padding: 14px;
    display: inline-block;
    background-color: #7233e8;
    color: #fff;
    font-weight: bold;
    font-size: 1.1em;
    border: none;
    outline: none;
    width: 100%;
    border-radius: 3px;
}

#formFiles button:hover {
    background-color: #5b12e6;
}

#progressBar {
    position: relative;
    display: none;
    background: linear-gradient(135deg, rgb(34, 130, 227) 0%, rgb(9, 226, 51) 100%);
    height: 16px;
    width: 0;
    line-height: 16px;
    color: #fff;
    font-size: 0.75em;
    overflow: hidden;
}

#return {
    font-size: 0.8em;
    font-weight: bold;
    margin-bottom: 5px;
}
</style>
<script>
  var reader;
  var progress = document.querySelector('.percent');

  function abortRead() {
    reader.abort();
  }
  function errorHandler(evt) {
    switch(evt.target.error.code) {
      case evt.target.error.NOT_FOUND_ERR:
        alert('File Not Found!');
        break;
      case evt.target.error.NOT_READABLE_ERR:
        alert('File is not readable');
        break;
      case evt.target.error.ABORT_ERR:
        break; // noop
      default:
        alert('An error occurred reading this file.');
    };
  }
  function updateProgress(evt) {
    // evt is an ProgressEvent.
    if (evt.lengthComputable) {
      var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
      // Increase the progress bar length.
      if (percentLoaded < 100) {
        progress.style.width = percentLoaded + '%';
        progress.textContent = percentLoaded + '%';
      }
    }
  }

  function handleFileSelect(evt) {
    // Reset progress indicator on new file selection.
    progress.style.width = '0%';
    progress.textContent = '0%';
    reader = new FileReader();
    reader.onerror = errorHandler;
    reader.onprogress = updateProgress;
    reader.onabort = function(e) {
      alert('File read cancelled');
    };
    reader.onloadstart = function(e) {
      document.getElementById('progress_bar').className = 'loading';
    };
    reader.onload = function(e) {
      // Ensure that the progress bar displays 100% at the end.
      progress.style.width = '100%';
      progress.textContent = '100%';
      //setTimeout("document.getElementById('progress_bar').className='';", 2000);
    }

    // Read in the image file as a binary string.
    reader.readAsBinaryString(evt.target.files[0]);
  }
document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
<script>
  var reader1;
  var progress1 = document.querySelector('.percent1');

  function abortRead() {
    reader1.abort();
  }
  function errorHandler(evt) {
    switch(evt.target.error.code) {
      case evt.target.error.NOT_FOUND_ERR:
        alert('File Not Found!');
        break;
      case evt.target.error.NOT_READABLE_ERR:
        alert('File is not readable');
        break;
      case evt.target.error.ABORT_ERR:
        break; // noop
      default:
        alert('An error occurred reading this file.');
    };
  }
  function updateProgress(evt) {
    // evt is an ProgressEvent.
    if (evt.lengthComputable) {
      var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
      // Increase the progress bar length.
      if (percentLoaded < 100) {
        progress1.style.width = percentLoaded + '%';
        progress1.textContent = percentLoaded + '%';
      }
    }
  }

  function handleFileSelect(evt) {
    // Reset progress indicator on new file selection.
    progress1.style.width = '0%';
    progress1.textContent = '0%';
    reader1 = new FileReader();
    reader1.onerror = errorHandler;
    reader1.onprogress = updateProgress;
    reader1.onabort = function(e) {
      alert('File read cancelled');
    };
    reader1.onloadstart = function(e) {
      document.getElementById('progress_bar1').className = 'loading1';
    };
    reader1.onload = function(e) {
      // Ensure that the progress bar displays 100% at the end.
      progress1.style.width = '100%';
      progress1.textContent = '100%';
      //setTimeout("document.getElementById('progress_bar').className='';", 2000);
    }

    // Read in the image file as a binary string.
    reader1.readAsBinaryString(evt.target.files[0]);
  }
document.getElementById('files2').addEventListener('change', handleFileSelect, false);
</script>