<?php

namespace App\Http\Controllers;

use Auth;
use App\Anexos_Pdf_Postagem;
use App\Contato;
use App\Postagem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostagemController extends Controller
{
    public function index(){
        $posts = DB::table('postagens')->paginate(8);
        $contato = Contato::where('visto', false)->get()->count();
        return  view('admin.postagens.index')->with(compact('posts','contato'));
   }

   public function create(){
       $contato = Contato::where('visto', false)->get()->count();
       return view('admin.postagens.add')->with(compact('contato'));
   }

   public function store(Request $request){
    $validar = $request->validate([
        'titulo'    =>  'max:50 | unique:postagens,titulo',
        'imagem'    =>  'mimes:jpeg,jpg,png,bmp | required',
    ],[
        // 'titulo.unique'      => 'Já existe uma postagem com este nome',
        'titulo.max' => 'Digite no máximo 50 caracteres neste campo',
    ]);
    // return $request->file('pdf0')->extension();
    for($y=0;$y < 10;$y++){
        if( $request->file('pdf'.$y) != null){
            if($request->file('pdf'.$y)->extension() != 'pdf'){
                return back()->withErrors(['pdf'=>'O campo pdf deve conter arquivos do tipo pdf']);
            }
        }
    }
       $model = new Postagem;
       $model->titulo = $request['titulo'];
       $model->descricao = $request['descricao'];
       $model->link_yt = "";
       $model->imagem_principal = "";
       $model->categoria = intval($request['categoria']);
       $model->user_id = Auth::id();
       $model->save();

       if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
           $imagem = $request->file()['imagem'];

           $ex = $request->file('imagem')->extension();
           $nomeImagem = "img.".$ex;

           // Adicionar imagem no diretorio
           $dir = "upload_imagem/postagens/".$model->id;
           $imagem->move($dir,$nomeImagem);
           $request->file()['imagem'] = $nomeImagem;

           // Adicionar o nome da imagem no banco
           $model->imagem_principal = $nomeImagem;
           $model->save();
        }


        if ($request['yt'] != "") {
            $url = explode("watch?v=", $request['yt']);
            $embed = $url[0]."embed/".$url[1];

        }else{
            $embed = null;
        }
        // Adicionar o link do youtube no banco
         $model->link_yt = $embed;
         $model->save();

        $idPostagem = $model->id;
        $anexosPdf = [];

        // Arrumar um meio de ver quantos pdfs existem para fazer o foreach na sua quantidade
        for($i =0; $i < 10; $i++){
            $namePdf = 'pdf'.$i;
            if ($request->hasFile($namePdf) && $request->file($namePdf)->isValid()) {
                $pdf1 = $request->file()[$namePdf];
                $random = bin2hex(random_bytes(5));
                $srcPdf = "pdf".$random.".pdf";
                // $request->file()['pdf'] = $srcPdf;
                // return $model->id;
                // Adiciona pdf no banco
                $modelAnexo = new Anexos_Pdf_Postagem;
                $modelAnexo->nome_pdf =$request['name_pdf'.$i];
                $modelAnexo->src_pdf =$srcPdf;
                $modelAnexo->id_post= intval($model->id);
                $modelAnexo->save();

                // Adicionar pdf no diretorio
                $diretorio = "upload_pdf/postagens/".$model->id;
                $pdf1->move($diretorio,$modelAnexo->src_pdf);
            }
        }
        /*Voltando para a pagina de adicionar postagens*/
        $message = 'Postagem cadastrada com Sucesso!';
        return redirect('/admin/postagens/create')->with('mensagem',$message);
    }

    public function edit($id){
       $postagem = Postagem::find($id);
       return view('admin.postagens.edit_postagem')->with(compact('postagem'));
    }

   public function update(){
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
   public function destroy($id){
       $query = Postagem::where('id', $id)->first();
       unlink("upload_imagem/".$query->imagem_principal);
       $resultado=  $query->delete();
       if ($resultado == true) {
           $mensagem = "Sucesso ao deletar o item";
          return redirect()->back()->with('success',$mensagem);
       }else{
           $mensagem = "Falha ao deletar o item";
        return redirect()->back()->with('fail',$mensagem);
       }
   }

    public function minhas_postagens(){
        $posts = DB::table('postagens')->where('user_id',Auth::id())->paginate(8);
        $contato = Contato::where('visto', false)->get()->count();
        return  view('admin.postagens.minhas_postagens')->with(compact('posts','contato'));
   }

   public function arquivadas(){
       $posts = DB::table('postagens')->where('arquivada', true)->paginate(8);
       $contato = Contato::where('visto', false)->get()->count();
       return  view('admin.postagens.index')->with(compact('posts','contato'));
   }
   public function arquivar($id){
       $post = Postagem::where('id', $id)->first();

        // Arquivando ou desarquivando a postagem
        if($post->arquivada == 1){
            $post->update(['arquivada' => 0]);
        }else{
            $post->update(['arquivada' => 1]);
        }

        return back();
   }
}
