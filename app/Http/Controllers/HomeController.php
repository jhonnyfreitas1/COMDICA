<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contato;
use \DateTime;
use App\Postagem;
use PDF;
use App\Doacao_boleto;
use App\Recibo;

class HomeController extends Controller
{

    public function index(Request $request)
    {
       
        $postagem = DB::table('postagens')->limit(3)->orderBy('id', 'DESC')->get();
           if ($request->cat){
            $categoria = decrypt(htmlspecialchars($request->cat));
            if ($categoria && $categoria == 1 || $categoria == 2  || $categoria == 3 || $categoria == 4 || $categoria == 5) {
               
               $mensagem = $categoria;
                $posts = DB::table('postagens')->orderBy('id', 'DESC')->where('categoria', $categoria)->paginate(8);
               
                return view('home.home1')->with(compact('postagem' ,'posts','mensagem'));
           }
            }else{
                $mensagem = "Postagens recentes";
                $posts = DB::table('postagens')->orderBy('id', 'DESC')->paginate(8); 
                return view('home.home1')->with(compact('postagem' ,'posts','mensagem'));
            }
    }
    public function postagem($id)
    {

        $id = decrypt(htmlspecialchars($id));
        $postagem = Postagem::find($id);

        $posts  = Postagem::inRandomOrder()->where('categoria', $postagem->categoria)->skip(5)->take(5)->orderBy('id', 'DESC')->paginate(6);
        
        if ($postagem) {
            return view('home.postagem')->with(compact('postagem', 'posts')); 
         }else{
            return redirect('/notfound');
        }
    }
    public function pq_doar()
    {
        return view('home.pq_doar');
    }
    public function sou_doador()
    {
        return view('home.sou_doador');
    }
    public function notfound(){
        return view('home.notfound');
    }


    public function status(Request $request)
    {
        $status = DB::table('doacao_boleto')->where('doador_cpf',$request->cpf)->get();
        return view('home.status')->with(compact('status'));
    }

    public function gerarPdf($id){


        $id = decrypt(htmlspecialchars($id));

        $boleto = Doacao_boleto::where('code',$id)->first();
        
        if ($boleto->status == 'CONFIRMED') {
           
                $recibo = Recibo::where('cod_boleto' , $id)->first();

                if($recibo){

                        $codigo = strval($recibo->codigo_verificacao);

                        $nome = $boleto->doador_nome;
                        $cpf = $boleto->doador_cpf;
                        $valor = number_format($boleto->valor_parcelado ?  $boleto->valor_parcelado: $boleto->valor_total , 2);
                        $data_pagamento = $boleto->data_pagamento;
                        $vencimento = $boleto->vencimento;
                        $vencimento = new DateTime($vencimento);
                        $vencimento =  $vencimento->format('d/m/Y');
                        $data_documento = $recibo->created_at;
                        $pdf = PDF::loadView('/home/pdf',compact('nome', 'cpf','valor','codigo','data_pagamento','vencimento'));
                         return $pdf->setPaper("A4", "portrait")->stream('Recibo comprovante de doação');

                }else{

                        $codigo = strtoupper(uniqid());
                        $nome = $boleto->doador_nome;
                        $cpf = $boleto->doador_cpf;
                        $valor = number_format($boleto->valor_parcelado ?  $boleto->valor_parcelado: $boleto->valor_total , 2);
                        $data_pagamento = $boleto->data_pagamento;
                        $vencimento = $boleto->vencimento;
                        $vencimento = new DateTime($vencimento);
                        $vencimento =  $vencimento->format('d/m/Y');

                        $pdf = PDF::loadView('/home/pdf',compact('nome', 'cpf','valor','codigo','data_pagamento','vencimento' ));
                 
                        $recibo = new Recibo;
                        $recibo->codigo_verificacao = $codigo;
                        $recibo->cod_boleto = $boleto->code;
                        $recibo->link_recibo = "teste";
                        $recibo ->save();

                        return $pdf->setPaper("A4", "portrait")->stream('Recibo comprovante de doação');
                }

        }else{
            return 'esse boleto nao está pago !';
        }
    }


    public function contato()
    {
        return view('home.contato');
    }
     public function home1()
    {
        $postagem = DB::table('postagens')->limit(3)->get();

        $posts = DB::table('postagens')->paginate(6);

        return view('home.home1')->with(compact('postagem' ,'posts'));
        
    }
    public function verificar_recibo(Request $req){


            $recibo = Recibo::where('codigo_verificacao',$req->cod)->first();
            if ($recibo) {
                return "tudo certo,  esse recibo eh valido !!!!!!!!!";       
            }
            else{
                return "recibo invalido";
            }

    }
    public function create_contato(Request $req){

       $validar  =   $req->validate([
            'usuario_mensagem' => 'required',
            'usuario_nome' => 'required',
         ],['usuario_mensagem.required' => 'Indique a mensagem em questão',
            'usuario_mensagem.required' => 'Preencha o campo nome']);

        $contato = $req->all();
        $resultado = Contato::create($contato);
       if ($resultado) {
            $mensagem = 'Mensagem enviada com sucesso';
           return view('home.contato')->with(compact('mensagem'));
       }else{
        $erro = 'Falha no envio da mensagem';
           return view('home.contato')->with(compact('erro'));
       }
    }
}
