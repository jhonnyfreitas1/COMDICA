<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ($denuncia[0]->hashDenun)?: 'Denúncia' }}</title>
    <link rel="stylesheet" type="text/css" href="{{ base_path().'/location/css/bootstrap.min.css' }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- <link rel="stylesheet" href={{ asset("bootstrap/css/bootstrap.css") }}> -->
            <!-- Bootstrap core CSS -->
            <!-- <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet"> -->
   
        <!-- <link rel="stylesheet" href="/css/app.css"> -->

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
        input{
            font-style: italic;
        }
        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: none;
            border-radius: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <br><br>
        <div class="row1" style="text-align: center;">
            <img src="{{asset('img/Denun.png')}}" alt="" width="100px" height="100px">
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
                            <label for="name">Nome:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->name)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Sexo:</label>
                            @if($denuncia[0]->gender == NULL)
                                <input type="text" name="name"class="form-control" id="name" value="{{ 'Não informado' }}">
                            @else
                                <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->gender == 'F') ? 'Feminino' : 'Masculino' }}">
                            @endif
                        </div>
                        <!-- <h3>{{$denuncia[0]->gender}}</h3> -->
                        <div class="form-group col-md-3">
                            <label for="name">Etnia:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->ethnicity)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Gestante:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->pregnant)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Nome do Responsável :</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->responsible)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Localidade:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->locality)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Logradouro:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->street)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Complemento:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->complement)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Número da Residência:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->residence)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Telefone:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->number)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Deficiente:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->deficient)?: 'Não informado' }}" >
                        </div>
                    </div>
                    <div class="fontP">
                        <br><br>
                        <h5 style="color:#0D6138">Dados da Ocorrência:</h5>
                        <hr>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Local da Ocorrência:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->occurrence)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Ocorreu Outras Vezes?</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->otherOcurrence and $denuncia[0]->otherOcurrence === 1) ? 'Sim' : 'Não' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">A lesão foi autoprovocada?</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->autoProvocated and $denuncia[0]->autoProvocated === 1) ? 'Sim' : 'Não' }}" >
                        </div>
                    </div>
                    <div class="fontP">
                        <br><br>
                        <h5 style="color:#0D6138">Tipologia da Violência:</h5>
                        <hr>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Tipo de Violência:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->violence)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Meio de Agressão:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->agression)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Consequência da Ocorrência:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->consOcurrence)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Tipo de Violência Sexual:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->violenceType)?: 'Não informado' }}" >
                        </div>
                        <br>
                        <div class="form-group col-md-4">
                            <label for="name">Ocorreu penetração?</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->penetration)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Tipo de penetração:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->penetrationType)?: 'Não informado' }}" >
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
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->nature)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Parte do Corpo Atingida:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->bodyPart)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Provavel Nome e(ou) Apelido do Agressor:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->agressorName)?: 'Não informado' }}" >
                        </div>
                        <br>
                        <div class="form-group col-md-3">
                            <label for="name">Idade do Agressor:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->agressorAge)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Sexo do Provável Agressor:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->agressorGender)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Vínculo Social:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->agressorBond)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Provável uso de Álcool:</label>
                            <input type="text" name="name"class="form-control" id="name" value="{{ ($denuncia[0]->alcool)?: 'Não informado' }}" >
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
