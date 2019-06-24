<?php

require __DIR__ . '/../vendor/autoload.php';
include 'bd-conection.php';

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$clientId = 'Client_Id_9531fd3340c988f93653a016d1a3bdc0407884e3';
$clientSecret ='Client_Secret_74cc4e9058692da04749719f6fa9d9b135029f76'; 
/* producao
$clientId = 'Client_Id_b4e3a0155e6b71171d70579745e30727c5d2be1f';
$clientSecret = 'Client_Secret_09a2dc05b56e4ce3626d49387f6602331cacef52';
*/
$options = [
    'client_id' => $clientId,
    'client_secret' => $clientSecret,
    'sandbox' => true
];


if (isset($_POST['valor']) && isset($_POST['nome_cliente']) && isset($_POST['cpf']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['vencimento'])) {

    $item_1 = [
        'name' => $_POST["descricao"],
        'amount' => (int) 1,
        'value' => (int) $_POST["valor"]
    ];

    $items = [
        $item_1
    ];
      

    $body = ['items' => $items];
    try {
        $api = new Gerencianet($options);
        $charge = $api->createCharge([], $body);
    
        if ($charge["code"] == 200) {

            $params = ['id' => $charge["data"]["charge_id"]];
            $customer = [
                'name' => $_POST["nome_cliente"],
                'cpf' => $_POST["cpf"],
                'phone_number' => $_POST["telefone"]
            ];

            //Formatando a data, convertendo do estino brasileiro para americano.
            $data_brasil = DateTime::createFromFormat('d/m/Y', $_POST["vencimento"]);
            
            $bankingBillet = [
                'expire_at' => $data_brasil->format('Y-m-d'),
                'customer' => $customer
            ];
            $payment = ['banking_billet' => $bankingBillet];
            $body = ['payment' => $payment];

            $api = new Gerencianet($options);
            $pay_charge = $api->payCharge($params, $body);
           
          $data_banco = $data_brasil->format('Y-m-d');
            $um = 1;
            $boleto = 'boleto';
            $zero = 0;
            $insert =  $conn -> prepare('INSERT INTO doacoes_imposto (doador_nome,doador_cpf,doador_telefone,doador_email,num_transacao,link_boleto,valor_total, quantidade,parcelas,metodo_pagamento,vencimento,cod_barra,status,valid,parcelas_pagas) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            if ($pay_charge['code'] == 200) {
            
            $insert -> bindParam(1,$_POST['nome_cliente']);
            $insert -> bindParam(2,$_POST['cpf']);
            $insert -> bindParam(3,$_POST['telefone']);
            $insert -> bindParam(4,$_POST['email']);
            $insert -> bindParam(5,$pay_charge['data']['charge_id']);
            $insert -> bindParam(6,$pay_charge['data']['link']);
            $insert -> bindParam(7,$_POST['valor']);
            $insert -> bindParam(8,$um);
            $insert -> bindParam(9,$um); 
            $insert -> bindParam(10,$boleto);
            $insert -> bindParam(11,$data_banco);
            $insert -> bindParam(12,$pay_charge['data']['barcode']);
            $insert -> bindParam(13,$pay_charge['data']['status']); 
            $insert -> bindParam(14,$um);
            $insert -> bindParam(15,$zero);
            $resultado = $insert -> execute();

            echo json_encode($pay_charge);
              
            }else{
                echo 'code nao eh 200';
            }
        }else {
            echo "Algum dado passado esta errado!";
        }
    } catch (GerencianetException $e) {
        print_r($e->code);
        print_r($e->error);
        print_r($e->errorDescription);
    } catch (Exception $e) {
        print_r($e->getMessage());
    }
}else {
    echo 'Complete todos os campos do formulário para doação via boleto';
} 