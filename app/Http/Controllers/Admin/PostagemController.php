<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use File;
use App\Anexos_Pdf_Postagem;
use App\Contato;
use App\Postagem;
use App\User;

class PostagemController extends Controller
{
    public function index(){
        $posts = DB::table('postagens')->where('arquivada', 0)->paginate(8);
        $contato = Contato::where('visto', false)->get()->count();
        return  view('admin.postagens.index')->with(compact('posts','contato'));
   }

   public function create(){
       $contato = Contato::where('visto', false)->get()->count();
       return view('admin.postagens.add-edit')->with(compact('contato'));
   }

   public function store(Request $request){
    $validar = $request->validate([
        'titulo'    =>  'max:50 | unique:postagens,titulo',
        'imagem'    =>  'mimes:jpeg,jpg,png,bmp,svg | required',
        'descricao'    =>  'required',
        'categoria'    =>  'required',
    ],[
        'titulo.max' => 'Digite no máximo 50 caracteres neste campo',
    ]);
    //validação dos pdfs
    for($y=0;$y < 10;$y++){
        if( $request->file('pdf'.$y) != null){
            if($request->file('pdf'.$y)->extension() != 'pdf'){
                return back()->withErrors(['pdf'=>'O campo pdf deve conter arquivos do tipo pdf']);
            }
        }
    }

    // Adicionando dados, posteriormente irei adicionar os dados que estão "" caso tenham sido enviados
    $model = new Postagem;
    $model->titulo = $request['titulo'];
    $model->descricao = $request['descricao'];
    $model->link_yt = "";
    $model->imagem_principal = "";
    $model->categoria = intval($request['categoria']);
    $model->user_id = Auth::id();
    $model->save();

        //Adicionar imagem
       if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
           $imagem = $request->file()['imagem'];

           // Nome da imagem
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

        // validação do link
        if ($request['yt'] != "") {
            $url = explode("watch?v=", $request['yt']);

            // verificação do link copiado da url
            if(count($url) > 1){
                $embed = $url[0]."embed/".$url[1];
                $final = substr($embed, -17);
                if($final == '&feature=youtu.be'){
                    $embed = substr($embed, 0,-17);
                }

            // verificação do link copiado pelo compartilhar
            }else{
                $url = explode("https://youtu.be/", $request['yt']);
                if($url[0] !== '' ){
                    return back()->withErrors(['yt'=>'O link informado não é do youtube!']);
                }
                $embed = "https://www.youtube.com/embed/".$url[1];
            }
        }else{
            $embed = null;
        }

        // Adicionar o link do youtube no banco
         $model->link_yt = $embed;
         $model->save();

         // Arrumar um meio de ver quantos pdfs existem para fazer o foreach na sua quantidade
         $idPostagem = $model->id;
        for($i =0; $i < 10; $i++){
            $namePdf = 'pdf'.$i;
            if ($request->hasFile($namePdf) && $request->file($namePdf)->isValid()) {
                $pdf1 = $request->file()[$namePdf];
                $random = bin2hex(random_bytes(5));
                $srcPdf = "pdf".$random.".pdf";

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
       $query = Anexos_Pdf_Postagem::where('id_post',$id)->get();
       if( sizeof($query) > 0){
           $pdf = $query;
        }else{
            $pdf = null;
       }
       return view('admin.postagens.add-edit')->with(compact('postagem','pdf'));
    }

    public function update(Request $request, $id){
        $validar = $request->validate([
            'titulo'    =>  'max:50 | required',
            'imagem'    =>  'mimes:jpeg,jpg,png,bmp',
            'descricao'    =>  'required',
            'categoria'    =>  'required',
        ],[
            'titulo.max' => 'Digite no máximo 50 caracteres neste campo',
        ]);
        //validação do titulo
        $titulos = Postagem::all();
        foreach($titulos as $titulo){
            if( $request->titulo == $titulo->titulo and $titulo->id != $id){
                return back()->withErrors(['titulo'=>'O valor informado para o campo titulo já está em uso.']);
            }
        }
        //validação dos pdfs
        for($y=0;$y < 10;$y++){
            if( $request->file('pdf'.$y) != null){
                if($request->file('pdf'.$y)->extension() != 'pdf'){
                    return back()->withErrors(['pdf'=>'O campo pdf deve conter arquivos do tipo pdf']);
                }
            }
        }

        //consultando a postagem no banco
        $model = Postagem::where('id', $id)->first();

        //Alterar imagem
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imagem = $request->file()['imagem'];

            // Adicionar nome da imagem
            $ex = $request->file('imagem')->extension();
            $nomeImagem = "img.".$ex;

            // Adicionar imagem no diretorio
            $dir = "upload_imagem/postagens/".$id;
            $imagem->move($dir,$nomeImagem);
            $request->file()['imagem'] = $nomeImagem;

            // Adicionar o nome da imagem no banco
            $model->imagem_principal = $nomeImagem;
            // $model->save();
        }

        // validação do link
        if ($request['yt'] != "") {
            $url = explode("watch?v=", $request['yt']);

            // verificação do link copiado da url
            if(count($url) > 1){
                $embed = $url[0]."embed/".$url[1];
                $final = substr($embed, -17);
                if($final == '&feature=youtu.be'){
                    $embed = substr($embed, 0,-17);
                }

            // verificação do link copiado pelo compartilhar
            }else{
                $url = explode("https://youtu.be/", $request['yt']);
                if($url[0] !== '' ){
                    return back()->withErrors(['yt'=>'O link informado não é do youtube!']);
                }
                $embed = "https://www.youtube.com/embed/".$url[1];
            }
        }else{
            $embed = null;
        }

        // Adicionar o link do youtube no banco
        $model->link_yt = $embed;

        // Arrumar um meio de ver quantos pdfs existem para fazer o foreach na sua quantidade
        $idPostagem = $model->id;
        for($i =0; $i < 10; $i++){
            $namePdf = 'pdf'.$i;
            if ($request->hasFile($namePdf) && $request->file($namePdf)->isValid()) {
                $pdf1 = $request->file()[$namePdf];
                $random = bin2hex(random_bytes(5));
                $srcPdf = "pdf".$random.".pdf";

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

        // Editando postagem
        $post = Postagem::where('id', $id)
                    ->update([
                                'titulo'=>$request['titulo'],
                                'descricao'=>$request['descricao'],
                                'imagem_principal'=>$model->imagem_principal,
                                'link_yt'=>$embed,
                                'arquivada'=>$request['arquivada'],
                                'categoria'=>intval($request['categoria']),
                             ]);

        /*Voltando para a pagina de adicionar postagens*/
        $message = 'Postagem editada com Sucesso!';
        return back()->with('mensagem',$message);
    }

   public function destroy($id){
       $query = Postagem::where('id', $id)->first();
       unlink("upload_imagem/postagens/".$id.'/'.$query->imagem_principal);
       $resultado=  $query->delete();
       if ($resultado == true) {
           $mensagem = "Sucesso ao deletar o item";
          return redirect()->back()->with('mensagem',$mensagem);
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
           $mensagem = 'Postagem desarquivada com Sucesso!';
        }else{
            $post->update(['arquivada' => 1]);
            $mensagem = 'Postagem arquivada com Sucesso!';
        }

        return back()->with('mensagem',$mensagem);;
    }

    public function destroyPdf($id){
        // Pegando os dados do pdf no banco
        $query = Anexos_Pdf_Postagem::where('id', $id)->first();

        // Deletando pdf da pasta
        $ex = "upload_pdf/postagens/".$query->id_post.'/';
        if (File::exists($ex.$query['src_pdf'])) {
            File::delete($ex.$query['src_pdf']);
        }

        // Deletando pdf do banco
        $query->delete();

        // Redirecionando para a última pagina
        $mensagem = 'PDF apagado com Sucesso!';
        return back()->with('mensagem',$mensagem);
    }
}
