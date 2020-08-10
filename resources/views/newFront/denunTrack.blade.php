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
        .font{
            font-family: Comdica;
        }
        .fontP{
            font-family: Georgia, "Times New Roman", serif;
            font-size: 16px;
            line-height: 20px;
            font-style: italic;
            margin: auto;
            border-bottom: 4px dotted grey;
        }
    </style>
</head>
<body>
    <div class="container mb-5">
        <div class="row">
            <div class="col col1 font" style="">
                <div style="margin-left:5px;"><h4>Rastrear Denúncia</h4></div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col" >
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item font">
                                <a id="bar1" class="nav-link active" href="#"><i class="fa fa-thumbs-up"></i> Denúncia Realizada</a>
                            </li>
                            <li class="nav-item font">
                                <a id="bar2" class="nav-link  @if(count($encaminhamentos) > 0) active @else disabled @endif" href="#"><i class="fa fa-envelope"></i> Denúncia Encaminhada</a>
                            </li>
                            <li class="nav-item font" >
                                <a id="bar3" class="nav-link @if($denuncia->finStatus == true) active @else disabled @endif" href="#"><i class="fa fa-check-circle"></i> Denúncia Finalizada</a>
                            </li>
                        </ul>
                    </div>
                    <div class="fontP">
                        <br><br>
                        <p>Denúncia Realizada às {{date("H:m - d/m/Y ",strtotime($denuncia->created_at) ) }} </p>
                        <p>Status : <b>Em Análise</b></p>
                        <br>
                        @if(count($encaminhamentos) > 0)
                            @foreach($encaminhamentos as $encaminhamento)
                                <p>Denúncia Encaminhada para {{$encaminhamento->encOrgao}} às {{date("H:m - d/m/Y ",strtotime($encaminhamento->created_at) ) }}</p>
                                <p>Status : <b>Encaminhada</b></p>
                             <br>
                            @endforeach
                        @endif
                        @if($denuncia->finStatus == true)
                            <p>Denúncia Finalizada às {{date("H:m - d/m/Y ",strtotime($denuncia->up_final) ) }}, as devidas providências estão sendo tomadas.</p>
                            <p>Status : <b>Finalizada</b></p>
                        @endif
                    </div>
                    <br><br><br>
                    <div class="card-footer" style="background-color: #f2f2f2;">
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
