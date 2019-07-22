<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
use \DateTime;
use Illuminate\Support\Facades\DB;
use Carbon;
class GerenciaNetController extends Controller
{

    protected $clientId = 'Client_Id_9531fd3340c988f93653a016d1a3bdc0407884e3';
    protected $clientSecret ='Client_Secret_74cc4e9058692da04749719f6fa9d9b135029f76'; 
	
    public function notification(Request $request){ //function que nao esta em rotas da web e sim api	
		if (isset($request['notification'])) {

            $mytime = Carbon\Carbon::now();
            $data =  $mytime->toDateTimeString();

            $query = DB::table('tokens')->find($request['notification']);
            if ($query != true) {
            $resultado = DB::table('tokens')->insert([
				'id' => $request['notification'],
                'created_at' => $data
			 ]);
            }
				$options = [
				  'client_id' => $this->clientId,
				  'client_secret' => $this->clientSecret,
				  'sandbox' => true
				];
				 		
				$token = $request["notification"];
				 
				$params = [
				  'token' => $token
				];
				 
				try {
				    $api = new Gerencianet($options);
				    $chargeNotification = $api->getNotification($params, []);
                   
                     return json_encode($chargeNotification);
    
                    $y = count($chargeNotification["data"]);
                     
                    $quantos_pagos =0;
                    $quantos_nao_pagos =0;
                    if($chargeNotification['data'][0]['type'] == 'carnet'){

                        for ($i=1; $i< sizeOf($chargeNotification['data']); $i++){ 
                            $carne = $chargeNotification['data'][0]['identifiers']['carnet_id'];
                            $boleto = DB::table('doacao_boleto')->where('charger_id',$chargeNotification['data'][$i]['identifiers']['charge_id'])->get();
                            if ($boleto == true) {
                                    $charger =$chargeNotification['data'][$i]['identifiers']['charge_id'];
                                    $status_charger =$chargeNotification['data'][$i]['status']['current'];
                                   $update_status = DB::table('doacao_boleto')->where('charger_id',$charger)->update(
                                    ['status' => $status_charger]);
                            }
                            if ($chargeNotification['data'][$i]['status']['current'] == 'canceled'){
                                $quantos_pagos++;
                            }else{
                                $quantos_nao_pagos++;
                            }

                        }

                            $update_pagos = DB::table('doacao_carne')->where('carne_id',$carne)->update(
                                    ['parcelas_pagas' => $quantos_pagos]);
                       
                            return "pagos ".$quantos_pagos."</br>nao pagos".$quantos_nao_pagos;
                      
                    }else if($chargeNotification['data'][0]['type'] == 'charge'){

                        $i = count($chargeNotification["data"]);
                        $ultimoStatus = $chargeNotification["data"][$i-1];
        			    $status = $ultimoStatus["status"];
        			    $charge_id = $ultimoStatus["identifiers"]["charge_id"];
        			    $statusAtual = $status["current"];
				        $boleto = DB::table('doacao_boleto')->where('charger_id',$charge_id)->get();
                        if ($boleto == true) {
        	    			$update_status = DB::table('doacao_boleto')->where('charger_id',$charge_id)->update(
                                ['status' => $statusAtual]
        					);
                        }				 
        
                    }
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

        $options = [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
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

            $metadata = array('notification_url'=>'http://comdica.site/api/boleto/notification');      
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
                       return  'Houve um problema com o servico de boletos codigo difere de 200, tente novamente';
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

        $options = [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
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
            $metadata = array('notification_url'=>'http://comdica.site/api/boleto/notification');

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
            'instructions' =>$instructions,
            'metadata' => $metadata
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
    public function cancelar_transacao($id){
            
        $options = [
          'client_id' => $this->clientId,
          'client_secret' => $this->clientSecret,
          'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
        ];
         
        // $charge_id refere-se ao ID da transação ("charge_id")
        $params = [
          'id' => $id
        ];
         
        try {
            $api = new Gerencianet($options);
            $charge = $api->cancelCharge($params, []);
         
            print_r($charge);
        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function atualizar_boletos(){
       $tokens = DB::table('tokens')->get('id');
      $mensagem = 0;
        if (is_null($tokens) || $tokens->count() == 0) {
            return 'sem tokens no banco de dados';
         }
        foreach ($tokens as $token){
               $tokenzin = $token->id;
                   
            $mytime = Carbon\Carbon::now();
            $data =  $mytime->toDateTimeString();
             
                $options = [
                  'client_id' => $this->clientId,
                  'client_secret' => $this->clientSecret,
                  'sandbox' => true
                ];
                 
             
                $params = [
                  'token' => $tokenzin
                ];                 
                try {
                    $api = new Gerencianet($options);
                    $chargeNotification = $api->getNotification($params, []);
                    $y = count($chargeNotification["data"]);
                    $quantos_pagos =0;
                    $quantos_nao_pagos =0;

                    if($chargeNotification['data'][0]['type'] == 'carnet'){

                        for ($i=1; $i< sizeOf($chargeNotification['data']); $i++){ 
                            $carne = $chargeNotification['data'][0]['identifiers']['carnet_id'];
                            if (isset($chargeNotification['data'][$i]['identifiers']['charge_id'])) {
                                
                            $boleto = DB::table('doacao_boleto')->where('charger_id',$chargeNotification['data'][$i]['identifiers']['charge_id'])->get();
                            if ($boleto == true) {
                                    $charger =$chargeNotification['data'][$i]['identifiers']['charge_id'];
                                    $status_charger =$chargeNotification['data'][$i]['status']['current'];
                                   $update_status = DB::table('doacao_boleto')->where('charger_id',$charger)->update(
                                    ['status' => $status_charger]);
                            }
                           
                                if ($chargeNotification['data'][$i]['status']['current'] == 'paid'){
                                    $quantos_pagos++;
                                }else{
                                    $quantos_nao_pagos++;
                                }
                            }
                         }
                            $update_pagos = DB::table('doacao_carne')->where('carne_id',$carne)->update(
                                    ['parcelas_pagas' => $quantos_pagos]);
                            $mensagem =+ $y;

                    }else if($chargeNotification['data'][0]['type'] == 'charge'){

                        $i = count($chargeNotification["data"]);
                        $ultimoStatus = $chargeNotification["data"][$i-1];
                        $status = $ultimoStatus["status"];
                        $charge_id = $ultimoStatus["identifiers"]["charge_id"];
                        $statusAtual = $status["current"];
                        $boleto = DB::table('doacao_boleto')->where('charger_id',$charge_id)->get();
                        if ($boleto == true) {
                            $update_status = DB::table('doacao_boleto')->where('charger_id',$charge_id)->update(
                                ['status' => $statusAtual]
                            );
                             $mensagem =+ $y;   
                        }                
        
                    }
                    //print_r($chargeNotification);
                } catch (GerencianetException $e) {
                   return  print_r($e->code);
                   return  print_r($e->error);
                   return  print_r($e->errorDescription);
                } catch (Exception $e) {
                   return  print_r($e->getMessage());
                }        
         
         }
                return 'Transações verificadas  <b>' . $mensagem.' </b>';
    }

}

