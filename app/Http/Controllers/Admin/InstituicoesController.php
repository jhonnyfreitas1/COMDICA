<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\iseet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use File;
use Auth;
use App\Instituicao;
use App\Img_inst;
use App\Galeria_inst;
use App\Video_inst;

class InstituicoesController extends Controller
{

    public function index()
    {
        $instituicoes = DB::table('instituicoes')->paginate(10);
                           // return $instituicoes;
        return view('admin.instituicao.index', compact('instituicoes'));
    }


    public function create()
    {
        return view('/admin/instituicao/add-edit');
    }


    public function store(Request $request)
    {
        /*Validando os dados*/
        $validar            =   $request->validate([
            'name'           => 'required | max:256',
            'email'          => 'required | max:256',
            'telefone'       => 'required | max:256',
            'site'           => 'max:256',
            'endereco'       => 'max:256',
            'img1'           => 'required',
            'img2'           => 'required',
            'desc'           => 'max:500',
        ],[
            'name.required' => 'Preencha o nome da instituição',
            'name.max'      => 'Digite no máximo 256 caracteres',
            'email.required' => 'Preencha o email da instituição',
            'email.max' => 'Digite no máximo 256 caracteres',
            'telefone.max' => 'Digite no máximo 25 caracteres',
            'telefone.required' => 'Preencha o telefone da instituição',
            'desc.max'      => 'Digite no máximo 500 caracteres',
            'endereco.max'      => 'Digite no máximo 256 caracteres',
            'site.max'      => 'Digite no máximo 256 caracteres',
            'img1.required' => 'Adicione a imagem principal da instituição',
            'img2.required' => 'Adicione a imagem secundária da instituição',
        ]);

        if( $request->file('imagens') != null ){
            if (count($request->file('imagens')) > 6){
                $quant = 6;
            }else{
                $quant = count($request->file('imagens'));
            }
        }


         // Verificando se são realmente imagens
        $extensoes = ['jpg','jpeg','png'];
        $resp = 0;
        if( $request->file('imagens') != null ){
            for ($i=0; $i < $quant; $i++) {
                if($request->file('imagens')[$i] != NULL){
                    $ex[] = strtolower($request->file('imagens')[$i]->extension());
                    // return $ex;
                    for($c = 0; sizeof($extensoes) > $c; $c++){
                        if ($ex[$i] == $extensoes[$c]) {
                            $resp++;
                        }
                    }
                    if($resp == 0){
                        $mensagemExtensao = "Você adicionou algum arquivo que não é imagem no campo imagens!";
                        return redirect('admin/instituicoes/create')->with('danger',$mensagemExtensao);
                    }
                }
            }
        }

        /*Adicionando instituição*/
        $instituicao = new Instituicao;
        $instituicao->name = $request->name == null ? '' : $request->name;
        $instituicao->desc = $request->desc == null ? '' : $request->desc;
        $instituicao->telefone = $request->telefone == null ? '' : $request->telefone ;
        $instituicao->endereco = $request->endereco == null ? '' : $request->endereco;
        $instituicao->email = $request->email == null ? '' : $request->email;
        $instituicao->site = $request->site == null ? '' : $request->site;
        $instituicao->user_id =  Auth::id();
        $instituicao->save();

        // diretorio
        $dir = "upload_imagem/instituicoes/".$instituicao->id."/";

        // ADICIONANDO IMG1 e IMG2
        if( isset($_FILES['img1']) and $_FILES['img1']['name'] != "" and isset($_FILES['img2']) and $_FILES['img2']['name']){
            $ex1 = strtolower($request->file('img1')->extension());
            $ex2 = strtolower($request->file('img2')->extension());
            $nomeImagem1 = 'img1.'.$ex1;
            $nomeImagem2 = 'img2.'.$ex2;

            /*Adicionando imagens vazio para depois adicionar os nomes verdadeiros*/
            $galeria = new Galeria_inst;
            $galeria->img1 = $nomeImagem1;
            $galeria->img2 = $nomeImagem2;
            $galeria->instituicao_id = $instituicao->id;
            $galeria->save();

            /*Movendo o arquivo no diretorio*/
            $img1 = $request->file('img1');
            $img1->move($dir,$nomeImagem1);
            $img2 = $request->file('img2');
            $img2->move($dir,$nomeImagem2);
        }elseif(isset($_FILES['img1']) and $_FILES['img1']['name'] != ""){
            return '2';
            $ex1 = strtolower($request->file('img1')->extension());
            $nomeImagem1 = 'img1.'.$ex1;

            /*Adicionando imagens vazio para depois adicionar os nomes verdadeiros*/
            $galeria = new Galeria_inst;
            $galeria->img1 = $nomeImagem1;
            $galeria->img2 = null;
            $galeria->instituicao_id = $instituicao->id;
            $galeria->save();

            /*Movendo o arquivo no diretorio*/
            $img1 = $request->file('img1');
            $img1->move($dir,$nomeImagem1);
        }elseif(isset($_FILES['img2']) and $_FILES['img2']['name'] != ""){
            $ex2 = strtolower($request->file('img2')->extension());
            $nomeImagem2 = 'img2.'.$ex2;

            /*Adicionando imagens vazio para depois adicionar os nomes verdadeiros*/
            $galeria = new Galeria_inst;
            $galeria->img1 = null;
            $galeria->img2 = $nomeImagem2;
            $galeria->instituicao_id = $instituicao->id;
            $galeria->save();

            /*Movendo o arquivo no diretorio*/
            $img2 = $request->file('img2');
            $img2->move($dir,$nomeImagem2);
        }else{
            /*Adicionando imagens vazio para depois adicionar os nomes verdadeiros*/
            $galeria = new Galeria_inst;
            $galeria->img1 = null;
            $galeria->img2 = null;
            $galeria->instituicao_id = $instituicao->id;
            $galeria->save();
        }

        // Guardando as imagens
        if( $request->file('imagens') != null ){
            for ($i=0; $i < $quant ; $i++) {
                $nomeImagem = 'img_'.bin2hex(random_bytes(2)).'.'.$ex[$i];

                /*Adicionando imagens vazio para depois adicionar os nomes verdadeiros*/
                $images = new Img_inst;
                $images->nome = $nomeImagem;
                $images->galeria_id = $galeria->gal_id;
                $images->save();

                /*Movendo o arquivo no diretorio*/
                $img = $request->file('imagens')[$i];
                $img->move($dir,$nomeImagem);
            };
        };

        // ADICIONANDO VÍDEO
        if( isset($_FILES['video']) and $_FILES['video']['name'] != "" ){

            // arquivo e extensão
            $file = $request->allFiles()['video'];
            $ex = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

            // Nome do Vídeo
            $nomeVideo   = 'video.'.$ex;
            $destination_path_video = "upload_video/instituicoes/".$galeria->gal_id."/";

            /*Adicionando Video*/
            $video = new Video_inst;
            $video->nome = $nomeVideo;
            $video->galeria_id = $galeria->gal_id;
            $video->save();

            // cria o diretorio caso não exista
            if (!is_dir($destination_path_video)) {
                mkdir($destination_path_video);
            }

            // Adiciona ao diretorio
            move_uploaded_file($_FILES['video']['tmp_name'],$destination_path_video.$nomeVideo);
        }

        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Instituição cadastrada com Sucesso!';
        return redirect('/admin/instituicoes')->with('mensagem',$mensagem);

    }

