<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Http\Controllers\iseet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use File;

use App\Resolucao;
use Auth;


class ResolucoesController extends Controller
{
    public function index()
    {
        $resolucoes = DB::table('resolucoes')->orderBy('ano','DESC')->paginate(10);
        return view('admin.resolucao.index', compact('resolucoes'));
    }


    public function create()
    {
        return view('admin.resolucao.add-edit');
    }


    public function store(Request $request)
    {
        $validar            =   $request->validate([
            'nome'           => 'required | max:30',
            'pdf'           => 'required',
            'data'           => 'required',

        ],[
            'nome.required' => 'Preencha o nome da ata',
            'nome.max'      => 'Digite no máximo 30 caracteres no nome',
            'pdf.required'  => 'Adicione o arquivo em pdf',
            'data.required'  => 'Adicione uma data',
        ]);

        // Nomeando as variaveis do request
        $nome = $request['nome'];
        $data =  explode('-',$request['data']);
        $mes = $data[1];
        $ano = $data[0];

        //validação dos pdfs
        if( $request->file('pdf') != null){
            if($request->file('pdf')->extension() != 'pdf'){
                return back()->withErrors(['pdf'=>'O campo pdf deve conter arquivos do tipo pdf']);
            }
        }

        // Correção no nome da ata
        if($nome > 0 && $nome <= 9 && strlen($nome) == 1 ){
            $nome = '0'.$nome;
        }
        if( strlen($nome) > 2 && $nome[0] == 0 ){
            $nome = substr($nome, 1);
        }

        // Nomeando as variaveL nome_pdf
        $nome_pdf   = $nome.bin2hex(random_bytes(2)).'.pdf';

        // Apenas resolucoes com data mínima 2017 e no máximo um ano após o ano atual
        $anoAtualMaisUm = intval( date('Y') ) + 1;
        if($ano > $anoAtualMaisUm or $ano < 2017){
            return back()->withErrors(['data'=>'Digite uma data válida']);
        }

        // Apenas uma ata resolução com o nome
        $nomeResolucao = DB::table('resolucoes')->where('ano', $ano)->where('nome_pdf',$nome_pdf.'.pdf')->count();
        if($nomeResolucao >= 1){
            return back()->withErrors(['data'=>'Já existe uma resolução com esse nome neste ano!']);
        }

        // No máximo cinco resolucoes por mês;
        $quantResolucao = DB::table('resolucoes')->where('ano', $ano)->where('mes',$mes)->count();
        if($quantResolucao >= 5){
            return back()->withErrors(['data'=>'Já foram adicionadas cinco resoluções no mês solicitado!']);
        }
/*
        Roles:
        Data mínima para adicionar uma resolução é de 2017;
        Data máxima para adicionar uma resolução é a de 1 ano após o ano atual;
        No máximo 5 resoluções por mês;
*/

        // Adicionando no banco
        $resolucao            = new Resolucao;
        $resolucao->nome      = $nome;
        $resolucao->nome_pdf  = $nome_pdf;
        $resolucao->mes       = $mes;
        $resolucao->ano       = $ano;
        $resolucao->user_id   = Auth::id();
        $resolucao->save();

        // Adicionar pdf no diretorio
        $diretorio = "upload_pdf/resolucoes/".$resolucao->ano;
        $request->file()['pdf']->move($diretorio,$resolucao->nome_pdf);

        /*Voltando para a pagina e listar resoluções*/
        $mensagem = 'Resolução cadastrada com Sucesso!';
        return redirect('/admin/resolucoes')->with('mensagem',$mensagem);

    }

    public function show($id)
    {
        $resolucao = Resolucao::where('id',$id)->first();
        return redirect('/upload_pdf/resolucoes/'.$resolucao->ano.'/'.$resolucao->nome_pdf);
    }


    public function edit($id)
    {
        $resolucao = Resolucao::where('id','=', $id)->first();
        $resolucao->data = $resolucao->mes.'-'.$resolucao->ano;
        return view('admin.resolucao.add-edit', compact('resolucao'));
    }


