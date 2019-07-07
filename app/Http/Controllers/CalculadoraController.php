<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
use \DateTime;
use Illuminate\Support\Facades\DB;

class CalculadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('calculadora.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function doacao($valor ,$ir)
    {

        return view('calculadora.doacao', compact('valor','ir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function gerar_boleto(Request $request)
    {
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

        if (isset($request['valor']) && isset($request['nome_cliente']) && isset($request['cpf']) && isset($request['telefone']) && isset($request['email']) && isset($request['vencimento'])) {

            $item_1 = [
                'name' => $request["descricao"],
                'amount' => (int) 1,
                'value' => (int) $request["valor"]
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
                        'name' => $request["nome_cliente"],
                        'cpf' => $request["cpf"],
                        'phone_number' => $request["telefone"]
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

    $instructions = ['Seus dados foram guardados no sistema para que você possa vir .','Você receberá um email no final do pagamentos de todas as parcelas com todos os dados ', 'asdasd', 'asdasdsadsads'];

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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