    public function show($id)
    {
        // $instituicao = DB::table('instituicoes')
        //                    ->join('imgs_insts', 'instituicoes.inst_img','imgs_insts.img_id')
        //                    ->where('id',$id)->get();
        // return view('/admin/instituicao/show', compact('instituicao'));
    }


    public function edit($id)
    {
        $instituicoes = Instituicao::where('id','=', $id)->first();
        $galeria = Galeria_inst::where('instituicao_id','=', $id)->first();
        $imagens = Img_inst::where('galeria_id','=', $galeria->gal_id)->get();
        $video = Video_inst::where('galeria_id','=', $galeria->gal_id)->first();
        return view('/admin/instituicao/add-edit', compact('instituicoes','galeria','imagens','video'));
    }


    public function update(Request $request, $id)
    {
        /*Validando os dados*/
        $validar            =   $request->validate([
            'name'           => 'required | max:256',
            'email'          => 'required | max:256',
            'telefone'       => 'required | max:256',
            'desc'           => 'max:500',
            'endereco'       => 'max:256',
            'site'           => 'max:256',
        ],[
            'name.required' => 'Preencha o nome da instituição',
            'name.max'      => 'Digite no máximo 256 caracteres',
            'email.required' => 'Preencha o email da instituição',
            'email.max' => 'Digite no máximo 256 caracteres',
            'telefone.max' => 'Digite no máximo 25 caracteres',
            'telefone.required' => 'Preencha o telefone da instituição',
            'desc.max'      => 'Digite no máximo 500 caracteres',
            'endereco.max'      => 'Digite no máximo 256 caracteres',
            'site.max'      => 'Digite no máximo 256 caracteres',
        ]);

        // Verificando quantidade de imagens
        if( $request->file('imagens') != null ){
            if (count($request->file('imagens')) > 6){
                $quant = 6;
            }else{
                $quant = count($request->file('imagens'));
            }
        }


        // Verificando se são realmente imagens
        $extensoes = ['jpg','jpeg','png'];
        $resp = 0;
        if( $request->file('imagens') != null ){
            for ($i=0; $i < $quant; $i++) {
                if($request->file('imagens')[$i] != NULL){
                    $ex[] = strtolower($request->file('imagens')[$i]->extension());
                    // return $ex;
                    for($c = 0; sizeof($extensoes) > $c; $c++){
                        if ($ex[$i] == $extensoes[$c]) {
                            $resp++;
                        }
                    }
                    if($resp == 0){
                        $mensagemExtensao = "Você adicionou algum arquivo que não é imagem no campo imagens!";
                        return redirect('admin/instituicoes/create')->with('danger',$mensagemExtensao);
                    }
                }
            }
        }

        /*Adicionando instituição*/
        $instituicao = Instituicao::where('id',$id)->first();
        $instituicao->name      = $request->name == null ?  $instituicao->name : $request->name;
        $instituicao->desc      = $request->desc == null ?  $instituicao->desc : $request->desc;
        $instituicao->telefone  = $request->telefone == null ? $instituicao->telefone : $request->telefone ;

       if($request->endereco == null){
            if($instituicao->endereco !== null){
                $instituicao->endereco = $instituicao->endereco;
            }else{
                $instituicao->endereco = null;
            }
        }else{
            $instituicao->endereco = $request->endereco;
        }


        $instituicao->email     = $request->email == null ? $instituicao->email : $request->email;
        $instituicao->site      = $request->site == null ? $instituicao->site : $request->site;
        $instituicao->user_id   =  $instituicao->user_id;
        $instituicao->save();

        // diretorio
        $dir = "upload_imagem/instituicoes/".$instituicao->id."/";

        // ADICIONANDO IMG1 e IMG2
        $galeria = Galeria_inst::where('instituicao_id',$id)->first();
        if( isset($_FILES['img1']) and $_FILES['img1']['name'] != "" and isset($_FILES['img2']) and $_FILES['img2']['name']){
            $ex1 = strtolower($request->file('img1')->extension());
            $ex2 = strtolower($request->file('img2')->extension());
            $nomeImagem1 = 'img1.'.$ex1;
            $nomeImagem2 = 'img2.'.$ex2;

            /*Adicionando imagens vazio para depois adicionar os nomes verdadeiros*/
            $galeria->img1 = $nomeImagem1;
            $galeria->img2 = $nomeImagem2;
            $galeria->save();

            /*Movendo o arquivo no diretorio*/
            $img1 = $request->file('img1');
            $img1->move($dir,$nomeImagem1);
            $img2 = $request->file('img2');
            $img2->move($dir,$nomeImagem2);
        }elseif(isset($_FILES['img1']) and $_FILES['img1']['name'] != ""){
            $ex1 = strtolower($request->file('img1')->extension());
            $nomeImagem1 = 'img1.'.$ex1;

            /*Adicionando imagens vazio para depois adicionar os nomes verdadeiros*/
            $galeria->img1 = $nomeImagem1;
            $galeria->save();

            /*Movendo o arquivo no diretorio*/
            $img1 = $request->file('img1');
            $img1->move($dir,$nomeImagem1);
        }elseif(isset($_FILES['img2']) and $_FILES['img2']['name'] != ""){
            $ex2 = strtolower($request->file('img2')->extension());
            $nomeImagem2 = 'img2.'.$ex2;

            /*Adicionando imagens vazio para depois adicionar os nomes verdadeiros*/
            $galeria->img2 = $nomeImagem2;
            $galeria->save();

            /*Movendo o arquivo no diretorio*/
            $img2 = $request->file('img2');
            $img2->move($dir,$nomeImagem2);
        }


        // ADICIONANDO VÍDEO
        if( isset($_FILES['video']) and $_FILES['video']['name'] != "" ){

            // arquivo e extensão
            $file = $request->allFiles()['video'];
            $ex = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

            // Nome do Vídeo
            $nomeVideo   = 'video.'.$ex;
            $destination_path_video = "upload_video/instituicoes/".$galeria->gal_id."/";

            // return $nomeVideo;
            /*Adicionando Video*/
            $video = Video_inst::where('galeria_id',$galeria->gal_id)->get();
            if( count($video) > 0 ){
                $video[0]->nome = $nomeVideo;
                $video[0]->galeria_id = $galeria->gal_id;
                $video[0]->save();
            }else{
                $video = new Video_inst;
                $video->nome = $nomeVideo;
                $video->galeria_id = $galeria->gal_id;
                $video->save();
            }


            // cria o diretorio caso não exista
            if (!is_dir($destination_path_video)) {
                mkdir($destination_path_video);
            }

            // Adiciona ao diretorio
            move_uploaded_file($_FILES['video']['tmp_name'],$destination_path_video.$nomeVideo);
        }


        // Guardando as imagens
        if( $request->file('imagens') != null ){

            $images = Img_inst::where('galeria_id',$galeria->gal_id)->get();
            if(count($images) >= 6){
                return back()->withErrors(['imagens'=>'Não foi possível adicionar mais imagens, pois já excedeu o limite de imagens para essa instituição!']);
            }else{
                $quantRequest = count($request->file('imagens'));
                $quant = count($images);
                for ($i=0; $i < $quantRequest ; $i++) {
                    $nomeImagem = 'img_'.bin2hex(random_bytes(2)).'.'.$ex[$i];

                    /*Adicionando imagens vazio para depois adicionar os nomes verdadeiros*/
                    $images = new Img_inst;
                    $images->nome = $nomeImagem;
                    $images->galeria_id = $galeria->gal_id;
                    $images->save();

                    /*Movendo o arquivo no diretorio*/
                    $img = $request->file('imagens')[$i];
                    $img->move($dir,$nomeImagem);
                    $quant++;
                    if($quant >= 6){
                        return back()->withErrors(['imagens'=>'Não foi possível adicionar todas as imagens, pois excedeu o limite de imagens para essa instituição. Entretanto adicionamos a quantidade possível!']);
                    }
                }
            }
        }

        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Instituição cadastrada com Sucesso!';
        return redirect('/admin/instituicoes')->with('mensagem',$mensagem);
    }

