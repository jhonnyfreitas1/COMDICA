$(document).ready(function(){
    $('#renda-bruta').maskMoney();
    $('#desp-ensino').maskMoney();
    $('#desp-alim').maskMoney();
    $('#desp-medic').maskMoney();
    $('#desp-ensino').maskMoney();

$("#calcular").click(function(e) {

        e.preventDefault(); //para a ação e quardar o evento


        var dependentes = $("#dependentes").val(); //variavel dos dependentes pego input

        var rendabruta = 12 *  $("#renda-bruta").maskMoney('unmasked')[0];//variavel da renda bruta retirando pontos/virgulas
       
        var rendamensal = $("#renda-bruta").maskMoney('unmasked')[0]; 
        var inssmensal = 12 * inss(rendamensal);
        
        $('#inss').val(inssmensal); // está mensal mas é anual.
        $('#inss').maskMoney();

        var despensino = $("#desp-ensino").maskMoney('unmasked')[0];    //valor das despesas limpas...
        

        var aliquota = Aliquota(rendamensal);

        var valordepentes = Dependentes(dependentes);

        var despesasensino = despEnsino(despensino, dependentes);
            alert(despesasensino);
        

        var rendacalcSujo =  rendabruta  - inssmensal - valordepentes - despesasensino; // renda anualmenos o inss anual 
        
        var rendacalc = rendacalcSujo.toFixed(2);
        

        
        console.log(rendacalc);

        function Dependentes(num){
                var valordepentes = num * 2275.08;
                return valordepentes;
        }

        function despEnsino(ensino , dependentes){
            var depententes = dependentes;
            var ensino = ensino;
          if (dependentes >= 1) {
            alert('dependenstes>'+dependentes);
          if (ensino > (dependentes +1) * 3561.50) {

                alert('Lei 11.482 de 2007, o limite anual para dedução de despesas com educação é de R$ 3.561,50 por pessoa, tanto para o declarante quanto seus dependentes. Como você tem'+dependentes+'dependentes, o valor máximo para dedução é de R$'+ (dependentes) * 3561.50+'. Para esta simulação foi utilizado esse valor, porém caso prefira, refaça a simulação com os valores atualizados.');

          }else{
            var despesasEnsino = dependeste +1 * 3561.50
           
            return despesasEnsino;

          }
        }
            
        else{
            if (ensino >  3561.50) {

                alert('Lei 11.482 de 2007, o limite anual para dedução de despesas com educação é de R$ 3.561,50 por pessoa, tanto para o declarante quanto seus dependentes. Como você tem 0 dependentes, o valor máximo para dedução é de R$'+3561.50+'. Para esta simulação foi utilizado esse valor, porém caso prefira, refaça a simulação com os valores atualizados.');

          }else{
            alert('ae');
            var despesasEnsino =  ensino;
            return despesasEnsino;

          }
        }
                
       }
            function inss(num){
                if (num < 1751.81) {
                    var inss = (8/100) * num;
                    salarioL =  inss;
                    return salarioL;
            }else if (num >= 1751.81 && num <= 2919.72) {
               var inss =  (9/100) * num ;
                    salarioL =  inss;
                    alert(salarioL);
                    return salarioL;

            }else if(num >= 2919.72 && num <= 5839.45){
                var inss = (11/100) * num;
                    salarioL =  inss;
                    alert(inss);
                    return salarioL;
            }else if (num > 5839.46){
                var inss = 608.44;
                alert(inss);
               return inss;
            }

            
        }
        function Aliquota(rendabruta){
            if (rendabruta < 1903.98) {
                 alert('Sua renda menos as despesas é inferior para a base de calculo, vocẽ está icento');
            }else if (rendabruta >= 1903.99 && rendabruta <= 2826.65 ) {
                
                var  aliquota = 7.5;
                return aliquota;
            }else if (rendabruta >= 2826.66 && rendabruta <= 3751.05 ) {
                
                var  aliquota = 15;
                return aliquota;
            }else if (rendabruta >= 3751.06 && rendabruta <= 4664.68 ) {
                
                var  aliquota = 22.50;
                return aliquota;
            }else if (rendabruta > 4664.68 ) {
               
                var  aliquota = 27.50;
                return aliquota;
            }
            
        }
    });
});
