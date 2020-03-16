<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contato;
use \DateTime;
use App\Postagem;
use PDF;
use App\Anexos_Pdf_Postagem;
use App\Doacao_boleto;
use App\Doacao_carne;
use App\Recibo;

class HomeController extends Controller
{

    public function index(Request $request)
    {

        $postagens = DB::table('postagens')->limit(7)->orderBy('id', 'DESC')->get();
           if ($request->cat){
            $categoria = decrypt(htmlspecialchars($request->cat));
            if ($categoria && $categoria == 1 || $categoria == 2  || $categoria == 3 || $categoria == 4 || $categoria == 5) {

               $mensagem = $categoria;
                $posts = DB::table('postagens')->orderBy('id', 'DESC')->where('categoria', $categoria)->paginate(8);

                return view('newFront.index')->with(compact('postagens' ,'posts','mensagem'));
           }
            }else{
                $mensagem = "Postagens recentes";
                $posts = DB::table('postagens')->orderBy('id', 'DESC')->paginate(8);
                return view('newFront.index')->with(compact('postagens' ,'posts','mensagem'));
            }
    }
    public function postagem($id)
    {

        $id = decrypt(htmlspecialchars($id));
        $postagem = Postagem::find($id);
        $anexosPost = Anexos_Pdf_Postagem::get()->where('id_post', $id);

        $posts  = Postagem::inRandomOrder()->where('categoria', $postagem->categoria)->skip(5)->take(5)->orderBy('id', 'DESC')->paginate(6);

        if ($postagem) {
            return view('home.postagem')->with(compact('postagem', 'posts', 'anexosPost'));
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
    public function carousel(){
        return view('home.carousel');
    }

    public function status(Request $request)
    {   
        $status_boleto = DB::table('doacao_boleto')->where('doador_cpf',$request->cpf)->where('metodo_pagamento','boleto')->paginate(5);
        $status_carne = DB::table('doacao_carne')->where('doador_cpf',$request->cpf)->paginate(5);

        if(count($status_carne) || count($status_boleto)){

            return view('home.status')->with(compact('status_boleto','status_carne'));
       
        }
            $mensagem  = "esse cpf não foi encontrado !";
        return redirect()->route('soudoador')->with('mensagem',compact('mensagem'));
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
                        $data_pagamento = $boleto->update_at;
                        $vencimento = $boleto->vencimento;
                        $data_documento = $recibo->created_at;
                        $codigo_barra = $boleto->cod_barra;

                        $valorextenso = $this::valorPorExtenso(str_replace(".",",",number_format($boleto->valor_total , 2)), true , false);

                        $pdf = PDF::loadView('/home/pdf',compact('nome', 'cpf','valor','codigo','data_pagamento','vencimento', 'valorextenso','codigo_barra'));
                         return $pdf->setPaper("A4", "portrait")->stream('Recibo comprovante de doação');

                }else{

                        $codigo = strtoupper(uniqid());
                        $nome = $boleto->doador_nome;
                        $cpf = $boleto->doador_cpf;
                        $valor = number_format($boleto->valor_total , 2);
                        $data_pagamento = $boleto->update_at;
                        $codigo_barra = $boleto->cod_barra;
                        $vencimento = $boleto->vencimento;
                        $valorextenso = $this::valorPorExtenso(str_replace(".",",",number_format($boleto->valor_total , 2)), true , false);
                        $pdf = PDF::loadView('/home/pdf',compact('nome', 'cpf','valor','codigo','data_pagamento','vencimento', 'codigo_barra','valorextenso'));

                        $recibo = new Recibo;
                        $recibo->codigo_verificacao = $codigo;
                        $recibo->cod_boleto = $boleto->code;
                        $recibo->link_recibo = "teste";
                        $recibo->metodo_pagamento ="boleto";
                        $recibo ->save();

                        return $pdf->setPaper("A4", "portrait")->stream('Recibo comprovante de doação');
                }

        }else{
            return 'esse boleto nao está pago !';
        }
    }
     public function gerarPdfCarne($id){


        $id = decrypt(htmlspecialchars($id));

        $boleto = Doacao_carne::where('carne_id',$id)->first();

        if ($boleto->status == 'CONFIRMED') {

                $recibo = Recibo::where('cod_boleto' , $id)->first();

                if($recibo){
                        $codigo = strval($recibo->codigo_verificacao);
                        $nome = $boleto->doador_nome;
                        $cpf = $boleto->doador_cpf;
                        $valor = number_format($boleto->valor_total , 2);
                        $vencimento = $boleto->vencimento;
                        $data_documento = $recibo->created_at;
                        $codigo_barra = $boleto->carne_id;

                        $valorextenso = $this::valorPorExtenso(str_replace(".",",",number_format($boleto->valor_total , 2)), true , false);

                        $pdf = PDF::loadView('/home/pdf_carne',compact('nome', 'cpf','valor','codigo','vencimento', 'valorextenso','codigo_barra'));
                         return $pdf->setPaper("A4", "portrait")->stream('Recibo comprovante de doação');

                }else{

                        $codigo = strtoupper(uniqid());
                        $nome = $boleto->doador_nome;
                        $cpf = $boleto->doador_cpf;
                        $valor = number_format($boleto->valor_total , 2);
                        $codigo_barra = $boleto->carne_id;
                        $valorextenso = $this::valorPorExtenso(str_replace(".",",",number_format($boleto->valor_total , 2)), true , false);
                        $pdf = PDF::loadView('/home/pdf_carne',compact('nome', 'cpf','valor','codigo', 'codigo_barra','valorextenso'));

                        $recibo = new Recibo;
                        $recibo->codigo_verificacao = $codigo;
                        $recibo->cod_boleto = $boleto->carne_id;
                        $recibo->link_recibo = "teste";
                        $recibo->metodo_pagamento ="carne";
                        $recibo ->save();

                        return $pdf->setPaper("A4", "portrait")->stream('Recibo comprovante de doação');
                }

        }else{
            return 'esse boleto nao está pago !';
        }
    }
    public function termo()
    {
        return view('home.termo');
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
                if($recibo->metodo_pagamento == "boleto") {
                    $boleto = Doacao_boleto::where('code' , $recibo->cod_boleto)->first();
                    return view('home.recibo_valido',compact('recibo' , 'boleto'));

                }
                else if($recibo->metodo_pagamento == "carne") {   
                

                    $boleto = Doacao_carne::where('carne_id' , $recibo->cod_boleto)->first();
                    return view('home.recibo_valido',compact('recibo' , 'boleto'));
                }
            }
            else{
                return view('home.recibo_invalido');
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
     public function valorPorExtenso( $valor = 0, $bolExibirMoeda = true, $bolPalavraFeminina = false )
    {
 
        $valor = self::removerFormatacaoNumero( $valor );
 
        $singular = null;
        $plural = null;
 
        if ( $bolExibirMoeda )
        {
            $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
        else
        {
            $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
 
        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezessete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
 
 
        if ( $bolPalavraFeminina )
        {
        
            if ($valor == 1) 
            {
                $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
            else 
            {
                $u = array("", "um", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
            
            
            $c = array("", "cem", "duzentas", "trezentas", "quatrocentas","quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
            
            
        }
 
 
        $z = 0;
 
        $valor = number_format( $valor, 2, ".", "." );
        $inteiro = explode( ".", $valor );
 
        for ( $i = 0; $i < count( $inteiro ); $i++ ) 
        {
            for ( $ii = mb_strlen( $inteiro[$i] ); $ii < 3; $ii++ ) 
            {
                $inteiro[$i] = "0" . $inteiro[$i];
            }
        }
 
        // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
        $rt = null;
        $fim = count( $inteiro ) - ($inteiro[count( $inteiro ) - 1] > 0 ? 1 : 2);
        for ( $i = 0; $i < count( $inteiro ); $i++ )
        {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
 
            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count( $inteiro ) - 1 - $i;
            $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ( $valor == "000")
                $z++;
            elseif ( $z > 0 )
                $z--;
                
            if ( ($t == 1) && ($z > 0) && ($inteiro[0] > 0) )
                $r .= ( ($z > 1) ? " de " : "") . $plural[$t];
                
            if ( $r )
                $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }
 
        $rt = mb_substr( $rt, 1 );
 
        return($rt ? trim( $rt ) : "zero");
 
        

    }
    public function removerFormatacaoNumero( $strNumero )
        {
     
            $strNumero = trim( str_replace( "R$", null, $strNumero ) );
     
            $vetVirgula = explode( ",", $strNumero );
            if ( count( $vetVirgula ) == 1 )
            {
                $acentos = array(".");
                $resultado = str_replace( $acentos, "", $strNumero );
                return $resultado;
            }
            else if ( count( $vetVirgula ) != 2 )
            {
                return $strNumero;
            }
     
            $strNumero = $vetVirgula[0];
            $strDecimal = mb_substr( $vetVirgula[1], 0, 2 );
     
            $acentos = array(".");
            $resultado = str_replace( $acentos, "", $strNumero );
            $resultado = $resultado . "." . $strDecimal;
     
            return $resultado;
     
        }
}