    public function update(Request $request, $id)
    {
        $validar            =   $request->validate([
            'nome'           => 'required | max:30',
            'data'           => 'required',

        ],[
            'nome.required' => 'Preencha o nome da ata',
            'nome.max'      => 'Digite no máximo 30 caracteres no nome',
            'data.required'  => 'Adicione uma data',
        ]);

        // Nomeando as variaveis do request
        $nome = $request['nome'];
        $data =  explode('-',$request['data']);
        $mes = $data[1];
        $ano = $data[0];

        //validação dos pdfs
        if( $request->file('pdf') != null){
            if($request->file('pdf')->extension() != 'pdf'){
                return back()->withErrors(['pdf'=>'O campo pdf deve conter arquivos do tipo pdf']);
            }
        }

        // Correção no nome da resolução
        if($nome > 0 && $nome <= 9 && strlen($nome) == 1 ){
            $nome = '0'.$nome;
        }
        if( strlen($nome) > 2 && $nome[0] == 0 ){
            $nome = substr($nome, 1);
        }

        // Nomeando as variaveL nome_pdf
        $nome_pdf   = $nome.bin2hex(random_bytes(2)).'.pdf';

        // Apenas resoluções com data mínima 2017 e no máximo um ano após o ano atual
        $anoAtualMaisUm = intval( date('Y') ) + 1;
        if($ano > $anoAtualMaisUm or $ano < 2017){
            return back()->withErrors(['data'=>'Digite uma data válida']);
        }

        // Apenas uma resolução com o nome
        $nomeOrdinaria = DB::table('resolucoes')->where('ano', $ano)->where('nome_pdf',$nome_pdf)->get();
        if( $nomeOrdinaria->count() == 1){
            if($nomeOrdinaria[0]->id != $id){
                return back()->withErrors(['data'=>'Já existe uma resolução com esse nome neste ano!']);
            }
        }

        // No máximo cinco resoluções por mês;
        $quantExtraordinaria = DB::table('resolucoes')->where('ano', $ano)->where('mes',$mes)->get();
        if($quantExtraordinaria->count() == 5){
            if($quantExtraordinaria[0]->id != $id){
                return back()->withErrors(['data'=>'Já foram adicionadas cinco resoluções no mês e ano solicitado!']);
            }
        }

        //Pegando as informações da ata
        $resolucao = Resolucao::where('id',$id)->first();

        // Verifica se está enviando um arquivo pdf
        $ex = "upload_pdf/resolucoes/";
        if($request->file('pdf') != null){

            // Verifica se o ano enviado é igual ao do banco
            if($resolucao->ano == $ano){
                $diretorio = $ex.$ano;
                unlink($diretorio."/".$resolucao->nome_pdf);
                $request->file()['pdf']->move($diretorio,$nome_pdf);

            // Se o ano enviado é diferte ao do banco
            }else{
                $diretorio = $ex;
                unlink($diretorio.$resolucao->ano."/".$resolucao->nome_pdf);
                $request->file()['pdf']->move($diretorio.$ano,$nome_pdf);
            }

        // Caso não esteja enviando um arquivo pdf
        }else{

            // Verifica se o ano enviado é igual ao do banco
            if($resolucao->ano == $ano){

                // Verifica se o nome enviado é igual ao do banco
                if($resolucao->nome_pdf != $nome_pdf){
                    rename($ex.$resolucao->ano."/".$resolucao->nome_pdf, $ex.$resolucao->ano."/".$nome_pdf);
                }

            // Se o ano enviado for diferente ao do banco
            }else{

                // Verifica se o nome enviado é igual ao do banco
                if($resolucao->nome_pdf == $nome_pdf){
                    $dir = $ex.$resolucao->ano."/";
                    $anoAntigo = $dir.$resolucao->nome_pdf;
                    $anoNovo = $ex.$ano."/".$resolucao->nome_pdf;

                    // Verifica se o diretorio novo existe
                    $existDir = is_dir($dir);
                    if($existDir == false){
                        mkdir($dir);
                    }

                    //move o arquivo
                    rename($anoAntigo, $anoNovo);


                // Se o nome enviado for diferente ao do banco
                }else{
                    $dir = $ex.$resolucao->ano."/";
                    $anoAntigo = $dir."/".$resolucao->nome_pdf;
                    $anoNovo = $ex.$ano."/".$nome_pdf;

                    // Verifica se o diretorio novo existe
                    $existDir = is_dir($dir);
                    if($existDir == false){
                        mkdir($dir);
                    }

                    //move o arquivo
                    rename($anoAntigo, $anoNovo);
                }
            }
        }

        // Editando pdf no banco
        $resolucao->nome = $nome;
        $resolucao->nome_pdf = $nome_pdf;
        $resolucao->mes = $mes;
        $resolucao->ano = $ano;
        $resolucao->user_id = $resolucao->user_id;
        $resolucao->save();

       /*Voltando para a pagina e listar resolução*/
        $mensagem = 'Resolução cadastrada com Sucesso!';
        return redirect('/admin/resolucoes')->with('mensagem',$mensagem);
    }

    public function destroy($id)
    {

        // Consulta ata no banco
       $query = DB::table('resolucoes')->where('id',$id);
       $resolucao = $query->get();

       // diretorio e nome
       $diretorio = "upload_pdf/resolucoes/".$resolucao[0]->ano.'/';
       $nome = $resolucao[0]->nome_pdf;

       // Vê se existe o arquivo pdf para exclui-lo
       if (File::exists($diretorio.$nome)) {
           File::delete($diretorio.$nome);
       }
       // Deleta as tabelas e redireciona
       $query->delete();
       $mensagem = 'Resolução excluida com Sucesso!';
       return redirect('/admin/resolucoes')->with('mensagem',$mensagem);
    }
}
