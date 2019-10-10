<?php

namespace App\Http\Controllers;
use Auth;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Doacao_boleto;
use App\Contato;
use App\User;
use App\Postagem;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $boletos = Doacao_boleto::get()->count();
        $contato = Contato::where('visto', false)->get()->count();
        $lava = new Lavacharts; // See note below for Laravel

        $cancelados = Doacao_boleto::where('status' , 'FAILED')->count();

        $pagos =Doacao_boleto::where('status' , 'CONFIRMED')->count();
        
                
        $wating= Doacao_boleto::where('status' , 'AUTHORIZED')->count();

        $reasons = $lava->DataTable();

        $reasons->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['Pagamento não realizado', $cancelados])
                ->addRow(['Pagos', $pagos])
                ->addRow(['Esperando pagamento', $wating]);

        $lava->DonutChart('IMDB', $reasons, [
            'width' => 1000,
            'height' => 600,
              'colors'=> ['#b71f2d', 'rgb(8, 179, 41)', '#babaca'],
                'is3D' => true,
            'legend' => [
                'position' => 'right',
            ],
            'backgroundColor' => ''
        ]);

        return View('admin.index', compact('lava'))->with(compact('contato'));
    }
    public function create()
    {
        //
    }
    public function nova_postagem()
    {
         $contato = Contato::where('visto', false)->get()->count();
            return view('admin.nova_postagem')->with(compact('contato' , 'postagem'));
    }

     public function doacoes_boleto()
    {
        $doacoes = Doacao_boleto::orderBy('id', 'DESC')->paginate(10);
         $contato = Contato::where('visto', false)->get()->count();
        return view('admin.doacoes')->with(compact('doacoes','contato'));
    }

    public function minhas_postagens()
    {
         $posts = DB::table('postagens')->where('user_id',Auth::id())->paginate(8);
         $contato = Contato::where('visto', false)->get()->count();
         return  view('admin.minhas_postagens')->with(compact('posts','contato'));
    }
    public function salvar_postagem(Request $request)
    {
        
        if (strlen($request->titulo) > 50)
        {
            return 'O titulo de sua postagem não pode ultrapassar 50 caracteres';
        }
        $validPost = DB::table('postagens')->where('titulo',$request->titulo)->first();
       
          
        if ($validPost){
            return 'Uma postagem com esse titulo já existe';
        }
        $data =  date('Y-m-d H:i:s');
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {   
                    $imagem = $request->file()['imagem'];
                    $numero = rand(11111,99999).$data;
                    $dir = "upload_imagem";
                    $ex = strtolower(substr($request->imagem, -4));
                    $nomeImagem = "imagem_".$numero.".".$ex;
                    $imagem->move($dir,$nomeImagem);
                    $request->file()['imagem'] = $nomeImagem;
                }

                if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {   
                    $pdf1 = $request->file()['pdf'];
                    $numero = rand(11111,99999).$data;
                    $diretorio = "upload_pdf";
                    $ex = strtolower(substr($request->pdf, -4));
                    $nomepdf = "pdf_".$numero.".pdf";
                    $pdf1->move($diretorio,$nomepdf);
                    $request->file()['pdf'] = $nomepdf;
                }else{
                    $nomepdf = null;
                }
                if ($request->hasFile('pdf2') && $request->file('pdf2')->isValid()) {   
                    $pdf2 = $request->file()['pdf2'];
                    $numero1 = md5(rand(11111,99999).$data);
                    $diretorio = "upload_pdf";
                    $nomepdf2 = "pdf_".$numero1.".pdf"; 
                    $pdf2->move($diretorio,$nomepdf2);
                    $request->file()['pdf2'] = $nomepdf2;
                }else{
                    $nomepdf2 = null;
                }
                
                if ($request['yt'] != "") {
                    $url = explode("watch?v=", $request['yt']);
                    $embed = $url[0]."embed/".$url[1];
                }else{
                    $embed = null;
                }

                    $categorianumber= intval($request['categoria']);

                   $model = new Postagem;
                   $model->titulo = $request['titulo'];
                   $model->descricao = $request['descricao'];
                   $model->link_yt = $embed;
                   $model->imagem_principal = $nomeImagem;
                   $model->categoria = $categorianumber;
                   $model->pdf1 = $nomepdf;
                   $model->pdf2 = $nomepdf2;
                   $model->user_id = Auth::id();
                  $resultado = $model->save();


        if ($resultado == true) {
            return 'Postagem feita com sucesso';

        }else {
            return 'Falha ao fazer postagem, tente novamente.';
        }
    }
    public function store(Request $request)
    {

         $this->validate(request(), [
            'name' => 'required',
            'password' => 'required|min:8|confirmed',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password2' => 'min:8'
        ]);

         
        $user  = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->password = bcrypt($request->password);     

        if ($user->save()) {
                $mensagem = "Dados alterados com sucesso";
                return back()->with(compact($mensagem));  
        }else{
            $mensagem = "erro na atualizacao dos dados";
            return back()->with(compact($mensagem));
        }
    }

    public function back(){
         return back()->withInput();
    }

    public function contato_single($id){

         $model = Contato::where('id', '=' , $id)->first();
         $contato = Contato::where('visto', false)->get()->count();
        if ($model) {   
         $model->visto = true;
         $model->save();
         return view('admin.mensagem')->with(compact('model','contato'));
        }else{
            return redirect('/notfound');
        }

    }
    public function show($id)
    {
        //
    }
    public function contato(){
            $mensagens =  Contato::orderBy('id', 'DESC')->paginate(12);
            $contato = Contato::where('visto', false)->get()->count();
            if ($mensagens) {
                return view('admin.contato')->with(compact('mensagens','contato'));
            }else{
                $mensagens = 'Sem mensagens no momento.';
                return view('admin.contato')->with(compact('mensagens')); 
            }
    }
    public function edit($id)
    {
        $postagem = Postagem::find($id);
        return view('admin.edit_postagem')->with(compact('postagem'));
    }
    public function update()
    {
        $user = User::find(Auth::id());

       return view('admin.admin_update')->with(compact('user'));
    }
    public function update_save(Request $request, $id){


        if (strlen($request->titulo) > 50)
        {
            return 'O titulo de sua postagem não pode ultrapassar 50 caracteres';
        }
    
        $post = Postagem::find($id);
        $model = Postagem::find($id);

        $data =  date('Y-m-d H:i:s');
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {   
                    $imagem = $request->file()['imagem'];
                    $numero = rand(11111,99999).$data;
                    $dir = "upload_imagem";
                    $ex = strtolower(substr($request->imagem, -4));
                    $nomeImagem = "imagem_".$numero.".".$ex;
                    $imagem->move($dir,$nomeImagem);
                    $request->file()['imagem'] = $nomeImagem;
                    $model->imagem_principal = $nomeImagem;
                }

                if ($request->hasFile('pdf') && $request->file('pdf')->isValid()) {   
                    $pdf1 = $request->file()['pdf'];
                    $numero = rand(11111,99999).$data;
                    $diretorio = "upload_pdf";
                    $ex = strtolower(substr($request->pdf, -4));
                    $nomepdf = "pdf_".$numero.".pdf";
                    $pdf1->move($diretorio,$nomepdf);
                    $request->file()['pdf'] = $nomepdf;
                     $model->pdf1 = $nomepdf;
                }else{
                    $nomepdf = null;
                }
                if ($request->hasFile('pdf2') && $request->file('pdf2')->isValid()) {   
                    $pdf2 = $request->file()['pdf2'];
                    $numero1 = md5(rand(11111,99999).$data);
                    $diretorio = "upload_pdf";
                    $nomepdf2 = "pdf_".$numero1.".pdf"; 
                    $pdf2->move($diretorio,$nomepdf2);
                    $request->file()['pdf2'] = $nomepdf2;
                     $model->pdf2 = $nomepdf2; 
                }else{
                    $nomepdf2 = null;
                }
                if ($request['yt'] != "") {
                    $url = explode("watch?v=", $request['yt']);
                    $embed = $url[0]."embed/".$url[1];

                }else{
                    $embed = null;
                }

                    $categorianumber= intval($request['categoria']);
              
                   $model->titulo = $request['titulo'] ? $request['titulo'] : $post->titulo;
                   $model->descricao = $request['descricao'] ? $request['descricao'] : $post->descricao;
                   
                   $model->categoria = $categorianumber;
                  $model->link_yt = $embed;
                   $model->user_id = Auth::id();
                  $resultado = $model->update();

        if ($resultado == true) {
            $mensagem = 'Atualização feita com sucesso';
            return $mensagem;

        }else {
            $mensagem = 'Falha ao atualizar postagem';
                 return $mensagem;
        }
    }
    

    public function destroy($id)
    {   
        $query = Postagem::where('id', '=', $id)->first();
        unlink("upload_imagem/".$query->imagem_principal);
        $resultado=  $query->delete();
        if ($resultado == true) {
            $mensagem = "Sucesso ao deletar o item";
           return redirect()->route('admin.minhas_postagens')->with('success',$mensagem); 
		}else{
            $mensagem = "Falha ao deletar o item";
         return redirect()->route('admin.minhas_postagens')->with('fail',$mensagem); 
        }		
		  
    }
}
