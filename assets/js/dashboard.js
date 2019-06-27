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
        type:'post',
        url:'/controller/Retornos.php',
        datatype:'json',
        data:{quero:'postagem'},     //metodo ajax que busca arquivo de formulario do post e coloca em uma div '#area-principal'
        success: function(response){
            $('#area-principal').html(response).fadeIn(1500);
        }
    })

});

$("#minhas_postagens").click(function(e) {
    e.preventDefault();
    $('#area-principal').html("<center><progress style='width:80%; margin-top:8em;'></progress> </center>");
    $.ajax({
        type: 'post',
        url: '/controller/Retornos.php',
        datatype: 'json',
        data: {quero: 'minha_postagem'},     //metodo ajax que busca arquivo de formulario do post e coloca em uma div '#area-principal'
        success: function (response) {
            $('#area-principal').html(response);
        }
    })
});

$("#adc_user").click(function(e) {
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
});
