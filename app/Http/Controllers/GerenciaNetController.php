<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
use \DateTime;
use Illuminate\Support\Facades\DB;

class GerenciaNetController extends Controller
{
    
	public function notification(Request $request){ //function que nao esta em rotas da web e sim api	
		if (isset($request['notification'])) {
			

			$resultado = DB::table('tokens')->insert([
				'token' => $request['notification']
			]);
		
				$clientId = 'Client_Id_9531fd3340c988f93653a016d1a3bdc0407884e3';
		        $clientSecret ='Client_Secret_74cc4e9058692da04749719f6fa9d9b135029f76'; 

		        /* producao
		        $clientId = 'Client_Id_0f2062a85eb24a28bd08ec8d34b73e371f6d2f47';
		        $clientSecret = 'Client_Secret_23bd0aeeda1c17959b9d52b50ecab0bdd36d038f';
		        */
				 
				$options = [
				  'client_id' => $clientId,
				  'client_secret' => $clientSecret,
				  'sandbox' => true 
				];
				 
				
				$token = $request["notification"];
				 
				$params = [
				  'token' => $token
				];
				 
				try {
				    $api = new Gerencianet($options);
				    $chargeNotification = $api->getNotification($params, []);
				  // Para identificar o status atual da sua transação você deverá contar o número de situações contidas no array, pois a última posição guarda sempre o último status. Veja na um modelo de respostas na seção "Exemplos de respostas" abaixo.
				  
				  // Veja abaixo como acessar o ID e a String referente ao último status da transação.
				    
				    // Conta o tamanho do array data (que armazena o resultado)
				    $i = count($chargeNotification["data"]);
				    // Pega o último Object chargeStatus
				    $ultimoStatus = $chargeNotification["data"][$i-1];
				    // Acessando o array Status
				    $status = $ultimoStatus["status"];
				    // Obtendo o ID da transação    
				    $charge_id = $ultimoStatus["identifiers"]["charge_id"];
				    // Obtendo a String do status atual
				    $statusAtual = $status["current"];
				    
				    // Com estas informações, você poderá consultar sua base de dados e atualizar o status da transação especifica, uma vez que você possui o "charge_id" e a String do STATUS
				  
				    $posts = DB::table('doacao_boleto')->where('charger_id',$charge_id)->get();
			

	    
	    			$flight = DB::table('doacao_boleto')->where('charger_id',$charge_id)->updateOrCreate(
					    ['status' => $statusAtual]
					);

				   return  "O id da transação é: ".$charge_id." seu novo status é: ".$statusAtual."seu array";
				 
				    //print_r($chargeNotification);
				} catch (GerencianetException $e) {
				   return  print_r($e->code);
				  return   print_r($e->error);
				  return   print_r($e->errorDescription);
				} catch (Exception $e) {
				   return  print_r($e->getMessage());
				}
		}else{
			return 'nao tem notification';
		}
		
	}
    public function gerar_boleto(Request $request)
    {

    	
        $clientId = 'Client_Id_9531fd3340c988f93653a016d1a3bdc0407884e3';
        $clientSecret ='Client_Secret_74cc4e9058692da04749719f6fa9d9b135029f76'; 

        /* producao
        $clientId = 'Client_Id_0f2062a85eb24a28bd08ec8d34b73e371f6d2f47';
        $clientSecret = 'Client_Secret_23bd0aeeda1c17959b9d52b50ecab0bdd36d038f';
        */
        $options = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'sandbox' => true
        ];

