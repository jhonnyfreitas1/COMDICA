$(document).ready(function($){
                    
                    function mudar_ok_carne(){
                        document.getElementById('cpf_carne').style.borderColor = "green";
                            $("#cpf_carne_msg").html('<span class="text-success" >CPF VÁLIDO</span>');
                            $('#mudar2').removeAttr("disabled");
                            ///utilizando doom pos é oque eu mas conheço posso retirar depois
                            //aqui nos estamos mudando o a cor e do botão e descrição para true porque o cpf é valido
                    }
                    function mudar_falha_carne(){
                        document.getElementById('cpf_carne').style.borderColor = "red";
                         $("#cpf_carne_msg").html('<span class="text-danger">CPF INVÁLIDO</span>');
                        //$('#mudar').hide();
                        $( "#mudar2" ).prop( "disabled", true);
                            //aqui nos fazemos basicamente o contrario 
                    }
                    $("#cpf_carne").keypress(function(e) { //faz a limpeza do cpf e chama a função responsavel por alertar os erros no cpf
                                var vendaMediaMensal = $("#cpf_carne");
                                vendaMediaMensal.focusout( function(){
                                var cpf = vendaMediaMensal.val();
                                var cpf_limp = cpf.replace(/\.|\-/g,'');
                                TestaCPF(cpf_limp);
                                });
                    });
                    function TestaCPF(strCPF){
                        var Soma;
                        var Resto;
                        Soma = 0;       //testa se o cpf é valido no frontend
                    if (strCPF == "00000000000" || strCPF == "11111111111"|| strCPF == "22222222222" || strCPF == "3333333333" || strCPF == "44444444444" || strCPF == "55555555555" || strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" || strCPF == "9999999999") return mudar_falha_carne();
                        
                    for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
                    Resto = (Soma * 10) % 11;
                    
                        if ((Resto == 10) || (Resto == 11))  Resto = 0;
                        if (Resto != parseInt(strCPF.substring(9, 10)) ) return mudar_falha_carne();
                    
                    Soma = 0;
                        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
                        Resto = (Soma * 10) % 11;
                    
                        if ((Resto == 10) || (Resto == 11))  Resto = 0;
                        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return mudar_falha_carne();
                        return mudar_ok_carne();
                    }  

           });