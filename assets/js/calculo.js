$(document).ready(function(){
    $('#renda-bruta').maskMoney();
    $('#desp-ensino').maskMoney();
    $('#desp-alim').maskMoney();          //adiciona mascaramento a todos os inputs na lista;
    $('#desp-medic').maskMoney();
    $('#desp-ensino').maskMoney();
    $('#13').maskMoney();
    $("#resultados").hide();
    $("#gerarpdf").hide();
    $('#inss').maskMoney();
    $('#nafonte').maskMoney();
    $('#renda-bruta').tooltip();
    $('#desp-ensino').tooltip();        
    $('#desp-medic').tooltip();        
    $('#renda-bruta').keypress(function(){

        var rendabrutaanual =  $("#renda-bruta").maskMoney('unmasked')[0];
        var rendamensalbruta  =  rendabrutaanual;
        var inssmensal = Math.round(inss(rendamensalbruta));

        $('#inss').val(inssmensal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

          function inss(num){ //verifica o inss referente ao salario do usuario.

                if (num < 100) {
                    salarioL = false;
                }
                else if (num < 21021.72) {
                    var inss = (8/100) * num;

                    return inss;
                }else if (num >= 21021.72 && num <= 35036.64) {
                    var inss =  (9/100) * num ;

                    return inss;
                }else if(num >= 35036.64 && num <= 70073.51){
                    var inss = (11/100) * num;
                    
                    return inss;
                }else if (num > 70073.52){
                    var inss = 7301.28;
                    return inss;
                }
            }   
    });

        $("#calcular").click(function(e) {

            e.preventDefault(); 
            var irrf = $("#nafonte").maskMoney('unmasked')[0];

            var dependentes = $("#dependentes").val(); //variavel dos dependentes pego input

            var rendabruta =   $("#renda-bruta").maskMoney('unmasked')[0];//variavel da renda bruta retirando pontos/virgulas anual

            var rendamensal = $("#renda-bruta").maskMoney('unmasked')[0]; // variavel renda mensal
            
            var inssmensal = $("#inss").maskMoney('unmasked')[0];   

            var despmedic =$('#desp-medic').maskMoney('unmasked')[0];

            var despensino = $("#desp-ensino").maskMoney('unmasked')[0];    //valor das despesas limpas...
            
            var pensao = despPensao($('#desp-alim').maskMoney('unmasked')[0], rendabruta);

            var salario13 = $("#13").maskMoney('unmasked')[0];

            rendabruta += salario13;

            var valordepentes = Dependentes(dependentes);

            var despesasensino = despEnsino(despensino, dependentes);

            var rendacalcSujo =  rendabruta  - (inssmensal + valordepentes + despesasensino + pensao + despmedic); // renda anualmenos o inss anual 
            
            var debitos = (inssmensal + valordepentes + despesasensino + pensao + despmedic); 


            var aliquota = Aliquota(rendacalcSujo);

            var imposto = rendacalcSujo * (aliquota/100);
            
            if (aliquota =='Isento') {
               $("#isento").html('<h5>Você está Isento do imposto de renda, pós seu salario é inferior a 1903.98 após as deduções.</h5>');
               setTimeout(function(){ 
                   $("#isento").empty();
               }, 3000);    
               var aliquota = false;
            }else{
               var deducao =  parDeduzir(aliquota);
                mostrar(inssmensal, rendabruta, debitos, rendacalcSujo, aliquota, imposto, deducao,irrf); // chama a função mostrar 
            }
             if (Number.isNaN(imposto)) { //verifica se o imposto de renda é igual a NAN para dizer que deu errado.
                 var  imposto = 'Sem IR.</br>Há erros na digitação dos valores na calculadora ?';
             }       
             console.log('imposto>'+imposto);
             console.log('renda base'+rendacalcSujo);
             console.log('ensino >'+despesasensino);     //só pra teste;
             console.log('pensao>'+pensao);

            function Dependentes(num){
                var valordepentes = num * 2275.08;
                return valordepentes;
            }
            function mostrar(inssanual, rendaanual, debitos, rendabase, aliquota ,imposto, deducao, irrf){ 
                //essa função mostra todos valores e informações referentes ao pós calculo
                var impostopg = imposto - deducao;
                $('#seuinss').html(inssanual.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                $('#suarendaanual').html(rendaanual.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                $('#seusdebitos').html(debitos.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                $('#basedecalculo').html(rendabase.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                $('#eliquota').html(aliquota+'%');
                $('#impostoir').html(imposto.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                $('#deducao').html(deducao.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                var irrfvspg = impostopg - irrf;
                 var porcentagem = impostopg * (6/100);     //tira os 6% da para doação 

                 porcentagem = Math.round(porcentagem);
                 var rendabase2 = rendabase - porcentagem;
                 var aliquota2 = rendabase2 * (aliquota/100);

                 var imposto =  aliquota2.toFixed(2); 

                 if (irrf <= impostopg){
                    $('#impostopagar').html((impostopg - irrf).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                    $('#impostorest').html(0);        
                    $('#valor7').html("<b><a id='pulse' href='doacao_boleto.php?valor="+porcentagem.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+"&ir="+impostopg.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+"' class='btn btn-info'>Avista "+porcentagem.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+"</a> Ou <a id='pulse' class='btn btn-info m-2'>Em 6 vezes de "+(porcentagem / 6).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+ "</a></s></b> <a href='../../pq_doar.php' class='btn btn-outline-dark col-md-2 '>Por que doar ?</a>");

                }else{
                    $('#impostopagar').html(0);
                    $('#impostorest').html("<b>"+(irrf - impostopg).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})+"</b>");
                    $('#valor7').html('<p>Você não tem imposto a pagar e sim a restituir.</p>');
                }

                $("#irrf").html(irrf.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));

                var target_offset = $("#ancora1").offset();
                var target_top = target_offset.top;
                $('html, body').animate({ scrollTop: target_top }, 3000);
                $("#gerarpdf").show("slow",'linear');
               $("#resultados").show("slow",'linear');  //faz aparecer a div de mostrar valores com uma animação
           }


           function  despPensao(pensao , rendabruta){    //vê se a pensão é maior que 35% do salario comforme a lei. se nao deixa passar
                if (pensao > 1) {
                    var pensao = pensao;
                    var renda = rendabruta;
                    var limite = (35/100) * renda;
                    if (pensao >  limite) {
                        alert('pensao maior que o limite de 35%');
                        var pensao = limite;
                        return pensao;
                    }else {
                        return pensao;
                    }

                }else{
                    return 0;
                }
            }
            function despEnsino(ensino , dependentes){  //verifica se o valor de limite para despesas com ensino ultrapassa, se nao, deixa passar
                var depententes = dependentes;
                var ensino = ensino;
                var limite = 3561.50;
                if (dependentes >= 1) {
                      if (ensino > (parseInt(1) + parseInt(dependentes)) * parseInt(limite)){
                        alert('Lei 11.482 de 2007, o limite anual para dedução de despesas com educação é de R$ 3.561,50 por pessoa, tanto para o declarante quanto seus dependentes. Como você tem'+dependentes+'dependentes, o valor máximo para dedução é de R$'+(parseInt(1)+parseInt(dependentes)) * parseInt(limite)+'. Para esta simulação foi utilizado esse valor, porém caso prefira, refaça a simulação com os valores atualizados.');
                        var despesasEnsino = 'Limite atingido';
                        return despesasEnsino;    
                    }else{
                        var despesasEnsino = ensino;
                        return despesasEnsino;
                    }
                }   
                else{
                    if (ensino > limite) {
                        alert('Lei 11.482 de 2007, o limite anual para dedução de despesas com educação é de R$ 3.561,50 por pessoa, tanto para o declarante quanto seus dependentes. Como você tem 0 dependentes, o valor máximo para dedução é de R$'+3561.50+'. Para esta simulação foi utilizado esse valor, porém caso prefira, refaça a simulação com os valores atualizados.');
                        var despesasEnsino = 'Limite atingido';
                    }else{
                        var despesasEnsino =  ensino;
                        return despesasEnsino;
                    }
                }
            }
            function parDeduzir(aliquota){
                if (aliquota == 7.5) {
                    var deducao =   142.80 * 12;
                    return  deducao;
                }else if (aliquota == 15) {
                    var deducao = 354.80 *  12;
                    return deducao;
                }else if (aliquota == 22.50) {
                    var deducao = 636.13 * 12;
                    return deducao;                 
                }else if (aliquota == 27.50) {
                    var deducao = 869.36 * 12;
                    return deducao;
                }else {
                    alert('erro com aliquota, verificar valores ou contate-nos');
                }

            }
            function Aliquota(rendabruta){  //vê a porcentagem do eliquota do usuario com base no seu salario mensal.
                var  rendabruta = rendabruta;
                if (rendabruta < 22847.76 ) {
                    alert('Sua renda menos as despesas é inferior para a base de calculo, vocẽ está icento');
                    var aliquota = 'Isento';
                    return aliquota;
                }else if (rendabruta >= 22847.77 && rendabruta <= 33919.80 ) {
                    var  aliquota = 7.5;
                    return aliquota;
                }else if (rendabruta >= 33919.81 && rendabruta <= 45012.60 ) {

                    var  aliquota = 15;
                    return aliquota;
                    alert('renda é '+rendabruta+'e a aliquota é de '+aliquota+'%');
                }else if (rendabruta >= 45012.61 && rendabruta <= 55976.16) {

                    var  aliquota = 22.50;
                    return aliquota;
                }else if (rendabruta > 55976.16) {

                    var  aliquota = 27.50;
                    return aliquota;
                }


            }

        });
});
