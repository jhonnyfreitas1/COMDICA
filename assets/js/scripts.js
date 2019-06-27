$(document).ready(function(){

     //Aplicando as mascaras nos inputs cpf, valor e vencimento.
      $('#resultados').hide();

     $('#cpf').mask('000.000.000-00');
     $('#valor').mask('000.000.000.000.000,00');
     $('#vencimento').mask('00/00/0000');
     $('#telefone').mask('(00)0000-0000');
     
     $("#form-boleto").submit(function (e){
        e.preventDefault();
         $("#myModal").modal('show');
         $("#boleto").addClass("hide");
         var descricao = $("#descricao").val();
         $('#valor').unmask();
         $('#telefone').unmask();
        $('#cpf').unmask();
         var valor = $("#valor").val();
         var quantidade = $("#quantidade").val();
         var nome_cliente =  escapeHtml($("#nome_cliente").val());
         var cpf =  escapeHtml($("#cpf").val());
         var telefone =  escapeHtml($("#telefone").val());
         var vencimento = $("#vencimento").val();
          var email = $('#email').val();
       
        function escapeHtml(text) {
         return text
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
        }
       
          function formatReal( int ){
              var tmp = int+'';
              tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
              if( tmp.length > 6 )
              tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
              return tmp;
          }
         	$.ajax({
      		  url: "controller/emitir_boleto.php",
      		  data:{descricao:descricao,email:email,valor:valor,quantidade:quantidade,nome_cliente:nome_cliente,cpf:cpf,telefone:telefone,vencimento:vencimento},
      		  type:'post',
      		  dataType:'json',
      		  success: function(resposta){
                     $("#myModal").modal('hide');
                     console.log(resposta);
		                     $('#cpf').mask('000.000.000-00');
                         $('#valor').mask('000.000.000.000.000,00');
                         $('#vencimento').mask('00/00/0000');
                         $('#telefone').mask('(00)0000-0000');
                         
                if(resposta.code == 200){
                       //"code":200,"data":{"barcode":"03399.32766 55400.000000 60348.101027 6 69020000009000","link":"https:\/\/visualizacaosandbox.gerencianet.com.br\/emissao\/59808_79_FORAA2\/A4XB-59808-60348-HIMA4","expire_at":"2016-08-30","charge_id":76777,"status":"waiting","total":9000,"payment":"banking_billet"-->
                       var target_offset = $("#ancora1").offset();
                        var target_top = target_offset.top;
                        $('html, body').animate({ scrollTop: target_top }, 2000);
                        $("#resultados").show("slow",'linear');


                        $("#transacao").html("<b>"+resposta.data.charge_id+"</b>");
                        $("#codbarra").html("<b>"+resposta.data.barcode+"</b>");
                        $("#boleto1").html("<a style='color:blue;' id='link-boleto' target='_blank' href='"+resposta.data.link+"'>Abrir Boleto</a>");
                        $("#vencimento1").html("<b>"+resposta.data.expire_at)+"</b>";
                      if (resposta.data.status == 'waiting') {
                          $("#status").html("<b>Aguardando Pagamento</b>");
                       }else{
                           $("#status").html("<b>"+resposta.data.status+"</b>");
                         }
                           $("#total").html("<b>R$"+formatReal(resposta.data.total)+"</b>");
                        if (resposta.data.payment == 'banking_billet' ) {
                            $("#metpagamento").html("<b>Boleto bancário</b>");
                         }else{
                            $("#metpagamento").html("<b>"+resposta.data.payment+"</b>");
                          }
                             window.open(resposta.data.link, "_blank");                                        
			           }                                              
		      },
                  error:function (resposta){
                      $("#myModal").modal('hide');
                      alert("Ocorreu um erro - Mensagem: "+resposta.responseText);
                          console.log(resposta);
                
                  }
                
		    });
     })
   
     
})