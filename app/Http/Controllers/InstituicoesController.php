<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\iseet;
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
            'desc'           => 'required | max:100',
            'telefone'           => 'max:20',
            'endereco'           => 'max:50',
            'email'           => 'max:50',
            'site'           => 'max:50',
        ],[ 
            'name.required' => 'Preencha o nome da instituição',
            'name.max'      => 'Digite no máximo 30 caracteres neste campo',
            'desc.required' => 'Preencha a descrição da instituição',
            'desc.max'      => 'Digite no máximo 100 caracteres neste campo',
            'telefone.max' => 'Digite no máximo 20 caracteres neste campo',
            'endereco.max'      => 'Digite no máximo 50 caracteres neste campo',
            'email.max' => 'Digite no máximo 50 caracteres neste campo',
            'site.max'      => 'Digite no máximo 50 caracteres neste campo',
        ]);
        
         // Verificando se são realmente imagens
        $extensoes = ['jpg','jpeg','png'];
        $resp = 0; 
        if($request->file('imagem_princ') != NULL){
            $ex1 = strtolower($request->file('imagem_princ')->extension());
            for($c = 0; sizeof($extensoes) > $c; $c++){
                if ($ex1 == $extensoes[$c]) {
                    $resp++;
                }
            }
            if($resp == 0){
                $mensagemExtensao = "Adicione uma imagem valida na imagem principal";
                return redirect('admin/instituicoes/create')->with('danger',$mensagemExtensao);
            }
        }
        if($request->file('imagem_sec') != NULL){
            $ex2 = strtolower($request->file('imagem_sec')->extension()); 
            for($c = 0; sizeof($extensoes) > $c; $c++){
                if ($ex2 == $extensoes[$c]) {
                    $resp++;
                }
            }
            if($resp == 0){
                $mensagemExtensao = "Adicione uma imagem valida na imagem principal";
                return redirect('admin/instituicoes/create')->with('danger',$mensagemExtensao);
            }
        }
        if($request->file('imagem_ter') != NULL){
            $ex3 = strtolower($request->file('imagem_ter')->extension()); 
            for($c = 0; sizeof($extensoes) > $c; $c++){
                if ($ex3 == $extensoes[$c]) {
                    $resp++;
                }
            }
            if($resp == 0){
                $mensagemExtensao = "Adicione uma imagem valida na imagem principal";
                return redirect('admin/instituicoes/create')->with('danger',$mensagemExtensao);
            }        
        }
        
        /*Adicionando imagens*/
        $images = new Img_inst;
        $images->imagem_princ = "";
        $images->imagem_sec = "";
        $images->imagem_ter = "";

        $images->save();

        /*Adicionando instituição*/
        $instituicao = new Instituicao;
        $instituicao->name = $request->name == null ? '' : $request->name;
        $instituicao->desc = $request->desc == null ? '' : $request->desc;
        $instituicao->telefone = $request->telefone == null ? '' : $request->telefone ;
        $instituicao->endereco = $request->endereco == null ? '' : $request->endereco;
        $instituicao->email = $request->email == null ? '' : $request->email;
        $instituicao->site = $request->site == null ? '' : $request->site;
        $instituicao->inst_img = $images->img_id;
        $instituicao->save();



        // Guardando as imagens
        $dir = "upload_imagem/instituicoes/".$request->name.$instituicao->id."/";
        if ($request->name) {
            if ($request->imagem_princ == null) {
            }else{
                $img1 = $request->file('imagem_princ');
                $nomeImagem = "img_1.".$ex1;
                $img1->move($dir,$nomeImagem);
                $request->imagem_princ = $nomeImagem;
            }
            if ($request->imagem_sec == null) {
            }else{
                $img2 = $request->file('imagem_sec');
                $nomeImagem = "img_2.".$ex2;
                $img2->move($dir,$nomeImagem);
                $request->imagem_sec = $nomeImagem;
            }
            if ($request->imagem_ter == null) {
            }else{
                $img3 = $request->file('imagem_ter');
                $nomeImagem = "img_3.".$ex3;
                $img3->move($dir,$nomeImagem);
                $request->imagem_ter = $nomeImagem;
            }

        }
        // Editando o nome das imagens
        $images->imagem_princ = $request->imagem_princ ? $request->imagem_princ : "";
        $images->imagem_sec = $request->imagem_sec ? $request->imagem_sec : "";
        $images->imagem_ter = $request->imagem_ter ? $request->imagem_ter : "";
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
   /*Validando os dados*/
        $validar            =   $request->validate([
            'name'           => 'required | max:30',
            'desc'           => 'required | max:100',
            'telefone'           => 'max:20',
            'endereco'           => 'max:50',
            'email'           => 'max:50',
            'site'           => 'max:50',
        ],[ 
            'name.required' => 'Preencha o nome da instituição',
            'name.max'      => 'Digite no máximo 30 caracteres neste campo',
            'desc.required' => 'Preencha a descrição da instituição',
            'desc.max'      => 'Digite no máximo 100 caracteres neste campo',
            'telefone.max' => 'Digite no máximo 20 caracteres neste campo',
            'endereco.max'      => 'Digite no máximo 50 caracteres neste campo',
            'email.max' => 'Digite no máximo 50 caracteres neste campo',
            'site.max'      => 'Digite no máximo 50 caracteres neste campo',
        ]);

        // Verificando se são realmente imagens
        $extensoes = ['jpg','jpeg','png'];
        $resp = 0; 
        if($request->file('imagem_princ') != NULL){
            $ex1 = strtolower($request->file('imagem_princ')->extension());
            for($c = 0; sizeof($extensoes) > $c; $c++){
                if ($ex1 == $extensoes[$c]) {
                    $resp++;
                }
            }
            if($resp == 0){
                $mensagemExtensao = "Adicione uma imagem valida na imagem principal";
                return redirect('admin/instituicoes/edit/'.$id)->with('danger',$mensagemExtensao);
            }
        }
        if($request->file('imagem_sec') != NULL){
            $ex2 = strtolower($request->file('imagem_sec')->extension()); 
            for($c = 0; sizeof($extensoes) > $c; $c++){
                if ($ex2 == $extensoes[$c]) {
                    $resp++;
                }
            }
            if($resp == 0){
                $mensagemExtensao = "Adicione uma imagem valida na imagem principal";
                return redirect('admin/instituicoes/edit/'.$id)->with('danger',$mensagemExtensao);
            }
        }
        if($request->file('imagem_ter') != NULL){
            $ex3 = strtolower($request->file('imagem_ter')->extension()); 
            for($c = 0; sizeof($extensoes) > $c; $c++){
                if ($ex3 == $extensoes[$c]) {
                    $resp++;
                }
            }
            if($resp == 0){
                $mensagemExtensao = "Adicione uma imagem valida na imagem principal";
                return redirect('admin/instituicoes/edit/'.$id)->with('danger',$mensagemExtensao);
            }        
        }
        /*Pegando os dados da instituição*/
        $instituicao = Instituicao::find($id);
        $dir = "upload_imagem/instituicoes/".$instituicao->name.$id;

        // Renomeando a pasta caso a instituição mude de nome
        if(isset($request->name) && $request->name != $instituicao->name){
            /*Pegando o diretório da instituição*/
            $novoDir = "upload_imagem/instituicoes/".$request->name.$id;
            // Renomeando
            if(is_dir($dir)){
                $rename = rename($dir, $novoDir);
                $dir = $novoDir;
            }
        }

        /*Alterando os dados da instituição*/
        $instituicao->name = $instituicao->name == $request->name ?  $instituicao->name : $request->name;
        $instituicao->desc = $instituicao->desc == $request->desc ?  $instituicao->desc : $request->desc;
        $instituicao->telefone = $instituicao->telefone == $request->telefone ?  $instituicao->telefone : $request->telefone ;
        $instituicao->endereco = $instituicao->endereco == $request->endereco ?  $instituicao->endereco : $request->endereco;
        $instituicao->email = $instituicao->email == $request->email ?  $instituicao->email : $request->email;
        $instituicao->site = $instituicao->site == $request->site ?  $instituicao->site : $request->site;
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