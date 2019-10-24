<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use \DateTime;
use Illuminate\Support\Facades\DB;
use \BoletoFacil;
use App\Tokens;
use App\Doacao_boleto;
use App\Doacao_carne;
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


    public function gerarBoleto(Request $req) {


        if (intval($req->valor) < 6) {
            return view('calculadora.valor_invalido');
        }   

        if ($req->cpf && $req->nome) {
            require("BoletoFacilController.php");

            $notification = "https://comdicaaracoiabape.com.br/api/transacoes/notification";
            $nome = htmlspecialchars($req->nome);
            $cpf = htmlspecialchars($req->cpf);
            $email = htmlspecialchars($req->email);
            $valor = number_format($req->valor , 2);
                                                    //44765F040CC6D355B69B7660F8809E5664DE315FB287EC6C91DBCFED7924D819 <-- codigo do token para teste
            $boletoFacil = new BoletoFacilController("68F80F3C7D9878DA0792E10945D365D6DB7275B79546E76691B560E2866E4AB4");
            $boletoFacil->createCharge($nome, $cpf, "Doação para o fundo municipal da criança e do adolescente de araçoiaba", $valor, "",$notification);
            $boletoFacil->payerEmail = $email;
            $boleto = json_decode($boletoFacil->issueCharge(), true);

            if ($boleto != null) {
            $date = $boleto['data']['charges'][0]['dueDate'];
            $model = new Doacao_boleto;
            $model->doador_nome = $nome;
            $model->doador_cpf = $cpf;
            $model->doador_email = $email;
            $model->code = $boleto['data']['charges'][0]['code'];
            $model->link = $boleto['data']['charges'][0]['link'];
            $model->valor_total = $valor;
            $model->metodo_pagamento = "boleto";
            $model->vencimento = $date;
            $model->cod_barra = $boleto['data']['charges'][0]['payNumber'];
            $model->status = "AUTHORIZED";
            $resultado = $model->save();
            $link_boleto = $boleto['data']['charges'][0]['link'];
            $cod =$boleto['data']['charges'][0]['payNumber'];
            if ($resultado == true) {
                   return view('layouts.retorno_boleto', compact('nome','link_boleto', 'cod','email'));
                return  "sucesso ao gerar boleto".json_encode($boleto['data']['charges'][0]);
            }
                return $dado;
            }
             else {
                return "Servidor de transações fora de operação";
            }

         } else {
                return "Falta preencher todos os dados.";
            }
    }


    public function  gerarCarne(Request $req){


        if ((intval($req->valor) / intval($req->parcelas)) < 6) {
            return view('calculadora.valor_invalido');
        }   

         if ($req->cpf && $req->nome) {
            require("BoletoFacilController.php");
            $nome = htmlspecialchars($req->nome);
            $parcelas = htmlspecialchars($req->parcelas);
            $cpf = htmlspecialchars($req->cpf);
            $valor = $req->valor;
            $valorparcelado = number_format($valor / $parcelas, 2);
            $email = htmlspecialchars($req->email);
            $notification = "https://comdicaaracoiabape.com.br/api/transacoes/notification";
            $boletoFacil = new BoletoFacilController("68F80F3C7D9878DA0792E10945D365D6DB7275B79546E76691B560E2866E4AB4");
            $boletoFacil->createCharge($nome, $cpf, "Doação para o fundo municipal da criança e do adolescente de araçoiaba", $valorparcelado, "",$notification);
            $boletoFacil->payerEmail = $email;
            $boletoFacil->installments = $parcelas;
            $boletoFacil->totalAmount = $valor;
            $boleto = json_decode($boletoFacil->issueCharge(), true);
            $cod = $boleto['data']['charges'][0]['payNumber'];
            $link_boleto = $boleto['data']['charges'][0]['link'];


            if ($boleto) {
                $code = false;
                $newcarne = new Doacao_carne;
                $newcarne->valor_parcelado = $valorparcelado;
                $newcarne->doador_nome = $nome;
                $newcarne->doador_cpf = $cpf;
                $newcarne->link_carne = $link_boleto;
                $newcarne->valor_total = $valor;
                $newcarne->numero_parcelas = $parcelas;
                $newcarne->parcelas_pagas = 0;
                $newcarne->status = "aguardando pagamento de todas as parcelas";
                 for ($i=0; $i < sizeof($boleto['data']['charges']); $i++) {
                  $code = $code + $boleto['data']['charges'][$i]['code'];
                 }
                 $newcarne->carne_id = $code;
                 $data = $newcarne->save();
             
                for ($i=0; $i < sizeof($boleto['data']['charges']); $i++) {
                    $date = $boleto['data']['charges'][$i]['dueDate'];
                    $model = new Doacao_boleto;
                    $model->doador_nome = $nome;
                    $model->doador_cpf = $cpf;
                    $model->doador_email = $email;
                    $model->code = $boleto['data']['charges'][$i]['code'];
                    $model->link = $boleto['data']['charges'][$i]['link'];
                    $model->valor_total = $valor;
                    $model->metodo_pagamento = "carne";
                    $model->vencimento = $date;
                    $model->parcelas = $parcelas;
                    $model->cod_barra = $boleto['data']['charges'][$i]['payNumber'];
                    $model->status = "AUTHORIZED";
                    $model->valor_parcelado = $valorparcelado;
                    $model->fk_id_carne = $code;
                    $resultado = $model->save();
                 }
            }else{
                return "Erro ao emitir cobrança tente novamente.";
            }
                
            return  view('layouts.retorno_boleto', compact('nome', 'email' , 'cod', 'link_boleto'));

          }else{
            return "Falta preencher algum determinado dado.";
          }
    }
    public function detalhes_boleto(){
          $tokens = Tokens::get();
          $count =0;
          foreach ($tokens as $count => $token) {
          $notification = new BoletoFacilController("68F80F3C7D9878DA0792E10945D365D6DB7275B79546E76691B560E2866E4AB4");
          $objeto_token = json_decode($notification->fetchPaymentDetails($token['paymentToken']) , true);


            foreach ($objeto_token as $i => $resultado) {

                $boleto = Doacao_boleto::where('code', $resultado['payment']['charge']['code'])->update(
                    [
                        'status'=> $resultado['payment']['status'],
                        'data_pagamento' => $resultado['payment']['date']
                    ]
                );
            }
                $count += 1;
          }

         $boleto_carne = Doacao_boleto::where("metodo_pagamento", "carne")->where("status", "CONFIRMED")->get();
         
         foreach ($boleto_carne as $i => $resultado){
                            
         $carne = Doacao_carne::where('carne_id', $resultado['fk_id_carne'])->get();

         $quantos_pagos = Doacao_boleto::where('fk_id_carne' , $resultado['fk_id_carne'])->where('status' , "CONFIRMED")->count();

         if ($carne[0]['parcelas_pagas'] <= $carne[0]['numero_parcelas']) {
         
            $boleto = Doacao_carne::where('carne_id', $resultado['fk_id_carne'])->update(
                    [
                        'parcelas_pagas'=>$quantos_pagos,
                    ]);
         
            }
                
             if ($carne[0]['parcelas_pagas'] == $carne[0]['numero_parcelas']) {
                    
                    Doacao_carne::where('carne_id', $resultado['fk_id_carne'])->update(
                    [
                        'status'=> "CONFIRMED"
                    ]);
             }else{
                  Doacao_carne::where('carne_id', $resultado['fk_id_carne'])->update(
                    [
                        'status'=> "aguardando pagamento de todas as parcelas"
                    ]);
             }
         }

          return 'total de '.$count. " boletos verificados";


    }
    public function notification(Request $req){

        $token = $req->paymentToken;
        $cod_refence = $req->chargeReference;
        $chargeCode = $req ->chargeCode;
        $model = new Tokens;
        $model->paymentToken = $req->paymentToken;
        $model->chargeReference = $req->chargeReference;
        $model->chargeCode = $req->chargeCode;

        try {
            if ($resultado = $model->save()) {
                $this::detalhes_boleto();
                return response('Tudo certo', 200);
            }
         }catch (Exception $e) {

                return response('deu ruim '.$e->code. $e->errorDescription, 404);
         }
    }
}
