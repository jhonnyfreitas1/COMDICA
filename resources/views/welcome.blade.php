<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Denúncias - Form</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/indexPwa.css">
    <!-- PWA -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#00A859">

    <!-- Script que chama o manifest.json -->
<!--     <script>
        if('serviceWorker' in navigator) {
          navigator.serviceWorker
                   .register('/js/sw.js')
                   .then(function() { console.log("Service Worker Registered"); });
        }
    </script> -->
    <script>
        
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/sw.js', {scope: '/'})
  .then(function(reg) {
    // registration worked
    console.log('Registration succeeded. Scope is ' + reg.scope);
  }).catch(function(error) {
    // registration failed
    console.log('Registration failed with ' + error);
  });
}

    </script>
</head>
<body>
    <div class="container mt-1 mb-5">
        <div class="row">
            <div class="col col1" style="">
                <div style="margin-left:5px;"><h4><i class="fa fa-volume-up"></i> Denunciar Abuso</h4></div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col" >
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a id="bar1" class="nav-link disabled" href="#">1. Dados Gerais</a>
                            </li>
                            <li class="nav-item">
                                <a id="bar2" class="nav-link disabled" href="#">2. Dados de Ocorrência</a>
                            </li>
                            <li class="nav-item">
                                <a id="bar3" class="nav-link disabled" href="#">3. Tipologia da Violência</a>
                            </li>
                            <li class="nav-item">
                                <a id="bar4" class="nav-link disabled" href="#">4. Dados da Lesão</a>
                            </li>
                            <li class="nav-item">
                                <a id="bar5" class="nav-link disabled" href="#">5. Dados da Agressor</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" style="margin-left: -10px;">
                        <form>
                            <div id="step1" class="step">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nome :</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Nome">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Sexo :</label>
                                        <select name="" id="sexo" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Feminino</option>
                                            <option value="2">Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Etnia :</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Branco</option>
                                            <option value="2">Pardo</option>
                                            <option value="2">Negro</option>
                                            <option value="2">Indígena</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Você é gestante? :</label>
                                        <fieldset id="fieldset" disabled>
                                            <select name="" id="gestante" class="form-control">
                                                <option value="">Selecione uma opção</option>
                                                <option value="1">Sim</option>
                                                <option value="2">Não</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nome do Responsável :</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Nome do Responsável">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Localidade :</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Localidade">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Logradouro :</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Logradouro">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Complemento :</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Ex : Casa, Apartamento">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Número da residência :</label>
                                        <input type="number" min="0" class="form-control" id="inputEmail4" placeholder="Ex : 22, 30">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Telefone:</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Telefone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Deficiente ? :</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Sim</option>
                                            <option value="2">Não</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step2" class="step">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Local da ocorrência :</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Residência</option>
                                            <option value="3">Habitação Coletiva</option>
                                            <option value="4">Escola</option>
                                            <option value="5">Local de Prática Esportiva</option>
                                            <option value="6">Bar ou Similar</option>
                                            <option value="7">Via pública</option>
                                            <option value="8">Comércio/Serviços</option>
                                            <option value="8">Indústria/Construção</option>
                                            <option value="8">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Ocorreu outras vezes? :</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Sim</option>
                                            <option value="2">Não</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">A lesão foi autoprovocada? :</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Sim</option>
                                            <option value="2">Não</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step3" class="step">
                                <div class="form-row" >
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Tipo de violência :</label>
                                        <select name="" id="violencia" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Física</option>
                                            <option value="3">Psicológica/Mental</option>
                                            <option value="4">Tortura</option>
                                            <option value="5">Sexual</option>
                                            <option value="6">Tráfico de Seres Humanos</option>
                                            <option value="7">Financeira/Econômica</option>
                                            <option value="8">Negligência/Abandono</option>
                                            <option value="9">Trabalho Infantil</option>
                                            <option value="10">Intervenção Legal</option>
                                            <option value="11">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Meio de Agressão :</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Força corporal/Espancamento</option>
                                            <option value="2">Enforcamento</option>
                                            <option value="2">Objeto Contudente</option>
                                            <option value="2">Objeto Pérfuro-cortante</option>
                                            <option value="2">Objeto Substância/Objeto Quente</option>
                                            <option value="2">Envenenamento</option>
                                            <option value="2">Arma de Fogo</option>
                                            <option value="2">Ameaça</option>
                                            <option value="2">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Consequência da Ocorrência : </label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Aborto</option>
                                            <option value="1">Gravidez</option>
                                            <option value="2">DST</option>
                                            <option value="2">Tentativa de Suicídio</option>
                                            <option value="2">Transtorno Mental</option>
                                            <option value="2">Transtorno Comportamental</option>
                                            <option value="2">Estresse Pós-traumático</option>
                                            <option value="2">Outros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row" id="violenceType" hidden>
                                    <div class="form-group col-md-4" >
                                        <label for="inputEmail4">Tipo de Violência Sexual :</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Assédio Sexual</option>
                                            <option value="2">Atentado Violento ao Pudor</option>
                                            <option value="2">Estupro</option>
                                            <option value="2">Exploração Sexual</option>
                                            <option value="2">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Ocorreu penetração? </label>
                                        <select name="" id="penetracao" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Sim</option>
                                            <option value="2">Não</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4" id="penetracaoType" hidden>
                                        <label for="inputPassword4">Tipo de Penetração : </label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Anal</option>
                                            <option value="1">Oral</option>
                                            <option value="2">Vaginal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step4" class="step">
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Natureza da Lesão :</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="">Contusão</option>
                                            <option value="">Corte/Perfuração/Laceração</option>
                                            <option value="">Entorse/Luxação</option>
                                            <option value="">Fratura</option>
                                            <option value="">Amputação</option>
                                            <option value="">Traumatismo Dentário</option>
                                            <option value="">Traumatismo Crâniano-Encefálico</option>
                                            <option value="">Politraumatismo</option>
                                            <option value="">Intoxicação</option>
                                            <option value="">Queimadura</option>
                                            <option value="">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Parte do Corpo Atingida :</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Cabeça/Rosto</option>
                                            <option value="1">Pescoço</option>
                                            <option value="2">Boca/Dentes</option>
                                            <option value="2">Coluna/Medula</option>
                                            <option value="2">Tórax/Dorso</option>
                                            <option value="2">Abdômen</option>
                                            <option value="2">Quadril/Pelve</option>
                                            <option value="2">Membros Superiores</option>
                                            <option value="2">Membros Inferiores</option>
                                            <option value="2">Órgãos genitais/Ânus</option>
                                            <option value="2">Múltiplos Órgãos/Regiões</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step5" class="step">
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Número de envolvidos :</label>
                                        <input type="number" class="form-control" value='0'>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Vínculo Social : </label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Pai</option>
                                            <option value="1">Mãe</option>
                                            <option value="2">Padrasto</option>
                                            <option value="2">Madrasta</option>
                                            <option value="2">Cônjuge</option>
                                            <option value="2">Ex-Cônjuge</option>
                                            <option value="2">Namorado(A)</option>
                                            <option value="2">Ex-Namorado(A)</option>
                                            <option value="2">Filho(A)</option>
                                            <option value="2">Irmão(A)</option>
                                            <option value="2">Amigos/Conhecidos</option>
                                            <option value="2">Desconhecidos</option>
                                            <option value="2">Cuidador(A)</option>
                                            <option value="2">Patrão/Chefe</option>
                                            <option value="2">Pessoa Com Relação Institucional</option>
                                            <option value="2">Policial/Agente</option>
                                            <option value="2">Própria Pessoa</option>
                                            <option value="2">Outros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Sexo do Provável Agressor :</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Feminino</option>
                                            <option value="1">Masculino</option>
                                            <option value="1">Ambos os Sexos</option>
                                            <option value="1">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Provável uso de Álcool : </label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Sim</option>
                                            <option value="1">Não</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success mt-2" id='submit'type="submit" hidden>
                                Denunciar <i class="fa fa-correct"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-footer" style="background-color: white;">
                        <button class="btn btn-success" id="prev">
                            <i class="fa fa-arrow-left"></i>
                        </button>
                        <button class="btn btn-success" id="next">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.step').hide()
            $('.step').first().show()
            //Passo exibido
            var showStep= function(){
                var step = parseInt($(".step:visible").index());
                if(step == 0){
                    $('#prev').prop('disabled', true);
                    $('#bar1').removeClass('disabled')
                    $('#bar1').addClass('active')
                    $('#bar2').removeClass('active')
                    $('#bar2').addClass('disabled')
                    $('#submit').attr('hidden','hidden');
                }else if(step == 1){
                    $('#bar1').removeClass('active')
                    $('#bar1').addClass('disabled')
                    $('#bar2').removeClass('disabled')
                    $('#bar2').addClass('active')
                    $('#bar3').removeClass('active')
                    $('#bar3').addClass('disabled')
                    $('#prev').prop('disabled', false);
                    $('#next').prop('disabled', false)
                    $('#submit').attr('hidden','hidden');
                }else if(step == 2){
                    $('#bar2').removeClass('active')
                    $('#bar2').addClass('disabled')
                    $('#bar3').removeClass('disabled')
                    $('#bar3').addClass('active')
                    $('#bar4').removeClass('active')
                    $('#bar4').addClass('disabled')
                    $('#submit').attr('hidden','hidden');
                }else if(step == 3){
                    $('#bar3').removeClass('active')
                    $('#bar3').addClass('disabled')
                    $('#bar4').removeClass('disabled')
                    $('#bar4').addClass('active')
                    $('#bar5').removeClass('active')
                    $('#bar5').addClass('disabled')
                    $('#prev').prop('disabled', false);
                    $('#next').prop('disabled', false)
                    $('#submit').attr('hidden','hidden');
                }else if(step == 4){
                    $('#bar4').removeClass('active')
                    $('#bar4').addClass('disabled')
                    $('#bar5').removeClass('disabled')
                    $('#bar5').addClass('active')
                    $('#next').prop('disabled', true)
                    $('#prev').prop('disabled', false);
                    $('#submit').removeAttr('hidden');
                }else{
                    $('#prev').prop('disabled', false);
                    $('#next').prop('disabled', false);
                }
            };
            $('#sexo').change(function (){
                if($(this).val() == 2){
                    $('#fieldset').attr("disabled", "disabled");
                }else if($(this).val() == 1){
                    $('#fieldset').removeAttr('disabled');
                }else{
                    $('#fieldset').attr("disabled", "disabled");
                }
            });
            $('#violencia').change(function(){
                if($(this).val() == 5){
                    $('#violenceType').removeAttr('hidden');
                }else{
                    $('#violenceType').attr('hidden', 'hidden');
                }
            });
            $('#penetracao').change(function(){
                if($(this).val() == 1){
                    $('#penetracaoType').removeAttr('hidden');
                }else{
                    $('#penetracaoType').attr('hidden', 'hidden');
                }
            });
            //Exibir
            showStep();
            //Next
            $("#next").click(function(){
                $('.step:visible').hide().next().show();
                showStep();
            });
            $("#prev").click(function(){
                $('.step:visible').hide().prev().show();
                
                showStep();
            });
        });
    </script>
</body>
</html>