        if (isset($request['valor']) && isset($request['nome_cliente']) && isset($request['cpf']) && isset($request['telefone']) && isset($request['email']) && isset($request['vencimento'])) {

            $item_1 = [
                'name' => $request["descricao"],
                'amount' => (int) 1,
                'value' => (int) $request["valor"]
            ];

            $items = [
                $item_1
            ];

            $metadata = array('notification_url'=>'http://api.webhookinbox.com/i/m0qsqDi9/in/');      
      
            $body = ['items' => $items,
            'metadata' => $metadata];
            
            try {
                $api = new Gerencianet($options);
                $charge = $api->createCharge([], $body);
            
                if ($charge["code"] == 200) {

                    $params = ['id' => $charge["data"]["charge_id"]];
                    $customer = [
                        'name' => $request["nome_cliente"],
                        'cpf' => $request["cpf"],
                        'phone_number' => $request["telefone"],
                        'email' => $request["email"]
                    ];

                    //Formatando a data, convertendo do estino brasileiro para americano.
                    $data_brasil = DateTime::createFromFormat('d/m/Y', $request["vencimento"]);
                    
                    $bankingBillet = [
                        'expire_at' => $data_brasil->format('Y-m-d'),
                        'customer' => $customer
                    ];
                    $payment = ['banking_billet' => $bankingBillet];
                    $body = ['payment' => $payment];

                    $api = new Gerencianet($options);
                    $pay_charge = $api->payCharge($params, $body);
                    $date =  date('Y-m-d', strtotime('+1 month'));
                    $data_banco = $data_brasil->format('Y-m-d');
                    $um = 1;
                    $boleto = 'boleto';
                    $zero = 0;
                    $data_atual= date('Y-m-d');
                    DB::table('doacao_boleto')->insert([
                        'doador_email' => $request['email'],
                        'doador_nome' => $request['nome_cliente'],
                        'doador_cpf' => $request['cpf'],
                        'doador_telefone' => $request['telefone'],
                        'doador_email' => $request['email'],
                        'charger_id' => $pay_charge['data']['charge_id'],
                        'link_boleto' => $pay_charge['data']['link'],
                        'valor_total'   =>$request['valor'],
                        'quantidade' => 1,
                        'parcelas' => 1,
                        'metodo_pagamento' => 'boleto',
                        'valor_parcelado' => 0,
                        'created_at' => $data_atual,
                       'fk_id_carne' => null,
                        'vencimento' => $date,
                        'cod_barra' => $pay_charge['data']['barcode'],
                        'status' => $pay_charge['data']['status']
                    ]);

                   return  json_encode($pay_charge);
                    }else{
                       return  'code nao é 200';
                    }
             
            } catch (GerencianetException $e) {
                print_r($e->code);
                print_r($e->error);
                print_r($e->errorDescription);
            } catch (Exception $e) {
                print_r($e->getMessage());
            }
        }else {
          return  'Complete todos os campos do formulário para doação via boleto';
        }

    }

    public function gerar_carne(Request $request)
    {
       
if (isset($request['valor']) && isset($request['nome_cliente']) && isset($request['cpf']) && isset($request['telefone']) && isset($request['email']) && isset($request['vencimento']) && isset($request['repeticoes'])) {


    $clientId = 'Client_Id_9531fd3340c988f93653a016d1a3bdc0407884e3';
    $clientSecret ='Client_Secret_74cc4e9058692da04749719f6fa9d9b135029f76'; 

    $options = [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'sandbox' => true
    ];

    $instructions = ['Sua doação é muito importante para todas as crianças e adolescentes de Araçoiaba.','Você receberá um e-mail quando finalizar o pagamento das parcelas.', 'veja o status da sua doação na aba SOU DOADOR ', 'digite seus dados e verifique o status da sua doação, nós da comdica.site agradecemos.'];

    $valor_parcelado = $request['valor'] / $request['repeticoes'];


    $item_1 = [
        'name' => $request["descricao"],
        'amount' => (int) 1,
        'value' => (int) $valor_parcelado

    ];

    $items = [
        $item_1
    ];

    $customer = [
            'name' => $request["nome_cliente"],
            'cpf' => $request["cpf"],
            'phone_number' => $request["telefone"],
            'email' => $request["email"],
        ];

      $date =  date('Y-m-d', strtotime('+1 month'));
    $body = [
    'items' => $items,
    'repeats'=>(int)$request["repeticoes"],
    'split_items'=>false,
    'expire_at' => $date,
    'customer' => $customer,
    'instructions' =>$instructions
    ];
    $um = 1;
    $zero = 0;
    $vencimento = $request['vencimento'];
    $boleto = 'carne';
    try {
        $api = new Gerencianet($options);
        $charge = $api->createCarnet([], $body);
        
        if ($charge['code'] == 200) {
            //inserindo em tabela de doacoes de carne
              DB::table('doacao_carne')->insert([
                        'carne_id' =>   $charge['data']['carnet_id'],
                        'doador_nome' => $request['nome_cliente'],
                        'link_carne' => $charge['data']['link'],
                        'valor_total' => $request['valor'],
                        'numero_parcelas' => $request['repeticoes'],
                        'valor_parcelado' => $valor_parcelado,
                        'parcelas_pagas' => 0,
                        'status' => $charge['data']['status']
                    ]);
                

                //inserindo   em tabela de doacoes imposto e passando uma chave estrangeira do carne.
                for($i= 0; $i < sizeof($charge['data']['charges']); $i++){ 
                   DB::table('doacao_boleto')->insert([
                        'doador_email' => $request['email'],
                        'doador_nome' => $request['nome_cliente'],
                        'doador_cpf' => $request['cpf'],
                        'doador_telefone' => $request['telefone'],
                        'doador_email' => $request['email'],
                        'charger_id' => $charge['data']['charges'][$i]['charge_id'],
                        'link_boleto' => $charge['data']['charges'][$i]['pdf']['charge'],
                        'valor_total'   =>$request['valor'],
                        'quantidade' => 1,
                        'parcelas' => $request['repeticoes'],
                        'metodo_pagamento' => 'carne',
                        'valor_parcelado' => $valor_parcelado,
                       'fk_id_carne' => $charge['data']['carnet_id'],
                        'vencimento' => $date,
                        'cod_barra' => $charge['data']['charges'][$i]['barcode'],
                        'status' => $charge['data']['charges'][$i]['status']
                    ]);    
                }
            }
            return json_encode($charge);

    } catch (GerencianetException $e) {
        print_r($e->code);
        print_r($e->error);
        print_r($e->errorDescription);
    } catch (Exception $e) {
        print_r($e->getMessage());
    }
    }else{
    return 'falta parametros';
    }

    }

}
