@extends('layouts.admin')

	@section('area-principal')

  @section('admin-js')
  <script src='/js/nova_postagem.js'> </script>
  <link rel="stylesheet" type="text/css" href="/js/nova_postagem.css">
  @endsection
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

  <form style="background:#dcdcdc; margin:3%; padding:1em;" class=" mt-2 border border-secondary col-offset-6 centered col-md-10 row" method="post"  id='form-postagem' name="form-postagem" enctype="multipart/form-data">
    <div class="form-row col-md-12">
    <div class="form-group col-md-12 ">
      <label for="">Titulo da postagem </label><label style="color:red;">*</label>
      <input class="form-control col-md-12" value="" type="text" name="titulo" required>
    </div>
    <div class="form-group col-md-12 col-12 ">
      <label>Imagem principal da postagem<label style="color:red;">*</label><b>Tipos: ".png", ".jpg", ".jpeg", ".bmp"</b></label>
      <div class="file-field">
        <div class="btn btn-success btn-sm col-12 col-md-12">
          <span class="float-left">Procurar imagem</span>
          <input type="file" id="uploadImage" name='imagem'   class='float-left col-6 col-md-8' required>
        </div>
      </div>
    </div>
    </div>
    <div   class="form-row">
    <div class="form-group col-md-12">
      <!---CONcertando conflitos aki  -->
      <div class="form-group col-md-12">
        <button id="ancora" class="btn bg-warning"> >Link </button>
        <label for="comment">Descrição do post<label style="color:red;">*</label></label>
        <textarea id='input-descricao-postagem' name="descricao" class="form-control col12" rows="8" id="comment" required></textarea>
      </div>
      <div class="input-group m-3 ">
        <div class="input-group-prepend">
          <label class="input-group-text bg-primary text-light" for="inputGroupSelect01">Categorias </label>
        </div>
        <select class="categoria bg-light" name="categoria" id="categoria" required="required">
          <option ></option>
          <option value="1">PROJETOS FINANCIADOS</option>
          <option value="2">REUNIÕES, ATAS, RESOLUÇÕES</option>
          <option value="3">NOTÍCIAS</option>
          <option value="4">PUBLICAÇÕES, EVENTOS, FÓRUMS, CONFERÊNCIAS</option>
          <option value="5">2º PROCESSO DE ESCOLHA</option>
        </select>


      <div id='anexos_pdf' class="form-group col-md-11 mt-2 bg-info form-group11">
        <button class='btn text-light' id='newpdf'><i class="fas fa-plus"></i> Novo PDF</button>
          <label>Anexo de pdf <span class="text-warning col-md-10">(opcional)</span><b></b></label>
          <!-- <div class="file-field">
            <div class="btn btn-danger col-md-12 btn-sm float-left ">
              <span class="float-left">Procurar pdf</span>
              <input type="file" class="float-left col-9 col-md-8" id="files2"  name='pdf'>
              <div id="progress_bar1">
                <div class="percent1">0%</div>
              </div>
            </div>
          </div>-->

      </div>
    </div>
    <!-- </div>
    <div class="form-group col-md-12">
      <div class="form-group col-md-12">
        <label >Anexo um segundo pdf <span class="text-warning">(opcional)</span><b></b></label>
        <div class="file-field ">
          <div class="btn btn-danger col-md-12  btn-sm ">
            <span class="float-left">Procurar pdf</span>

            <input type="file" id="files"  class='col-9 col-md-8 float-left' name='pdf2'>

            <div id="progress_bar">

              <div class="percent">0%</div>
            </div>
          </div>
        </div>
      </div>  -->
      <input type="hidden" id='token' name="_token" value="{{ csrf_token() }}">

      <label class="ml-3">Anexo um link para o youtube <span class="text-warning">(opcional)</span></label>
      <div class="ml-1  mr-1 input-group col-md-12">
        <div class="input-group-prepend ">
          <span class="input-group-text bg-danger text-white">Link do youtube</span>
        </div>
        <input type="text" name='yt' class="form-control">
      </div>
    </div>
  </div>

  </div>
  <a href=""  id="ai"></a>
  </br>
  <input type="submit" name="enviar"  style='margin-left: 5em;' class=" text-light border  border-light float-left col-md-4 mb-3 col-6 btn-success">
  </form>
  <div id="return"></div>

  <div id="progressBar">
    <span></span>
  </div>
  <script type="text/javascript">
  document.addEventListener('DOMContentLoaded', () =>{

    $('.close').on('click', function(e){
      $('#exemplomodal').hide();
    })

    //adicionar um link
    $('#ancora').on('click' ,function(e){
      e.preventDefault();
      var link = prompt('Adicione o link, exemplo: http://www.example.com/');
      var nome_link = prompt('Dê um nome ao link').replace(" ", "_");
      var meulink = " <a href='"+link+"'>"+ nome_link +"</a>";

      $("#comment").val(function() {
        return this.value + meulink;
      });
    });

    //declarando variaveis do progresso no envio do form
    var formFiles, divReturn, progressBar;

    formFiles = $('#form-postagem');
    divReturn = document.getElementById('return');
    progressBar = document.getElementById('progressBar');

    $('#form-postagem').on('submit' ,function(e){
      e.preventDefault();
      let textbox = document.getElementById('input-descricao-postagem');
          textbox.value =  textbox.value.replace(/\n/g, "<br />");

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
              console.log(ajax.response);
            }
        ajax.upload.addEventListener('progress', function (evt) {
          formatDesc(); ///formatar textbox
          pct = Math.floor((evt.loaded * 100) / evt.total);
          progressBar.style.width = pct + '%';
          progressBar.getElementsByTagName('span')[0].textContent = pct + '%';

        }, false);

        ajax.open('POST', '/admin/postagem_save');
        ajax.send(formData);
    }
    });

  });
  </script>
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

@endsection
