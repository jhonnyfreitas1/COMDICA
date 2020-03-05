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
    reg.update();
    // console.log('Registration succeeded. Scope is ' + reg.scope);
  }).catch(function(error) {
    // registration failed
    console.log('Registration failed with ' + error);
  });
}

    </script>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade col-md-12 col-12" id="modaldenuncia" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog col-md-12 col-12" role="document">
        <div class="modal-content col-md-12 col-12">
        <div class="modal-header col-md-12 col-12">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Aviso preventivo</h5>
            </button>
        </div>
        <div class="modal-body">
            Confirmo que as informações prestadas nesse formulario de denuncia são verdadeiras e estou ciente de que 
            o uso inapropriado da ferramenta de denuncias pode causar prisão com base no artigo
             340 – A ao Decreto Lei nº 2.848 de
                07 de dezembro de 1940 (Código Penal):
                “Comunicação falsa – Trote”
                Art. 340 – A: Comunicar a Autoridade Pública, utilizando-se de
                qualquer meio de comunicação, a ocorrência de fato que sabe
                ou deva saber não ser verdadeiro.
                Pena: Detenção, de 01(um) a 03(três) anos, e multa de 01(um)
                a 10(dez) salários mínimos, a ser revertida às Secret   rias
                Estaduais de Segurança Pública ou órgão similar.
        </div>
        <div class="modal-footer">
            <a type="button"  href="/" class="btn btn-secondary" >Não confirmo</a>
            <button type="button" style="background:blue;" class="btn btn-primary" data-dismiss="modal">Confirmo estar ciente</button>
        </div>
        </div>
    </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col col1" style="">
                <div style="margin-left:5px;"><h4><i class="fa fa-volume-up"></i> Denunciar incidente em Araçoiaba</h4></div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col" >
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a id="bar1" class="nav-link disabled" href="#">1. Dados Gerais da vítima</a>
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
                        <form method="post" action="{{route('denuncia.store')}}">
                            @csrf
                            <div id="step1" class="step">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nome :</label>
                                        <input type="text" name="name"class="form-control" id="name" placeholder="Nome">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="sexo">Sexo :</label>
                                        <select name="gender" id="sexo" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="F">Feminino</option>
                                            <option value="M">Masculino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="ethnicity">Etnia :</label>
                                        <select name="ethnicity" id="ethnicity" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Branco">Branco</option>
                                            <option value="Pardo">Pardo</option>
                                            <option value="Negro">Negro</option>
                                            <option value="Indígena">Indígena</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fieldset">Você é gestante? :</label>
                                        <fieldset id="fieldset" disabled>
                                            <select name="pregnant" id="gestante" class="form-control">
                                                <option value="">Selecione uma opção</option>
                                                <option value="1" >Sim</option>
                                                <option value="0" >Não</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="responsible">Nome do Responsável :</label>
                                        <input type="text" name="responsible" class="form-control" id="responsible" placeholder="Nome do Responsável">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="locality">Localidade :</label>
                                        <select name="locality" id="locality" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Centro">Centro</option>
                                            <option value="Quinze">Quinze</option>
                                            <option value="Bom Jesus">Bom Jesus</option>
                                            <option value="Vila de Itapipireh">Vila de Itapipireh</option>
                                            <option value="Nova Araçoiaba">Nova Araçoiaba</option>
                                            <option value="Boa Esperança">Boa Esperança</option>
                                            <option value="Loteamento Hildebrando">Loteamento Hildebrando</option>
                                            <option value="Purgatorio">Purgatório</option>
                                            <option value="Distrito Canaã">Distrito Canaã</option>
                                            <option value="Engenho Vinagre">Engenho Vinagre</option>
                                            <option value="Loteamento São Miguel Arcanjo">Loteamento São Miguel Arcanjo</option>
                                            <option value="Loteamento Santa Helena">Loteamento Santa Helena</option>
                                            <option value="Residencia Flores">Residência Flores</option>
                                            <option value="Loteamento Boa Esperança">Loteamento Boa Esperança</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="street">Logradouro :</label>
                                        <input type="text" name="street" class="form-control" id="street" placeholder="Logradouro">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="complement">Complemento :</label>
                                        <input type="text" name="complement" class="form-control" id="complement" placeholder="Ex : Casa, Apartamento">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="residence">Número da residência :</label>
                                        <input type="number" name="residence" min="0" class="form-control" id="residence" placeholder="Ex : 22, 30">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="number">Telefone:</label>
                                        <input type="text" name="number" class="form-control" id="number" placeholder="Telefone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="deficient">Deficiente ? :</label>
                                        <select name="deficient" id="deficient" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step2" class="step">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="ocurrence">Local da ocorrência :</label>
                                        <select name="occurrence" id="ocurrence" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Residência">Residência</option>
                                            <option value="Habilitação Coletiva">Habitação Coletiva</option>
                                            <option value="Escola">Escola</option>
                                            <option value="Local de Prática Esportiva">Local de Prática Esportiva</option>
                                            <option value="Bar ou Similar">Bar ou Similar</option>
                                            <option value="Via pública">Via pública</option>
                                            <option value="Comércio/Serviços">Comércio/Serviços</option>
                                            <option value="Indústria/Construção">Indústria/Construção</option>
                                            <option value="Outros">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="otherOcurrence">Ocorreu outras vezes? :</label>
                                        <select name="otherOcurrence" id="otherOcurrence" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="autoProvocated">A lesão foi autoprovocada? :</label>
                                        <select name="autoProvocated" id="autoProvocated" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step3" class="step">
                                <div class="form-row" >
                                    <div class="form-group col-md-4">
                                        <label for="violencia">Tipo de violência :</label>
                                        <select name="violence" id="violencia" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Física">Física</option>
                                            <option value="Psicológica/Mental">Psicológica/Mental</option>
                                            <option value="Tortura">Tortura</option>
                                            <option value="Sexual">Sexual</option>
                                            <option value="Tráfico de Seres Humanos">Tráfico de Seres Humanos</option>
                                            <option value="Financeira/Econômica">Financeira/Econômica</option>
                                            <option value="Negligência/Abandono">Negligência/Abandono</option>
                                            <option value="Trabalho Infantil">Trabalho Infantil</option>
                                            <option value="Intervenção Legal">Intervenção Legal</option>
                                            <option value="Outros">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="agression">Meio de Agressão :</label>
                                        <select name="agression" id="agression" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Força corporal/Espancamento">Força corporal/Espancamento</option>
                                            <option value="Enforcamento">Enforcamento</option>
                                            <option value="Objeto Contudente">Objeto Contudente</option>
                                            <option value="Objeto Pérfuro-cortante">Objeto Pérfuro-cortante</option>
                                            <option value="Objeto Substância/Objeto Quente">Objeto Substância/Objeto Quente</option>
                                            <option value="Envenenamento">Envenenamento</option>
                                            <option value="Arma de Fogo">Arma de Fogo</option>
                                            <option value="Ameaça">Ameaça</option>
                                            <option value="Outros">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="consOcurrence">Consequência da Ocorrência : </label>
                                        <select name="consOcurrence" id="consOcurrence" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Aborto">Aborto</option>
                                            <option value="Gravidez">Gravidez</option>
                                            <option value="DST">DST</option>
                                            <option value="Tentativa de Suicídio">Tentativa de Suicídio</option>
                                            <option value="Transtorno Mental">Transtorno Mental</option>
                                            <option value="Transtorno Comportamental">Transtorno Comportamental</option>
                                            <option value="Estresse Pós-traumático">Estresse Pós-traumático</option>
                                            <option value="Outros">Outros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row" id="violenceType" hidden>
                                    <div class="form-group col-md-4" >
                                        <label for="violenceType">Tipo de Violência Sexual :</label>
                                        <select name="violenceType" id="violenceType" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Assédio Sexual">Assédio Sexual</option>
                                            <option value="Atentado Violento ao Pudor">Atentado Violento ao Pudor</option>
                                            <option value="Estupro">Estupro</option>
                                            <option value="Exploração Sexual">Exploração Sexual</option>
                                            <option value="Outros">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="penetracao">Ocorreu penetração? </label>
                                        <select name="penetration" id="penetracao" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4" id="penetracaoType" hidden>
                                        <label for="penetrationType">Tipo de Penetração : </label>
                                        <select name="penetrationType" id="penetrationType" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Anal">Anal</option>
                                            <option value="Oral">Oral</option>
                                            <option value="Vaginal">Vaginal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step4" class="step">
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label for="nature">Natureza da Lesão :</label>
                                        <select name="nature" id="nature" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Contusão">Contusão</option>
                                            <option value="Corte/Perfuração/Laceração">Corte/Perfuração/Laceração</option>
                                            <option value="Entorse/Luxação">Entorse/Luxação</option>
                                            <option value="Fratura">Fratura</option>
                                            <option value="Amputação">Amputação</option>
                                            <option value="Traumatismo Dentário">Traumatismo Dentário</option>
                                            <option value="Traumatismo Crâniano-Encefálico">Traumatismo Crâniano-Encefálico</option>
                                            <option value="Politraumatismo">Politraumatismo</option>
                                            <option value="Intoxicação">Intoxicação</option>
                                            <option value="Queimadura">Queimadura</option>
                                            <option value="Outros">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="bodyPart">Parte do Corpo Atingida :</label>
                                        <select name="bodyPart" id="bodyPart" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Cabeça/Rosto">Cabeça/Rosto</option>
                                            <option value="Pescoço">Pescoço</option>
                                            <option value="Boca/Dentes">Boca/Dentes</option>
                                            <option value="Coluna/Medula">Coluna/Medula</option>
                                            <option value="Tórax/Dorso">Tórax/Dorso</option>
                                            <option value="Abdômen">Abdômen</option>
                                            <option value="Quadril/Pelve">Quadril/Pelve</option>
                                            <option value="Membros Superiores">Membros Superiores</option>
                                            <option value="Membros Inferiores">Membros Inferiores</option>
                                            <option value="Órgãos genitais/Ânus">Órgãos genitais/Ânus</option>
                                            <option value="Múltiplos Órgãos/Regiões">Múltiplos Órgãos/Regiões</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="step5" class="step">
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label for="agressorNumber">Número de envolvidos :</label>
                                        <input type="number" name="agressorNumber" id="agressorNumber" class="form-control" value='0'>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Vínculo Social : </label>
                                        <select name="agressorGender" id="" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Pai">Pai</option>
                                            <option value="Mãe">Mãe</option>
                                            <option value="Padrasto">Padrasto</option>
                                            <option value="Madrasta">Madrasta</option>
                                            <option value="Cônjuge">Cônjuge</option>
                                            <option value="Ex-Cônjuge">Ex-Cônjuge</option>
                                            <option value="Namorado(A)">Namorado(A)</option>
                                            <option value="Ex-Namorado(A)">Ex-Namorado(A)</option>
                                            <option value="Filho(A)">Filho(A)</option>
                                            <option value="Irmão(A)">Irmão(A)</option>
                                            <option value="Amigos/Conhecidos">Amigos/Conhecidos</option>
                                            <option value="Desconhecidos">Desconhecidos</option>
                                            <option value="Cuidador(A)">Cuidador(A)</option>
                                            <option value="Patrão/Chefe">Patrão/Chefe</option>
                                            <option value="Pessoa Com Relação Institucional">Pessoa Com Relação Institucional</option>
                                            <option value="Policial/Agente">Policial/Agente</option>
                                            <option value="Própria Pessoa">Própria Pessoa</option>
                                            <option value="Outros">Outros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label for="parent">Sexo do Provável Agressor :</label>
                                        <select name="parent" id="parent" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Feminino">Feminino</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Ambos os Sexos">Ambos os Sexos</option>
                                            <option value="Outros">Outros</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="alcool">Provável uso de Álcool : </label>
                                        <select name="alcool" id="alcool" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success mt-2" id='submit'type="submit" hidden>
                                Denunciar <i class="fa fa-correct"></i>
                            </button>
                            {{ csrf_field() }}
                            @method('put')
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
            $('#modaldenuncia').modal('show'); 
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
                if($(this).val() == "M"){
                    $('#fieldset').attr("disabled", "disabled");
                }else if($(this).val() == "F"){
                    $('#fieldset').removeAttr('disabled');
                }else{
                    $('#fieldset').attr("disabled", "disabled");
                }
            });
            $('#violencia').change(function(){
                if($(this).val() == 'Sexual'){
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