    public function destroy($id)
    {
        // Consultando as tabelas
        $inst = Instituicao::where('id',$id)->first();
        $galeria = Galeria_inst::where('instituicao_id',$id)->first();
        $imagens = Img_inst::where('galeria_id',$galeria->gal_id)->get();
        $video = Video_inst::where('galeria_id',$galeria->gal_id)->first();

        // extensões
        $ex = "upload_imagem/instituicoes/".$inst->id.'/';
        $exV = "upload_video/instituicoes/".$inst->id.'/';

        // Vê se existe a imagens para exclui-las
         for ($i=0; $i < count($imagens) ; $i++) {
            if (File::exists($ex.$imagens[$i]->nome)) {
                File::delete($ex.$imagens[$i]->nome);
            }
        }

        // Vê se existe video para exclui-lá
        if($video !== null){
            if (File::exists($exV.$video->nome)) {
                File::delete($exV.$video->nome);
            }
        }

        // Vê se existe a img1 para exclui-lá
        if (File::exists($ex.$galeria->img1)) {
            File::delete($ex.$galeria->img1);
        }
        // Vê se existe a img2 para exclui-lá
        if (File::exists($ex.$galeria->img2)) {
            File::delete($ex.$galeria->img2);
        }

        // Vê se existe o diretório de imagem para exclui-lo
        if (File::exists($ex)) {
            rmdir($ex);
        }
        // Vê se existe o diretório do video para exclui-lo
        if (File::exists($exV)) {
            rmdir($exV);
        }

        // Deleta as tabelas e redireciona
        $inst->delete();
        $mensagem = 'Instituição excluida com Sucesso!';
        return redirect('/admin/instituicoes')->with('mensagem',$mensagem);
    }
    public function destroyImagem($id){
        $imagem = Img_inst::where('img_id',$id)->first();
        $id_gal = $imagem->galeria_id;
        $ex = "upload_imagem/instituicoes/".$id_gal.'/';

        if (File::exists($ex.$imagem->nome)) {
            File::delete($ex.$imagem->nome);
        }

        $imagem->delete();
        $mensagem = 'Imagem excluida com Sucesso!';
        return redirect('/admin/instituicoes/edit/'.$id_gal)->with('mensagem',$mensagem);
    }
    public function destroyVideo($id)
    {
        $video = Video_inst::where('video_id',$id)->first();
        $id_gal = $video->galeria_id;
        $ex = "upload_video/instituicoes/".$id_gal.'/';

        if (File::exists($ex.$video->nome)) {
            File::delete($ex.$video->nome);
        }

        $video->delete();
        $mensagem = 'Vídeo excluida com Sucesso!';
        return redirect('/admin/instituicoes/edit/'.$id_gal)->with('mensagem',$mensagem);
    }

}
