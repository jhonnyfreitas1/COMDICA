<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Denúncias - Form</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/indexPwa2.css">
    <style>
        @font-face{
            font-family: Comdica;
            src: url('../fonts/Geometric\ 415\ Black\ BT.ttf');
        }
        label{
            font-family: Comdica;
            color: rgb(90, 85, 85);
        }
        
        .font{
            font-family: Comdica;
        }
        .fontI{
            font-family: Georgia, "Times New Roman", serif;
            font-style: italic;
            color: #0D6138;

        }
        .fontP{
            font-family: Comdica;
            color: #0D6138;
            line-height: 20px;
        }
        .row1{
            border-bottom: 4px dotted #0D6138;
            padding: 10px;
        }
        .form-control{
            border:none;
            border-radius: 0px;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <br><br>
        <div class="row1" style="text-align: center;">
            <img src="{{asset('img/Denun.png')}}" alt="" width="100px" height="100px">
            <br><br>
            <h6 class="fontI"><b>Relatório de Denúncia. Comdica Araçoiaba PE.</b></h6>
            <p class="fontI">”A criança é alegria como raio de sol e estímulo como a esperança.”</p>
        </div>
        <div class="row mt-2">
            <div class="col" >
                <div class="card">
                    <div class="fontP">
                        <br><br>
                        <h5 style="color:#0D6138">Dados da Vítima :</h5>
                        <hr>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="name">Nome :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Robson Carvalho">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Sexo :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Masculino">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Etnia :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Parda">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Gestante :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Não">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Nome do Responsável :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Moreira">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Localidade :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Bom Jardim">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Logradouro :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Rua 1">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Complemento :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Casa">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Número da Residência :</label>
                            <input type="text" name="name"class="form-control" id="name" value="22">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Telefone :</label>
                            <input type="text" name="name"class="form-control" id="name" value="(81)4002-8922">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Deficiente :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Não" >
                        </div>
                    </div>
                    <div class="fontP">
                        <br><br>
                        <h5 style="color:#0D6138">Dados da Ocorrência :</h5>
                        <hr>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Local da Ocorrência :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Habitação coletiva" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Ocorreu Outras Vezes ? :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Não" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">A lesão foi autoprovocada ? :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Não" >
                        </div>
                    </div>
                    <div class="fontP">
                        <br><br>
                        <h5 style="color:#0D6138">Tipologia da Violência :</h5>
                        <hr>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Tipo de Violência:</label>
                            <input type="text" name="name"class="form-control" id="name" value="Sexual" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Meio de Agressão :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Objeto Contudente" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Consequência da Ocorrência  :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Gravidez" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Tipo de Violência Sexual :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Assédio" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Ocorreu penetração ?  :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Sim" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Tipo de penetração  :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Oral" >
                        </div>
                    </div>
                    <div class="fontP">
                        <br><br>
                        <h5 style="color:#0D6138">Dados da Lesão / Dados do Agressor</h5>
                        <hr>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Natureza da Lesão:</label>
                            <input type="text" name="name"class="form-control" id="name" value="Contusão" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Parte do Corpo Atingida :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Objeto Contudente" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Provavel Nome e(ou) Apelido do Agressor ::</label>
                            <input type="text" name="name"class="form-control" id="name" value="Márcio" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Idade do Agressor :</label>
                            <input type="text" name="name"class="form-control" id="name" value="25" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Sexo do Provável Agressor :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Masculino" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Vínculo Social :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Pai" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Provável uso de Álcool :</label>
                            <input type="text" name="name"class="form-control" id="name" value="Não" >
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #f2f2f2;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
