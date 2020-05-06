<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use File;
use Auth;

use App\AlbumGaleria;
use App\ImgAlbumGaleria;

class GaleriaController extends Controller
{
    public function index()
    {
        $albuns = DB::table('album_galerias')->paginate(10);
        return view('admin.galeria.index', compact('albuns'));
    }


    public function create()
    {
        return view('admin.galeria.add-edit');
    }

    public function store(Request $request)
    {
        $validar            =   $request->validate([
            'titulo'          =>  'required | max:30',
            'desc'          =>  'required | max:255',
            'images'        =>  'required',
            'images'        =>  'required ',

        ],[
            'titulo.required'     => 'Preencha o titulo do álbum',
            'titulo.max'          => 'Digite no máximo 30 caracteres no nome',
            'desc.required'     => 'Preencha a descrição do álbum',
            'desc.max'          => 'Digite no máximo 255 caracteres na descrição',
            'images.required'   => 'Adicione alguma imagem',
        ]);

        // Nomeando as variaveis do request
        $titulo = $request['titulo'];
        $descricao = $request['desc'];


        // Adicionando o Album no banco
        $album            = new AlbumGaleria;
        $album->titulo    = $titulo;
        $album->descricao = $descricao;
        $album->user_id   = Auth::id();
        $album->save();

        // Fazendo o loop e entrando em cada imagem
        for($i = 0; $i < count($request->allFiles()['images']);$i++){
            // arquivo e extensão
            $file = $request->allFiles()['images'][$i];
            $ex = $file->extension();

            // Adicionando o Imagem no banco
            $imagem             = new ImgAlbumGaleria;
            $imagem->nome       = 'img_'.bin2hex(random_bytes(2)).'.'.$ex;
            $imagem->album_id  = $album->id;
            $imagem->save();

            // Comprimindo imagem
            $source_path = $request->File()['images'][$i];
            $destination_path = "upload_imagem/albuns/".$album->id.'/';
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
                return back()->withErrors(['images'=>'Adicione arquivos com formato de imagem']);
            };

            // Verifica se existe esse diretorio
            if(!is_dir($destination_path)){
                mkdir($destination_path);
            }

            // Adiciona ao diretorio
            imagejpeg($image, $destination_path.$imagem->nome,1);
        }

        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Album cadastrado com Sucesso!';
        return redirect('/admin/galeria')->with('mensagem',$mensagem);
    }


    public function show($id)
    {
        $album = DB::table('album_galerias');
        return view('admin.galeria.show', compact('album'));
    }


    public function edit($id)
    {
        $album      = DB::table('album_galerias')->where('id','=', $id)->first();
        $imagens    = DB::table('img_album_galerias')->where('album_id','=', $id)->get();
        return view('admin.galeria.add-edit', compact('album','imagens'));
    }


    public function update(Request $request, $id)
    {
        $validar            =   $request->validate([
            'titulo'        =>  'required | max:30',
            'desc'          =>  'required | max:255',
            'images'        =>  'required',

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
        $album            = AlbumGaleria::where('id',$id)->first();
        $album->titulo    = $titulo;
        $album->descricao = $descricao;
        $album->user_id   = Auth::id();
        $album->save();

        // Fazendo o loop e entrando em cada imagem
        for($i = 0; $i < count($request->allFiles()['images']);$i++){
            $file = $request->allFiles()['images'][$i];

            // Verificando se é uma imagem
            $nameEx = ['jpeg','jpg','png','bmp','svg'];
            $ex = $file->extension();
            $c=0;
            for($j = 0; $j < count($nameEx); $j++){
                if($nameEx[$j] == $ex){
                    $c++;
                }
            }
            if($c == 0){
                return back()->withErrors(['images'=>'Adicione arquivos com formato de imagem']);
            }

            // Adicionando o Imagem no banco
            $imagem             = new ImgAlbumGaleria;
            $imagem->nome       = 'img_'.bin2hex(random_bytes(2)).'.'.$ex;
            $imagem->album_id  = $album->id;
            $imagem->save();

            // Adicionar imagem no diretorio
            $diretorio = "upload_imagem/albuns/".$album->id;
            $file->move($diretorio,$imagem->nome);
        }

        /*Voltando para a galeria */
        $mensagem = 'Album cadastrada com Sucesso!';
        return redirect('/admin/galeria')->with('mensagem',$mensagem);
    }

    public function destroy($id)
    {
        // Consulta ata no banco
        $query1 = DB::table('album_galerias')->where('id',$id);
        $query2 = DB::table('img_album_galerias')->where('album_id',$id);
        $galeria = $query1->get();
        $imagens= $query2->get();

        // diretorio e nome
        $diretorio = "upload_imagem/albuns/".$galeria[0]->id.'/';
        for($i = 0;$i < count($imagens);$i++ ){
            $nome_img = $imagens[$i]->nome;


            // Vê se existe a imagem para exclui-lo
            if (File::exists($diretorio.$nome_img)) {
                $f = File::delete($diretorio.$nome_img);
            }
        }
        // Vê se existe a pasta para exclui-lo
        if (is_dir($diretorio)) {
            $v = rmdir($diretorio);
        }

        // Deleta as tabelas e redireciona
        $query1->delete();
        $query2->delete();
        $mensagem = 'Album excluida com Sucesso!';
        return redirect('/admin/galeria')->with('mensagem',$mensagem);
    }

    public function destroyImagem($id)
    {

        // Consulta ao banco
        $query = DB::table('img_album_galerias')->where('id',$id);
        $imagem = $query->get();

        // diretorio e nome
        $diretorio = "upload_imagem/albuns/".$imagem[0]->album_id.'/';
        $nome_img = $imagem[0]->nome;

        // Vê se existe a imagem para exclui-lo
        if (File::exists($diretorio.$nome_img)) {
            $f = File::delete($diretorio.$nome_img);
        }

        // Deleta a tabela e redireciona
        $query->delete();
        $mensagem = 'Imagem excluida com Sucesso!';
        return redirect('/admin/galeria/edit/'.$imagem[0]->album_id)->with('mensagem',$mensagem);
    }
}
