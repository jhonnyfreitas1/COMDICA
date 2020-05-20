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
        $campanhas = Campanha::orderBy('id', 'DESC')->get();

        return view('admin.campanha.index', compact('campanhas'));
    }


    public function create()
    {
        return view('admin.campanha.add-edit');
    }

    public function store(Request $request)
    {
        // return $_FILES['pdf'];
        $validar            =   $request->validate([
            'titulo'          =>  'required | max:30',
            'desc'          =>  'required | max:255',
            'imagem'        =>  'required',

        ],[
            'titulo.required'     => 'Preencha o titulo do álbum',
            'titulo.max'          => 'Digite no máximo 30 caracteres no nome',
            'desc.required'     => 'Preencha a descrição do álbum',
            'desc.max'          => 'Digite no máximo 255 caracteres na descrição',
            'imagem.required'   => 'Adicione alguma imagem',
        ]);

        // Nomeando as variaveis do request
        $titulo = $request['titulo'];
        $descricao = $request['desc'];


        // Adicionando o Album no banco
        $campanha            = new Campanha;
        $campanha->titulo    = $titulo;
        $campanha->desc = $descricao;
        $campanha->user_id   = Auth::id();
        // salvando fake para depois alterar
        $campanha->imagem   = '';
        $campanha->video   = '';
        $campanha->pdf   = '';
        $campanha->save();

        // Diretorio dos arquivos
        $destination_path = "upload_imagem/campanhas/".$campanha->id.'/';
        $destination_path_video = "upload_video/campanhas/".$campanha->id.'/';
        $destination_path_pdf = "upload_pdf/campanhas/".$campanha->id.'/';

        // ADICIONANDO IMAGEM
        if( isset($_FILES['imagem']) and $_FILES['imagem']['name'] != "" ){

            // arquivo e extensão
            $file1 = $request->allFiles()['imagem'];
            $ex = $file1->extension();

            // Nome da Imagem
            $nomeImagem     = 'img.'.$ex;

            // Comprimindo imagem
            $source_path = $request->File()['imagem'];
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
            imagejpeg($image, $destination_path.$nomeImagem,20);
        }

        // ADICIONANDO VÍDEO
        if( isset($_FILES['video']) and $_FILES['video']['name'] != "" ){

            // arquivo e extensão
            $file2 = $request->allFiles()['video'];
            $ex = pathinfo($file2->getClientOriginalName(), PATHINFO_EXTENSION);

            // Nome do Vídeo
            $nomeVideo   = 'video.'.$ex;

            // Verifica se existe esse diretorio
            if(!is_dir($destination_path_video)){
                mkdir($destination_path_video);
            }

            // Adiciona ao diretorio
            move_uploaded_file($_FILES['video']['tmp_name'],$destination_path_video.$nomeVideo);
        }


        // ADICIONANDO PDF
        if( isset($_FILES['pdf']) and $_FILES['pdf']['name'] != "" ){

            // Verifica se existe esse diretorio
            if(!is_dir($destination_path_pdf)){
                mkdir($destination_path_pdf);
            }

            // Adicionar pdf no diretorio
            $nomePdf = 'pdf.pdf';
            $request->file()['pdf']->move($destination_path_pdf,$nomePdf);
        }

        // Alterando dados que foram salvos
        $campanha->imagem   = isset($nomeImagem)? $nomeImagem : '';
        $campanha->video   = isset($nomeVideo)? $nomeVideo : '';
        $campanha->pdf   = isset($nomePdf)? $nomePdf : '';
        $campanha->save();


        /*Voltando para a pagina e listar campanhas*/
        $mensagem = 'Campanha cadastrada com Sucesso!';
        return redirect('/admin/campanha')->with('mensagem',$mensagem);
    }


    // public function show($id)
    // {
    //     $campanhas = Campanha::all();
    //     return view('admin.campanha.index', compact('campanhas'));
    // }


    public function edit($id)
    {
       $campanha      = Campanha::where('id','=', $id)->first();
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
        $campanha->user_id  = $campanha->user_id;
        // salvando fake para depois alterar
        $campanha->imagem   = '';
        $campanha->video   = '';
        $campanha->pdf   = '';
        $campanha->save();

        // Diretorio dos arquivos
        $destination_path = "upload_imagem/campanhas/".$campanha->id.'/';
        $destination_path_video = "upload_video/campanhas/".$campanha->id.'/';
        $destination_path_pdf = "upload_pdf/campanhas/".$campanha->id.'/';

        // ADICIONANDO IMAGEM
        if( isset($_FILES['imagem']) and $_FILES['imagem']['name'] != "" ){

            // arquivo e extensão
            $file1 = $request->allFiles()['imagem'];
            $ex = $file1->extension();

            // Nome da Imagem
            $nomeImagem     = 'img.'.$ex;

            // Comprimindo imagem
            $source_path = $request->File()['imagem'];
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
            imagejpeg($image, $destination_path.$nomeImagem,20);
        }

        // ADICIONANDO VÍDEO
        if( isset($_FILES['video']) and $_FILES['video']['name'] != "" ){

            // arquivo e extensão
            $file2 = $request->allFiles()['video'];
            $ex = pathinfo($file2->getClientOriginalName(), PATHINFO_EXTENSION);

            // Nome do Vídeo
            $nomeVideo   = 'video.'.$ex;

            // Adiciona ao diretorio
            move_uploaded_file($_FILES['video']['tmp_name'],$destination_path_video.$nomeVideo);
        }


        // ADICIONANDO PDF
        if( isset($_FILES['pdf']) and $_FILES['pdf']['name'] != "" ){
            // Adicionar pdf no diretorio
            $nomePdf = 'pdf.pdf';
            $request->file()['pdf']->move($destination_path_pdf,$nomePdf);
        }

        // Alterando dados que foram salvos
        $campanha->imagem   = isset($nomeImagem)? $nomeImagem : '';
        $campanha->video   = isset($nomeVideo)? $nomeVideo : '';
        $campanha->pdf   = isset($nomePdf)? $nomePdf : '';
        $campanha->save();

        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Campanha editada com Sucesso!';
        return redirect('/admin/campanha')->with('mensagem',$mensagem);
    }

    public function destroy($id)
    {
        // Consulta ata no banco
        $campanha = Campanha::where('id',$id)->first();
        return $campanha;

        // diretorio e nome
        $diretorio = "upload_imagem/campanhas/".$campanha->id.'/';
        $diretorioPDF = "upload_pdf/campanhas/".$campanha->id.'/';
        $diretorioVideo = "upload_video/campanhas/".$campanha->id.'/';


        // Vê se existe a imagem para exclui-lo
        if (File::exists($diretorio.$campanha->imagem)) {
            $f = File::delete($diretorio.$campanha->imagem);
        }
        // Vê se existe o video para exclui-lo
        if (File::exists($diretorioVideo.$campanha->video)) {
            $f = File::delete($diretorioVideo.$campanha->video);
        }
        // Vê se existe o pdf para exclui-lo
        if (File::exists($diretorioPDF.$campanha->pdf)) {
            $f = File::delete($diretorioPDF.$campanha->pdf);
        }

        // Vê se existe a pasta para exclui-lo
        if (is_dir($diretorio)) {
            $v = rmdir($diretorio);
        }

        // Deleta as tabelas e redireciona
        $campanha->delete();
        $mensagem = 'Campanha excluida com Sucesso!';
        return redirect('/admin/campanha')->with('mensagem',$mensagem);
    }

    public function destroyImagem($id)
    {
        // Consulta ao banco
        $campanha = Campanha::where('id',$id)->first();

        // diretorio e nome
        $diretorio = "upload_imagem/campanhas/".$campanha->id.'/';

        // Vê se existe a imagem para exclui-lo
        if (File::exists($diretorio.$campanha->imagem)) {
            $f = File::delete($diretorio.$campanha->imagem);
        }

        // Retirando o nome da imagem da tabela
        $campanha->imagem = '';
        $campanha->save();
        $mensagem = 'Imagem excluida com Sucesso!';
        return redirect('/admin/campanha/edit/'.$campanha->id)->with('mensagem',$mensagem);
    }
    public function destroyVideo($id)
    {
        // Consulta ao banco
        $campanha = Campanha::where('id',$id)->first();

        // diretorio e nome
        $diretorio = "upload_video/campanhas/".$campanha->id.'/';

        // Vê se existe a imagem para exclui-lo
        if (File::exists($diretorio.$campanha->video)) {
            $f = File::delete($diretorio.$campanha->video);
        }

        // Retirando o nome do vídeo da tabela
        $campanha->video = '';
        $campanha->save();
        $mensagem = 'Vídeo excluido com Sucesso!';
        return redirect('/admin/campanha/edit/'.$campanha->id)->with('mensagem',$mensagem);
    }
    public function destroyPdf($id)
    {
        // Consulta ao banco
        $campanha = Campanha::where('id',$id)->first();

        // diretorio e nome
        $diretorio = "upload_pdf/campanhas/".$campanha->id.'/';

        // Vê se existe a pdf para exclui-lo
        if (File::exists($diretorio.$campanha->pdf)) {
            $f = File::delete($diretorio.$campanha->pdf);
        }

        // Retirando o nome do pdf da tabela
        $campanha->pdf = '';
        $campanha->save();
        $mensagem = 'Pdf excluido com Sucesso!';
        return redirect('/admin/campanha/edit/'.$campanha->id)->with('mensagem',$mensagem);
    }
}
