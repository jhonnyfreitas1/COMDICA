<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('admin.index');
    }
    public function create()
    {
        //
    }
    public function nova_postagem()
    {
        return view('admin.nova_postagem');
    }

     public function doacoes_boleto()
    {
         $doacoes = DB::table('doacao_boleto')->paginate(10);

        return view('admin.doacoes')->with(compact('doacoes'));
    }

    public function minhas_postagens()
    {

         $posts = DB::table('postagens')->where('user_id',Auth::id())->paginate(8);
    
         return   view('admin.minhas_postagens')->with(compact('posts'));
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
                    $numero = rand(11111,99999).$data;
                    $diretorio = "upload_pdf";
                    $nomepdf2 = "pdf_".$numero.".pdf"; 
                    $pdf2->move($diretorio,$nomepdf);
                    $request->file()['pdf2'] = $nomepdf;
                }else{
                    $nomepdf2 = null;
                }
                
                if ($request['yt'] != "") {
                    $url = explode("watch?v=", $request['yt']);
                    $embed = $url[0]."embed/".$url[1];
                }

       $resultado =  DB::table('postagens')->insert([
            'titulo' => $request['titulo'],
            'descricao' => $request['descricao'],
            'link_yt'  => $embed,
            'imagem_principal' => $nomeImagem,
            'pdf1' => $nomepdf,
            'pdf2' => $nomepdf2,
            'user_id' => Auth::id()
        ]);

        if ($resultado == true) {
            return 'Postagem feita com sucesso';

        }else {
            return 'Falha ao fazer postagem, tente novamente.';
        }
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {   
        $query = DB::table('postagens')->where('id', '=', $id);
        $image = $query->first();
        // File::delete(public_path() . '/upload_imagem/'.$image->imagem_principal);
        $resultado=  $query->delete();
    
        if ($resultado == true) {
            $mensagem = "Sucesso ao deletar o item";
            redirect()->route('minhas_postagens')->with('success',$mensagem); 
		}else{
            $mensagem = "Falha ao deletar o item";
        }		
		return $mensagem;   
    }
}
