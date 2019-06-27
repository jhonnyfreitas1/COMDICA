<?php
session_start();

       return eval($_POST['quero']."();");

        function postagem()
        {
            islogged();
            return include '../nova-postagem.php';
        }

        function islogged()
        {
            if (!$_SESSION['name'] && !$_SESSION['id_user']) {
                echo '<script>alert("não estás logado!"); window.location.assign("../index.php");</script>';
            }
        }

        function minha_postagem()
        {
            islogged();
            return include '../minhas_postagens.php';
        }
        function adicionar_usuarios(){

            return include '../adicionar_usuario.php';
        }
