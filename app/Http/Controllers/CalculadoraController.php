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

/*
        _token:_token,descricao:descricao,email:email,valor:valor,quantidade:quantidade,nome_cliente:nome_cliente,cpf:cpf,telefone:telefone,vencimento:vencimento
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
                
                    DB::table('doacao_boleto')->insert(
                        ['email' => 'john@example.com',
                         'votes' => 0]
                    );




                    $insert -> bindParam(1,$request['nome_cliente']);
                    $insert -> bindParam(2,$request['cpf']);
                    $insert -> bindParam(3,$request['telefone']);
                    $insert -> bindParam(4,$request['email']);
                    $insert -> bindParam(5,$pay_charge['data']['charge_id']);
                    $insert -> bindParam(6,$pay_charge['data']['link']);
                    $insert -> bindParam(7,$request['valor']);
                    $insert -> bindParam(8,$um);
                    $insert -> bindParam(9,$um); 
                    $insert -> bindParam(10,$boleto);
                    $insert -> bindParam(11,$date);
                    $insert -> bindParam(12,$pay_charge['data']['barcode']);
                    $insert -> bindParam(13,$pay_charge['data']['status']); 
                    $insert -> bindParam(14,$zero);
                    $resultado = $insert -> execute();

                    echo json_encode($pay_charge);
                    }else{
                        echo 'code nao é 200';
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

    }

    public function gerar_carne(Request $request)
    {


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
