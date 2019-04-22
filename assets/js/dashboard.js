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
    $.ajax({
        type:'post',
        url:'/controller/Retornos.php',
        datatype:'json',
        data:{quero:'postagem'},     //metodo ajax que busca arquivo de formulario do post e coloca em uma div '#area-principal'
        success: function(response){
            $('#area-principal').html(response);
        }
    })

});

$("#minhas_postagens").click(function(e) {
    e.preventDefault();
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
