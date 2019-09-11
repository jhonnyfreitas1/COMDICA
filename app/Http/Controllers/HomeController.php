<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contato;
use App\Postagem;
use PDF;

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
    public function gerarPdf(){

        $pdf = PDF::loadView('/home/pdf');

        return $pdf->setPaper('a4')->stream('Teste de PDF');
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
