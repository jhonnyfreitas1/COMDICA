<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use File;
use App\Instituicao;
use App\Img_inst;

class InstituicoesController extends Controller
{   
    
    public function index()
    {
        $instituicoes = DB::table('instituicoes')
                           ->join('Imgs_insts', 'instituicoes.inst_img','Imgs_insts.img_id')->paginate(10);
                           // return $instituicoes;
        return view('admin.instituicao.index', compact('instituicoes'));
    }


    public function create()
    {
        return view('/admin/instituicao/add-edit');
    }


    public function store(Request $request)
    {
        // dd($request->name);

        /*Validando os dados*/
        $validar            =   $request->validate([
            'name'           => 'required | max:30',
            'visao'           => 'required | max:100',
            'valor'           => 'required | max:100',
            'missao'           => 'required | max:100',
        ],[ 
            'name.required' => 'Preencha o nome da instituição',
            'name.max'      => 'Digite no máximo 30 caracteres neste campo',
            'visao.required' => 'Preencha a visão da instituição',
            'visao.max'      => 'Digite no máximo 100 caracteres neste campo',
            'valor.required' => 'Preencha o valor da instituição',
            'valor.max'      => 'Digite no máximo 100 caracteres neste campo',
            'missao.required' => 'Preencha a missão da instituição',
            'missao.max'      => 'Digite no máximo 100 caracteres neste campo',
        ]);

        /*Adicionando imagens*/
        $images = new Img_inst;
        $images->imagem_princ = "";
        $images->imagem_sec = "";
        $images->imagem_ter = "";
        $images->imagem_qua = "";

        $images->save();

        /*Adicionando instituição*/
        $instituicao = new Instituicao;
        $instituicao->name = $request->name;
        $instituicao->visao = $request->visao;
        $instituicao->valor = $request->valor;
        $instituicao->missao = $request->missao;
        $instituicao->inst_img = $images->img_id;
        $instituicao->save();

        // Guardando as imagens
        $dir = "upload_imagem/instituicoes/".$request->name.$instituicao->id."/";
        if ($request->name) {
            if ($request->imagem_princ == null) {
            }else{
                $img1 = $request->file('imagem_princ'); 
                $ex = $img1->extension();
                $nomeImagem = "img_1.".$ex;
                $img1->move($dir,$nomeImagem);
                $request->imagem_princ = $nomeImagem;
            }
            if ($request->imagem_sec == null) {
            }else{
                $img2 = $request->file('imagem_sec'); 
                $ex = $img2->extension();
                $nomeImagem = "img_2.".$ex;
                $img2->move($dir,$nomeImagem);
                $request->imagem_sec = $nomeImagem;
            }
            if ($request->imagem_ter == null) {
            }else{
                $img3 = $request->file('imagem_ter'); 
                $ex = $img3->extension();
                $nomeImagem = "img_3.".$ex;
                $img3->move($dir,$nomeImagem);
                $request->imagem_ter = $nomeImagem;
            }
            if ($request->imagem_qua == null){
            }else{
                $img4 = $request->file('imagem_qua'); 
                $ex = $img4->extension();
                $nomeImagem = "img_4.".$ex;
                $img4->move($dir,$nomeImagem);
                $request->imagem_qua = $nomeImagem;
            }
        }
        // Editando o nome das imagens
        $images->imagem_princ = $request->imagem_princ ? $request->imagem_princ : "";
        $images->imagem_sec = $request->imagem_sec ? $request->imagem_sec : "";
        $images->imagem_ter = $request->imagem_ter ? $request->imagem_ter : "";
        $images->imagem_qua = $request->imagem_qua ? $request->imagem_qua : "";
        $images->save();

        /*Voltando para a pagina e listar instituições*/
        $message = 'Instituição cadastrada com Sucesso!';
        return redirect('/admin/instituicoes')->with('success',$message);

    }

    public function show($id)
    {
        $instituicao = DB::table('instituicoes')
                           ->join('Imgs_insts', 'instituicoes.inst_img','Imgs_insts.img_id')
                           ->where('id',$id)->get();
        return view('/admin/instituicao/show', compact('instituicao'));
    }


    public function edit($id)
    {
        $instituicoes = Instituicao::where('id','=', $id)->first();
        // dd($instituicoes);
        return view('/admin/instituicao/add-edit', compact('instituicoes'));
        // return "Eloa";
    }


