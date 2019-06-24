<?php

require __DIR__ . '/../vendor/autoload.php';
include 'bd-conection.php';
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

if (isset($_POST['valor']) && isset($_POST['nome_cliente']) && isset($_POST['cpf']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['vencimento']) && isset($_POST['repeticoes'])) {


$clientId = 'Client_Id_9531fd3340c988f93653a016d1a3bdc0407884e3';
$clientSecret ='Client_Secret_74cc4e9058692da04749719f6fa9d9b135029f76'; 

    $options = [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'sandbox' => true
    ];

	$instructions = ['Seus dados foram guardados no sistema para que você possa vir .','Você receberá um email no final do pagamentos de todas as parcelas com todos os dados ', 'asdasd', 'asdasdsadsads'];

    $valor_parcelado = $_POST['valor'] / $_POST['repeticoes'];
    $item_1 = [
        'name' => $_POST["descricao"],
        'amount' => (int) $_POST["quantidade"],
        'value' => (int) $valor_parcelado

    ];


    $items = [
        $item_1
    ];

	$customer = [
            'name' => $_POST["nome_cliente"],
            'cpf' => $_POST["cpf"],
            'phone_number' => $_POST["telefone"],
            'email' => $_POST["email"],
        ];

      $date =  date('Y-m-d', strtotime('+1 month'));
    $body = [
	'items' => $items,
	'repeats'=>(int)$_POST["repeticoes"],
	'split_items'=>false,
	'expire_at' => $date,
	'customer' => $customer,
	'instructions' =>$instructions
	];
    $um = 1;
    $zero = 0;
    $vencimento = $_POST['vencimento'];
    try {
        $api = new Gerencianet($options);
        $charge = $api->createCarnet([], $body);
         $insert = $conn -> prepare('INSERT INTO doacoes_imposto (doador_nome,doador_cpf,doador_telefone,doador_email,num_transacao,link_boleto,valor_total, quantidade,parcelas,metodo_pagamento,vencimento,cod_barra,status,valid,parcelas_pagas valor_parcelado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
		 if ($charge['code'] == 200) {
            
                $insert -> bindParam(1,$_POST['nome_cliente']);
                $insert -> bindParam(2,$_POST['cpf']);
                $insert -> bindParam(3,$_POST['telefone']);
                $insert -> bindParam(4,$_POST['email']);
                $insert -> bindParam(5,$charge['data']['charge_id']);
                $insert -> bindParam(6,$charge['data']['link']);
                $insert -> bindParam(7,$_POST['valor']);
                $insert -> bindParam(8,$um);
                $insert -> bindParam(9,$um); 
                $insert -> bindParam(10,$boleto);
                $insert -> bindParam(11,$vencimento);
                $insert -> bindParam(12,$charge['data']['barcode']);
                $insert -> bindParam(13,$charge['data']['status']); 
                $insert -> bindParam(14,$um);
                $insert -> bindParam(15,$zero);
                $insert -> bindParam(16,$valor_parcelado);
                $resultado = $insert -> execute();
                echo json_encode($charge);
            }
	} catch (GerencianetException $e) {
        print_r($e->code);
        print_r($e->error);
        print_r($e->errorDescription);
    } catch (Exception $e) {
        print_r($e->getMessage());
    }
}else{
    echo 'falta parametros';
}
