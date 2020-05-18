<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use File;
use Auth;

use App\Campanha;
use App\ImgCampanha;
use App\VideoCampanha;

class CampanhaController extends Controller
{
    public function index()
    {
        $campanhas = Campanha::all();


        // return $imagens;
        return view('admin.campanha.index', compact('campanhas'));
    }


    public function create()
    {
        return view('admin.campanha.add-edit');
    }

    public function store(Request $request)
    {
        $validar            =   $request->validate([
            'titulo'          =>  'required | max:30',
            'desc'          =>  'required | max:255',
            'imagem'        =>  'required',
            'video'        =>  'required ',

        ],[
            'titulo.required'     => 'Preencha o titulo do álbum',
            'titulo.max'          => 'Digite no máximo 30 caracteres no nome',
            'desc.required'     => 'Preencha a descrição do álbum',
            'desc.max'          => 'Digite no máximo 255 caracteres na descrição',
            'imagem.required'   => 'Adicione alguma imagem',
            'video.required'   => 'Adicione algum video',
        ]);

        // Nomeando as variaveis do request
        $titulo = $request['titulo'];
        $descricao = $request['desc'];


        // Adicionando o Album no banco
        $campanha            = new Campanha;
        $campanha->titulo    = $titulo;
        $campanha->desc = $descricao;
        $campanha->user_id   = Auth::id();
        $campanha->save();

        // Faz a verificação para entrar apenas duas vezes no loop
        $count = ( count($request->allFiles()['imagem']) < 2 )? 1 : 2;

        // Diretorio dos arquivos
        $destination_path = "upload_imagem/campanhas/".$campanha->id.'/';

        // ADICIONANDO IMAGEM
        // Fazendo o loop e entrando em cada imagem
        for($i = 0; $i < $count ;$i++){
            // arquivo e extensão
            $file1 = $request->allFiles()['imagem'][$i];
            $ex = $file1->extension();

            // Adicionando o Imagem no banco
            $imagem             = new ImgCampanha;
            $imagem->nome_img       = 'img_'.$i.'.'.$ex;
            $imagem->campanha_id  = $campanha->id;
            $imagem->save();

            // Comprimindo imagem
            $source_path = $request->File()['imagem'][$i];
            $quality = 6;
            $info = getimagesize($source_path);

            // Verifica qual o tipo de imagem
            if ($info['mime'] == 'image/jpeg') {
                $image = imagecreatefromjpeg($source_path);
            } elseif ($info['mime'] == 'image/jpg') {
                $image = imagecreatefromjpg($source_path);
            } elseif ($info['mime'] == 'image/png') {
                $image = imagecreatefrompng($source_path);
            } elseif ($info['mime'] == 'image/bmp') {
                $image = imagecreatefrombmp($source_path);
            }else{
                return back()->withErrors(['imagem'=>'Adicione arquivos com formato de imagem']);
            };

            // Verifica se existe esse diretorio
            if(!is_dir($destination_path)){
                mkdir($destination_path);
            }

            // Adiciona ao diretorio
            imagejpeg($image, $destination_path.$imagem->nome_img,20);
        }

        // ADICIONANDO VÍDEO
        if( isset($_FILES['video']) ){

            // arquivo e extensão
            $file2 = $request->allFiles()['video'];
            $ex = pathinfo($file2->getClientOriginalName(), PATHINFO_EXTENSION);

            // Adicionando o Imagem no banco
            $video             = new VideoCampanha;
            $video->nome_video   = 'video_'.bin2hex(random_bytes(2)).'.'.$ex;
            $video->campanha_id  = $campanha->id;
            $video->save();

            // Adiciona ao diretorio
            move_uploaded_file($_FILES['video']['tmp_name'],$destination_path.$video->nome_video);
        }

        /*Voltando para a pagina e listar campanhas*/
        $mensagem = 'Campanha cadastrada com Sucesso!';
        return redirect('/admin/campanha')->with('mensagem',$mensagem);
    }


    public function show($id)
    {
        // $album = DB::table('album_galerias');
        // return view('admin.galeria.show', compact('album'));
    }


    public function edit($id)
    {
        $campanha      = DB::table('campanhas')->where('id','=', $id)->first();
        return view('admin.campanha.add-edit', compact('campanha'));
    }