    public function update(Request $request, $id)
    {
        $data = $request; 

   /*Validando os dados*/
        $validar            =   $request->validate([
            'name'           => 'required | max:30',
            'visao'           => 'required | max:100',
            'valor'           => 'required | max:100',
            'missao'           => 'required | max:100',
        ],[ 
            'name.required' => 'Preencha o nome da instituição',
            'name.max'      => 'Digite no máximo 30 caracteres neste campo',
            'visao.required' => 'Preencha a visão da instituição',
            'visao.max'      => 'Digite no máximo 100 caracteres neste campo',
            'valor.required' => 'Preencha o valor da instituição',
            'valor.max'      => 'Digite no máximo 100 caracteres neste campo',
            'missao.required' => 'Preencha a missão da instituição',
            'missao.max'      => 'Digite no máximo 100 caracteres neste campo',
        ]);

        
        /*Pegando os dados da instituição*/
        $instituicao = Instituicao::find($id)->first();

            $dir = "upload_imagem/instituicoes/".$instituicao->name.$instituicao->id;

        // Renomeando a pasta caso a instituição mude de nome
        if(isset($request->name) && $request->name != $instituicao->name){
            /*Pegando o diretório da instituição*/
            $novoDir = "upload_imagem/instituicoes/".$request->name.$instituicao->id;
            // Renomeando
            if(is_dir($dir)){
                $rename = rename($dir, $novoDir);
            }
        }

        /*Alterando os dados da instituição*/
        if(isset($request->name)){ 
            $instituicao->name = $data->name;
        }else{
            $instituicao->name = $instituicao->name;
        };

        if(isset($request->visao)){ 
            $instituicao->visao = $request->visao;
        }else{
            $instituicao->visao = $instituicao->visao;
        };

        if(isset($request->valor)){ 
            $instituicao->valor = $request->valor;
        }else{
            $instituicao->valor = $instituicao->valor;
        };

        if(isset($request->missao)){ 
            $instituicao->missao = $request->missao;
        }else{
            $instituicao->missao = $instituicao->missao;
        };
        
        $instituicao->inst_img = $instituicao->inst_img;
        $instituicao->save();

        // Guardando as imagens
        if ($instituicao) {
            if ($request->imagem_princ == null) {
            }else{
                $img1 = $request->file('imagem_princ'); 
                $ex = $img1->extension();
                $nomeImagem = "img_1.".$ex;
                $img1->move($dir,$nomeImagem);
                $request->imagem_princ = $nomeImagem;
            }
            if ($request->imagem_sec == null) {
            }else{
                $img2 = $request->file('imagem_sec'); 
                $ex = $img2->extension();
                $nomeImagem = "img_2.".$ex;
                $img2->move($dir,$nomeImagem);
                $request->imagem_sec = $nomeImagem;

            }
            if ($request->imagem_ter == null) {
            }else{                
                $img3 = $request->file('imagem_ter'); 
                $ex = $img3->extension();
                $nomeImagem = "img_3.".$ex;
                $img3->move($dir,$nomeImagem);
                $request->imagem_ter = $nomeImagem;
            }
            if ($request->imagem_qua == null) {
            }else{                
                $img4 = $request->file('imagem_qua'); 
                $ex = $img4->extension();
                $nomeImagem = "img_4.".$ex;
                $img4->move($dir,$nomeImagem);
                $request->imagem_qua = $nomeImagem;
            }
        }

        /*Alterando as imagens*/
        $images = Img_inst::find($instituicao->inst_img);
        if(isset($img1)){ 
            $images->imagem_princ =  $request->imagem_princ ? $request->imagem_princ : "";
        }else{ 
            $images->imagem_princ = $images->imagem_princ;
        };

        if(isset($img2)){ 
            $images->imagem_sec = $request->imagem_sec ? $request->imagem_sec : "";
        }else{ 
            $images->imagem_princ = $images->imagem_princ;
        };

        if(isset($img3)){ 
            $images->imagem_ter = $request->imagem_ter ? $request->imagem_ter : "";
        }else{ 
            $images->imagem_princ = $images->imagem_princ;
        };
        
        if(isset($img4)){ 
            $images->imagem_qua = $request->imagem_qua ? $request->imagem_qua : "";
        }else{ 
            $images->imagem_princ = $images->imagem_princ;
        };
        $images->save();


        /*Voltando para a pagina e listar instituições*/
        $message = 'Instituição cadastrada com Sucesso!';
        return redirect('/admin/instituicoes');
    }

    public function destroy($id)
    {
        // Faz join de instituições com as suas imagens
        $instituicao = DB::table('instituicoes')
                           ->join('Imgs_insts', 'instituicoes.inst_img','Imgs_insts.img_id')
                           ->where('id',$id)->get();


        $ex = "upload_imagem/instituicoes/".$instituicao[0]->name.$instituicao[0]->id.'/';
        $img1 = $instituicao[0]->imagem_princ;
        $img2 = $instituicao[0]->imagem_sec;
        $img3 = $instituicao[0]->imagem_ter;
        $img4 = $instituicao[0]->imagem_qua;

        // Vê se existe a imagem/pasta para exclui-lá
        if (File::exists($ex.$img1)) {
            File::delete($ex.$img1);
        }
        if (File::exists($ex.$img2)) {
            File::delete($ex.$img2);
        }
        if (File::exists($ex.$img3)) {
            File::delete($ex.$img3);
        }
        if (File::exists($ex.$img4)) {
            File::delete($ex.$img4);
        }
        if (File::exists($ex)) {
            $rm = rmdir($ex);
        }

        // Deleta as tabelas e redireciona 
        $inst = Instituicao::find($id);
        $img = Img_inst::find($inst->inst_img)->delete();
        $inst->delete();
        return redirect('/admin/instituicoes');
    }

}