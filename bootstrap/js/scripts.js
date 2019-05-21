$(document).ready(function(){
     //Aplicando as mascaras nos inputs cpf, valor e vencimento.
     $('#cpf').mask('000.000.000-00', {reverse: true});
     $('#valor').mask('000.000.000.000.000,00', {reverse: true});
   
     $('#vencimento').mask('00/00/0000');
     
     $("#form-boleto").submit(function (e){
        e.preventDefault();
         $("#myModal").modal('show');
         $("#boleto").addClass("hide");
         var descricao = $("#descricao").val();
         $('#valor').unmask();
         var valor = $("#valor").val();
         var quantidade = $("#quantidade").val();
         var nome_cliente = $("#nome_cliente").val();
          $('#cpf').unmask();
         var cpf = $("#cpf").val();
         var telefone = $("#telefone").val();
         var vencimento = $("#vencimento").val();
         
       
         	$.ajax({
      		  url: "../controller/emitir_boleto.php",
      		  data:{descricao:descricao,valor:valor,quantidade:quantidade,nome_cliente:nome_cliente,cpf:cpf,telefone:telefone,vencimento:vencimento},
      		  type:'post',
      		  dataType:'json',
      		  success: function(resposta){
                     $("#myModal").modal('hide');
                     console.log(resposta)
		            if(resposta.code == 200){
                             
                             //"code":200,"data":{"barcode":"03399.32766 55400.000000 60348.101027 6 69020000009000","link":"https:\/\/visualizacaosandbox.gerencianet.com.br\/emissao\/59808_79_FORAA2\/A4XB-59808-60348-HIMA4","expire_at":"2016-08-30","charge_id":76777,"status":"waiting","total":9000,"payment":"banking_billet"-->
                                  $("#transacao").html("<b>"+resposta.data.charge_id+"</b>");
                                   $("#codbarra").html("<b>"+resposta.data.barcode+"</b>");
                                   $("#boleto1").html("<a style='color:blue;' href='"+resposta.data.link+"'>Abrir Boleto</a>");
                                   $("#vencimento1").html("<b>"+resposta.data.expire_at)+"</b>";
                                   if (resposta.data.status == 'waiting') {
                                    $("#status").html("<b>Aguardando</b>");
                                   }else{
                                   $("#status").html("<b>"+resposta.data.status+"</b>");
                                    }
                                   $("#total").html("<b>"+resposta.data.total+"</b>");
                                   if (resposta.data.payment == 'banking_billet' ) {
                                    $("#metpagamento").html("<b>Boleto bancário</b>");
                                   }else{
                                   $("#metpagamento").html("<b>"+resposta.data.payment+"</b>");
                                    }

			}else{
                            $("#myModal").modal('hide');
                            alert("Code: "+ resposta.code)
			}
		  },
                  error:function (resposta){
                      $("#myModal").modal('hide');
                      alert("Ocorreu um erro - Mensagem: "+resposta.responseText)
                  }
		});
     })
     
     
})