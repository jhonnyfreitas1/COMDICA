$(document).ready(function(){
    $('#renda-bruta').maskMoney();
    $('#desp-ensino').maskMoney();
    $('#desp-alim').maskMoney();
    $('#desp-medic').maskMoney();
    $('#desp-ensino').maskMoney();

$("#calcular").click(function(e) {

        e.preventDefault(); 


        var dependentes = $("#dependentes").val(); //variavel dos dependentes pego input

        var rendabruta = 12 *  $("#renda-bruta").maskMoney('unmasked')[0];//variavel da renda bruta retirando pontos/virgulas
       
        var rendamensal = $("#renda-bruta").maskMoney('unmasked')[0]; 
        
        var inssmensal = 12 * inss(rendamensal);
        
        $('#inss').val(inssmensal); // está mensal mas é anual.
        $('#inss').maskMoney();

        var despmedic =$('#desp-medic').maskMoney('unmasked')[0];

        var despensino = $("#desp-ensino").maskMoney('unmasked')[0];    //valor das despesas limpas...
        
        var pensao = despPensao($('#desp-alim').maskMoney('unmasked')[0], rendabruta);

        

        var valordepentes = Dependentes(dependentes);

        var despesasensino = despEnsino(despensino, dependentes);
           
        var rendacalcSujo =  rendabruta  - (inssmensal + valordepentes + despesasensino + pensao + despmedic); // renda anualmenos o inss anual 
        
         var debitos = (inssmensal + valordepentes + despesasensino + pensao + despmedic); 
            alert('deb'+debitos);
        var rendacalc = rendacalcSujo.toFixed(2);
        
        var aliquota = Aliquota(rendacalc);

        alert('rendaCALCULO'+rendacalc);
        var imposto = rendacalc * (aliquota/100);
        console.log('imposto>'+imposto);
        
        console.log('renda base'+rendacalc);
        console.log('ensino >'+despesasensino);
        console.log('pensao>'+pensao);
        

        function Dependentes(num){
                var valordepentes = num * 2275.08;
                return valordepentes;
        }


       function  despPensao(pensao , rendabruta){
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
        function despEnsino(ensino , dependentes){
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
            function inss(num){
                if (num < 1751.81) {
                    var inss = (8/100) * num;
                    salarioL =  inss;
                    return salarioL;
            }else if (num >= 1751.81 && num <= 2919.72) {
               var inss =  (9/100) * num ;
                    salarioL =  inss;
                    return salarioL;

            }else if(num >= 2919.72 && num <= 5839.45){
                var inss = (11/100) * num;
                alert(inss);
                    salarioL =  inss;
                    return salarioL;
            }else if (num > 5839.46){
                var inss = 608.44;
               return inss;
            }

            
        }
        function Aliquota(rendabruta){
           var  rendabruta = rendabruta / 12;

           alert('REnda para ver a liquota = '+rendabruta);
            if (rendabruta < 1903.98) {
                 alert('Sua renda menos as despesas é inferior para a base de calculo, vocẽ está icento');
            }else if (rendabruta >= 1903.99 && rendabruta <= 2826.65 ) {
                
                var  aliquota = 7.5;
                return aliquota;
            }else if (rendabruta >= 2826.66 && rendabruta <= 3751.05 ) {
                
                var  aliquota = 15;
                return aliquota;
                alert('renda é '+rendabruta+'e a aliquota é de '+aliquota+'%');
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