    public function update(Request $request, $id)
    {
        $validar            =   $request->validate([
            'titulo'        =>  'required | max:30',
            'desc'          =>  'required | max:255',

        ],[
            'titulo.required'     => 'Preencha o titulo do álbum',
            'titulo.max'          => 'Digite no máximo 30 caracteres no nome',
            'desc.required'     => 'Preencha a descrição do álbum',
            'desc.max'          => 'Digite no máximo 255 caracteres na descrição',
        ]);

        // Nomeando as variaveis do request
        $titulo = $request['titulo'];
        $descricao = $request['desc'];


        // Adicionando o Album no banco
        $campanha           = Campanha::where('id',$id)->first();
        $campanha->titulo   = $titulo;
        $campanha->desc     = $descricao;
        $campanha->user_id  = Auth::id();
        $campanha->save();



        // Diretorio dos arquivos
        $destination_path = "upload_imagem/campanhas/".$campanha->id.'/';

        // Verifica se existe arqivos no diretorio
        // $scan =scandir($destination_path);
        // for ($j=0; $j < count($scan); $j++) {
        //     $name_file = explode('.',$scan[$j]);

        //     if($name_file[0] == 'img_0' or $name_file[0] == 'img_1'){
        //         return "Já existe o limite de imagens para essa campanha!";
        //     }elseif ($name_file[0] == 'img_0'){
        //         $exist = 0;
        //     }elseif($name_file[0] == 'img_1'){
        //         $exist = 1;
        //     }else{
        //         $exist = 3;

        //     }

        // }
        // Verifica se enviou imagem
        if ( isset($request->allFiles()['imagem']) ) {
            // Faz a verificação para entrar apenas duas vezes no loop
            $count = ( count($request->allFiles()['imagem']) < 2 )? 1 : 2;

            // ADICIONANDO IMAGEM
            // Fazendo o loop e entrando em cada imagem
            for($i = 0; $i < $count ;$i++){
                // arquivo e extensão
                $file1 = $request->allFiles()['imagem'][$i];
                $ex = $file1->extension();

                // Adicionando o Imagem no banco
                $imagem             = new ImgCampanha;
                $imagem->nome_img       = 'img_'.$i.'.'.$ex;
                $imagem->campanha_id  = $campanha->id;
                $imagem->save();

                // Comprimindo imagem
                $source_path = $request->File()['imagem'][$i];
                $quality = 6;
                $info = getimagesize($source_path);

                // Verifica qual o tipo de imagem
                if ($info['mime'] == 'image/jpeg') {
                    $image = imagecreatefromjpeg($source_path);
                } elseif ($info['mime'] == 'image/jpg') {
                    $image = imagecreatefromjpg($source_path);
                } elseif ($info['mime'] == 'image/png') {
                    $image = imagecreatefrompng($source_path);
                } elseif ($info['mime'] == 'image/bmp') {
                    $image = imagecreatefrombmp($source_path);
                }else{
                    return back()->withErrors(['imagem'=>'Adicione arquivos com formato de imagem']);
                };

                // Verifica se existe esse diretorio
                if(!is_dir($destination_path)){
                    mkdir($destination_path);
                }

                // Adiciona ao diretorio
                imagejpeg($image, $destination_path.$imagem->nome_img,20);
            }
        }

        // ADICIONANDO VÍDEO
        if( isset($_FILES['video']) and $_FILES['video']['name'] != "" ){

            // arquivo e extensão
            $file2 = $request->allFiles()['video'];
            $ex = pathinfo($file2->getClientOriginalName(), PATHINFO_EXTENSION);

            // Adicionando o Imagem no banco
            $video             = new VideoCampanha;
            $video->nome_video   = 'video_'.bin2hex(random_bytes(2)).'.'.$ex;
            $video->campanha_id  = $campanha->id;
            $video->save();

            // Adiciona ao diretorio
            move_uploaded_file($_FILES['video']['tmp_name'],$destination_path.$video->nome_video);
        }

        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Campanha editada com Sucesso!';
        return redirect('/admin/campanha')->with('mensagem',$mensagem);
    }

    public function destroy($id)
    {
        // Consulta ata no banco
        $query1 = DB::table('campanhas')->where('id',$id);
        $query2 = DB::table('img_campanhas')->where('campanha_id',$id);
        $query3 = DB::table('video_campanhas')->where('campanha_id',$id);
        $campanha = $query1->get();
        $imagens= $query2->get();
        $video= $query3->get();

        // diretorio e nome
        $diretorio = "upload_imagem/campanhas/".$campanha[0]->id.'/';
        for($i = 0;$i < count($imagens);$i++ ){
            $nome_img = $imagens[$i]->nome_img;

            // Vê se existe a imagem para exclui-lo
            if (File::exists($diretorio.$nome_img)) {
                $f = File::delete($diretorio.$nome_img);
            }
        }
        // Vê se existe o video para exclui-lo
        if (File::exists($diretorio. $video[0]->nome_video)) {
            $f = File::delete($diretorio. $video[0]->nome_video);
        }

        // Vê se existe a pasta para exclui-lo
        if (is_dir($diretorio)) {
            $v = rmdir($diretorio);
        }

        // Deleta as tabelas e redireciona
        $query1->delete();
        $query2->delete();
        $query3->delete();
        $mensagem = 'Campanha excluida com Sucesso!';
        return redirect('/admin/campanha')->with('mensagem',$mensagem);
    }

    public function destroyImagem($id)
    {
        // Consulta ao banco
        $query = DB::table('img_campanhas')->where('id',$id);
        $imagem = $query->get();

        // diretorio e nome
        $diretorio = "upload_imagem/campanhas/".$imagem[0]->campanha_id.'/';
        $nome_img = $imagem[0]->nome_img;

        // Vê se existe a imagem para exclui-lo
        if (File::exists($diretorio.$nome_img)) {
            $f = File::delete($diretorio.$nome_img);
        }

        // Deleta a tabela e redireciona
        $query->delete();
        $mensagem = 'Imagem excluida com Sucesso!';
        return redirect('/admin/campanha/edit/'.$imagem[0]->campanha_id)->with('mensagem',$mensagem);
    }
    public function destroyVideo($id)
    {

        // Consulta ao banco
        $query = DB::table('video_campanhas')->where('id',$id);
        $video = $query->get();

        // diretorio e nome
        $diretorio = "upload_imagem/campanhas/".$video[0]->campanha_id.'/';
        $nome_video = $video[0]->nome_video;

        // Vê se existe a imagem para exclui-lo
        if (File::exists($diretorio.$nome_video)) {
            $f = File::delete($diretorio.$nome_video);
        }

        // Deleta a tabela e redireciona
        $query->delete();
        $mensagem = 'Vídeo excluido com Sucesso!';
        return redirect('/admin/campanha/edit/'.$video[0]->campanha_id)->with('mensagem',$mensagem);
    }
}
