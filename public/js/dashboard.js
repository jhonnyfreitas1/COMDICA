$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    if($("#wrapper").hasClass( "toggled" )){ //esse if e else altera o nome do botão de abrir e fechar menu
        $("#menu-toggle").html('Abrir menu');
    }else{
        $("#menu-toggle").html('Fechar Menu');
    }
});
$("#postagem").click(function(e) {
    e.preventDefault();
     $('#area-principal').html("<center><progress style='width:80%; margin-top:8em;'></progress> </center>");
    $.ajax({
        type:'get',
        url:'/admin/nova-postagem',
        datatype:'json',    //metodo ajax que busca arquivo de formulario do post e coloca em uma div '#area-principal'
        success: function(response){
            $('#area-principal').html(response).fadeIn(1500);
        }
    })

});

$("#recarregar").click(function(e) {
    e.preventDefault();
    $('#carregamento').modal("show");
    $.ajax({
        type: 'get',
        url: '/boleto/detalhes',
        datatype: 'json',
        success: function (response) {
            $('#alo').html(response);
                   setTimeout(function(){ 
                window.location.href="/admin/doacoes";
             }, 3000);
        }
    })
});

/*$("#adc_user").click(function(e) {
    e.preventDefault();
    $('#area-principal').html("<center><progress style='width:80%; margin-top:8em;'></progress> </center>");
    $.ajax({
        type: 'post',
        url: '/controller/Retornos.php',
        datatype: 'json',
        data: {quero: 'adicionar_usuarios'},     //metodo ajax que busca arquivo de formulario do post e coloca em uma div '#area-principal'
        success: function (response) {
            $('#area-principal').html(response);
        }
    })
});*/
/*$("#doacao_imposto").click(function(e) {
    e.preventDefault();
    $('#area-principal').html("<center><progress style='width:80%; margin-top:8em;'></progress> </center>");
    $.ajax({
        type: 'post',
        url: '/controller/Retornos.php',
        datatype: 'json',
        data: {quero: 'doacoes_imposto'},     //metodo ajax que busca arquivo de formulario do post e coloca em uma div '#area-principal'
        success: function (response) {
            $('#area-principal').html(response);
        }
    })
});*/

