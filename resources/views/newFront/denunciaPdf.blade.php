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
        textarea{
            font-style: italic;
            resize:none
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
            <h6 class="fontI">Relatório de Denúncia. Comdica Araçoiaba PE.</h6>
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
                            <input type="text" name="name" disabled style="background-color:white;" class="form-control ipt" id="name" value="{{ ($denuncia[0]->name)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="gender">Sexo:</label>
                            @if($denuncia[0]->gender == NULL)
                                <input type="text" name="gender"class="form-control" disabled style="background-color:white;"  id="gender" value="{{ 'Não informado' }}">
                            @else
                                <input type="text" name="gender"class="form-control" disabled style="background-color:white;"  id="gender" value="{{ ($denuncia[0]->gender == 'F') ? 'Feminino' : 'Masculino' }}">
                            @endif
                        </div>
                        <!-- <h3>{{$denuncia[0]->gender}}</h3> -->
                        <div class="form-group col-md-3">
                            <label for="ethnicity">Etnia:</label>
                            <input type="text" name="ethnicity"class="form-control" disabled style="background-color:white;"  id="ethnicity" value="{{ ($denuncia[0]->ethnicity)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pregnant">Gestante:</label>
                            <input type="text" name="pregnant"class="form-control" disabled style="background-color:white;"  id="pregnant" value="{{ ($denuncia[0]->pregnant)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="responsible">Nome do Responsável :</label>
                            <input type="text" name="responsible"class="form-control" disabled style="background-color:white;"  id="responsible" value="{{ ($denuncia[0]->responsible)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="locality">Localidade:</label>
                            <input type="text" name="locality"class="form-control" disabled style="background-color:white;"  id="locality" value="{{ ($denuncia[0]->locality)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="street">Logradouro:</label>
                            <input type="text" name="street"class="form-control" disabled style="background-color:white;"  id="street" value="{{ ($denuncia[0]->street)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="complement">Complemento:</label>
                            <input type="text" name="complement"class="form-control" disabled style="background-color:white;"  id="complement" value="{{ ($denuncia[0]->complement)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="residence">Número da Residência:</label>
                            <input type="text" name="residence"class="form-control" disabled style="background-color:white;"  id="residence" value="{{ ($denuncia[0]->residence)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="number">Telefone:</label>
                            <input type="text" name="number"class="form-control" disabled style="background-color:white;"  id="number" value="{{ ($denuncia[0]->number)?: 'Não informado' }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deficient">Deficiente:</label>
                            <input type="text" name="deficient"class="form-control" disabled style="background-color:white;"  id="deficient" value="{{ ($denuncia[0]->deficient)?: 'Não informado' }}" >
                        </div>
                    </div>
                    <div class="fontP">
                        <br><br>
                        <h5 style="color:#0D6138">Dados da Ocorrência:</h5>
                        <hr>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="occurence">Local da Ocorrência:</label>
                            <input type="text" name="occurence"class="form-control" disabled style="background-color:white;"  id="occurence" value="{{ ($denuncia[0]->occurrence)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="otherOcurrence">Ocorreu Outras Vezes?</label>
                            <input type="text" name="otherOcurrence"class="form-control" disabled style="background-color:white;"  id="otherOcurrence" value="{{ ($denuncia[0]->otherOcurrence and $denuncia[0]->otherOcurrence === 1) ? 'Sim' : 'Não' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="autoProvocated">A lesão foi autoprovocada?</label>
                            <input type="text" name="autoProvocated"class="form-control" disabled style="background-color:white;"  id="autoProvocated" value="{{ ($denuncia[0]->autoProvocated and $denuncia[0]->autoProvocated === 1) ? 'Sim' : 'Não' }}" >
                        </div>
                    </div>
                    <div class="fontP">
                        <br><br>
                        <h5 style="color:#0D6138">Tipologia da Violência:</h5>
                        <hr>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="violence">Tipo de Violência:</label>
                            <input type="text" name="violence"class="form-control" disabled style="background-color:white;"  id="violence" value="{{ ($denuncia[0]->violence)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="agression">Meio de Agressão:</label>
                            <input type="text" name="agression"class="form-control" disabled style="background-color:white;"  id="agression" value="{{ ($denuncia[0]->agression)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="consOcurrence">Consequência da Ocorrência:</label>
                            <input type="text" name="consOcurrence"class="form-control" disabled style="background-color:white;"  id="consOcurrence" value="{{ ($denuncia[0]->consOcurrence)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="violenceType">Tipo de Violência Sexual:</label>
                            <input type="text" name="violenceType"class="form-control" disabled style="background-color:white;"  id="violenceType" value="{{ ($denuncia[0]->violenceType)?: 'Não informado' }}" >
                        </div>
                        <br>
                        <div class="form-group col-md-4">
                            <label for="penetration">Ocorreu penetração?</label>
                            <input type="text" name="penetration"class="form-control" disabled style="background-color:white;"  id="penetration" value="{{ ($denuncia[0]->penetration)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="penetrationType">Tipo de penetração:</label>
                            <input type="text" name="penetrationType"class="form-control" disabled style="background-color:white;"  id="penetrationType" value="{{ ($denuncia[0]->penetrationType)?: 'Não informado' }}" >
                        </div>
                    </div>
                    <div class="fontP">
                        <br><br>
                        <h5 style="color:#0D6138">Dados da Lesão / Dados do Agressor</h5>
                        <hr>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nature">Natureza da Lesão:</label>
                            <input type="text" name="nature"class="form-control" disabled style="background-color:white;"  id="nature" value="{{ ($denuncia[0]->nature)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bodyPart">Parte do Corpo Atingida:</label>
                            <input type="text" name="bodyPart"class="form-control" disabled style="background-color:white;"  id="bodyPart" value="{{ ($denuncia[0]->bodyPart)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="agressorName">Provavel Nome e(ou) Apelido do Agressor:</label>
                            <input type="text" name="agressorName"class="form-control" disabled style="background-color:white;"  id="agressorName" value="{{ ($denuncia[0]->agressorName)?: 'Não informado' }}" >
                        </div>
                        <br>
                        <div class="form-group col-md-3">
                            <label for="agressorAge">Idade do Agressor:</label>
                            <input type="text" name="agressorAge"class="form-control" disabled style="background-color:white;"  id="agressorAge" value="{{ ($denuncia[0]->agressorAge)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="agressorGender">Sexo do Provável Agressor:</label>
                            <input type="text" name="agressorGender"class="form-control" disabled style="background-color:white;"  id="agressorGender" value="{{ ($denuncia[0]->agressorGender)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="agressorBody">Vínculo Social:</label>
                            <input type="text" name="agressorBody"class="form-control" disabled style="background-color:white;"  id="agressorBody" value="{{ ($denuncia[0]->agressorBond)?: 'Não informado' }}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alcool">Provável uso de Álcool:</label>
                            <input type="text" name="alcool"class="form-control" disabled style="background-color:white;"  id="alcool" value="{{ ($denuncia[0]->alcool)?: 'Não informado' }}" >
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: #f2f2f2;">
                        <!-- <a href="{{route('denuncias.verPdf', [$denuncia[0]->hashDenun])}}" class="btn btn-sm w-25 btn-outline-success">Gerar pdf</a> -->
                    </div>
                <div class="card">
                <div class="row1">
                        <br><br>
                        <h5 style="color:#0D6138">RASTREIO DA DENÚNCIA</h5>
                </div>
                        <hr>
                    <div class="fontP">
                        <br>
                            <label for="realizacao"><strong>Denúncia Realizada às {{date("H:m - d/m/Y ",strtotime($denuncia[0]->created_at) ) }}<strong></label>
                            <input type="text" name="realizacao"class="form-control" disabled style="background-color:white;"  id="name" value="Status : Em Análise" >
                            <hr>
                        </div>
                        <!-- <br><br><br> -->
                    </div>
                    <!-- </div> -->
                    @if(count($encaminhamentos) > 0)    @php($p=1)
                            @foreach($encaminhamentos as $encaminhamento)
                                <div class="fontP">
                                    <!-- <br><br> -->
                                    <label for="e{{$p}}"><strong>Denúncia Encaminhada para {{$encaminhamento->encOrgao}} às {{date("H:i - d/m/Y ",strtotime($encaminhamento->created_at) ) }}<strong></label>
                                    @if(isset($encaminhamento->encDesc) && $encaminhamento->encDesc != NULL)
                                        <textarea type="text" name="e{{$p}}" class="form-control" disabled style="background-color:white;"  id="e{{$p}}">Descrição: {{$encaminhamento->encDesc}} </textarea>
                                    @endif
                                    <input type="text" class="form-control" disabled style="background-color:white;" value="Status : Encaminhada" ></input>
                                    <hr>
                                </div>
                                @php($p++)
                                    <!-- <br><br><br> -->
                            @endforeach
                        @endif

                        @if($denuncia[0]->finStatus == true)
                            <div class="fontP">
                                <label for="f"><strong>Denúncia Finalizada às {{date("H:i - d/m/Y ",strtotime($denuncia[0]->up_final) ) }}, as devidas providências estão sendo tomadas.<strong></label>
                                @if(isset($denuncia[0]->finDesc) && $denuncia[0]->finDesc != NULL)
                                    <textarea type="text" name="f" class="form-control" disabled style="background-color:white;"  id="name">Descrição: {{$denuncia[0]->finDesc}}</textarea>
                                @endif
                                <input type="text" class="form-control" disabled style="background-color:white;" value="Status : Finalizada" >
                                <hr>
                            </div>

                                <!-- <br><br><br> -->
                        @endif
                    </div>




                    <!-- <div class="card-footer" style="background-color: #f2f2f2;">
                        <br><br>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
