<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contato;
class HomeController extends Controller
{
    private $totalPag = 6;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postagem = DB::table('postagens')->limit(3)->orderBy('id', 'DESC')->get();

        $posts = DB::table('postagens')->orderBy('id', 'DESC')->paginate(6);

        return view('home.home1')->with(compact('postagem' ,'posts'));
    }
    public function postagem($id)
    {
        $postagem = DB::table('postagens')->find($id);
        if ($postagem) {
            return view('home.postagem')->with(compact('postagem')); 
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
    public function pdf(){
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
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
