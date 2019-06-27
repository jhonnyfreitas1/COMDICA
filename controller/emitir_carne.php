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
        'amount' => (int) 1,
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
    if ($_POST['repeticoes'] > 1 && $_POST['repeticoes'] <= 6 ) {
        $boleto = 'carne';
    }else if ($_POST['repeticoes'] == 1){
        $boleto = 'boleto';
    }else{
        header('location:calculo.php?Error');
    }
    try {
        $api = new Gerencianet($options);
        $charge = $api->createCarnet([], $body);
        if ($charge['code'] == 200) {
            //inserindo em tabela de doacoes de carne 
                $insert_carne = $conn -> prepare('INSERT INTO doacoes_carne (carnet_id,doador_nome,valor_total,valor_parcelado,
                link,numero_parcelas,status) VALUES (?,?,?,?,?,?,?)');
                $insert_carne -> bindValue(1,$charge['data']['carnet_id']);
                $insert_carne -> bindValue(2,$_POST['nome_cliente']);
                $insert_carne -> bindValue(3,$_POST['valor']);
                $insert_carne -> bindValue(4,$valor_parcelado);
                $insert_carne -> bindValue(5,$charge['data']['link']);
                $insert_carne -> bindValue(6,$_POST['repeticoes']);
                $insert_carne -> bindValue(7,$charge['data']['status']);
                $resultado_carne = $insert_carne -> execute();
                //inserindo   em tabela de doacoes imposto e passando uma chave estrangeira do carne. 
              

           for($i= 0; $i < sizeof($charge['data']['charges']); $i++){
                $insert = $conn -> prepare('INSERT INTO doacoes_imposto (doador_nome,doador_cpf,doador_telefone,doador_email,num_transacao,link_boleto,valor_total, quantidade,parcelas,metodo_pagamento,vencimento,cod_barra,status,parcelas_pagas,valor_parcelado,fk_carnet_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                $insert -> bindValue(1,$_POST['nome_cliente']);
                $insert -> bindValue(2,$_POST['cpf']);
                $insert -> bindValue(3,$_POST['telefone']);
                $insert -> bindValue(4,$_POST['email']);
                $insert -> bindValue(5,$charge['data']['charges'][$i]['charge_id']);
                $insert -> bindValue(6,$charge['data']['charges'][$i]['pdf']['charge']);
                $insert -> bindValue(7,$_POST['valor']);
                $insert -> bindValue(8,$um);
                $insert -> bindValue(9,$_POST["repeticoes"]); 
                $insert -> bindValue(10,$boleto);
                $insert -> bindValue(11,$date);
                $insert -> bindValue(12,$charge['data']['charges'][$i]['barcode']);
                $insert -> bindValue(13,$charge['data']['charges'][$i]['status']); 
                $insert -> bindValue(14,$zero);
                $insert -> bindValue(15,$valor_parcelado);
                $insert -> bindValue(16,$charge['data']['carnet_id']);
           
                $resultado = $insert -> execute();
           
                
                
            }
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
