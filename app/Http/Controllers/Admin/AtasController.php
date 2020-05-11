<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use File;

use App\Ata;
use Auth;

class AtasController extends Controller
{
    public function index()
    {
        $atas = Ata::all();
        return view('admin.ata.index', compact('atas'));
    }


    public function create()
    {
        return view('/admin/ata/add-edit');
    }


    public function store(Request $request)
    {
        $validar            =   $request->validate([
            'nome'           => 'required | max:30',
            'pdf'           => 'required',
            'data'           => 'required',
            'tipo'           => 'required',

        ],[
            'nome.required' => 'Preencha o nome da ata',
            'nome.max'      => 'Digite no máximo 30 caracteres no nome',
            'pdf.required'  => 'Adicione o arquivo em pdf',
            'data.required'  => 'Adicione uma data',
            'tipo.required'  => 'Selecione o tipe de ata',
        ]);

        // Nomeando as variaveis do request
        $nome       = $request['nome'];
        $tipo       = $request['tipo'];
        $data       =  explode('-',$request['data']);
        $mes        = $data[1];
        $ano        = $data[0];

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


        // Apenas atas com data mínima 2017 e no máximo um ano após o ano atual
        $anoAtualMaisUm = intval( date('Y') ) + 1;
        if($ano > $anoAtualMaisUm or $ano < 2017){
            return back()->withErrors(['data'=>'Digite uma data válida']);
        }

        // Apenas uma ata ordinária por mês
        $quantOrdinaria = DB::table('atas')->where('ano', $ano)->where('mes',$mes)->where('tipo', 'ordinaria')->count();
        if($quantOrdinaria >= 1){
            return back()->withErrors(['data'=>'Já existe uma ata ordinária neste mês e ano!']);
        }

        // Apenas uma ata ordinária com o nome
        $nomeOrdinaria = DB::table('atas')->where('ano', $ano)->where('nome_pdf',$nome_pdf)->where('tipo', 'ordinaria')->count();
        if($nomeOrdinaria >= 1){
            return back()->withErrors(['data'=>'Já existe uma ata ordinária com esse nome neste ano!']);
        }

        // Apenas uma ata extraordinária com o nome
        $nomeExtraordinaria = DB::table('atas')->where('ano', $ano)->where('nome_pdf',$nome_pdf)->where('tipo', 'extraordinaria')->count();
        if($nomeOrdinaria >= 1){
            return back()->withErrors(['data'=>'Já existe uma ata extraordinária com esse nome!']);
        }

        // No máximo três atas extraordinárias por mês;
        $quantextraordinaria = DB::table('atas')->where('ano', $ano)->where('mes',$mes)->where('tipo', 'extraordinaria')->count();
        if($quantOrdinaria >= 3){
            return back()->withErrors(['data'=>'Já foram adicionadas três atas extraordinárias no mês solicitado!']);
        }
/*
        Roles:
        Data mínima para adicionar uma ata é de 2017;
        Data máxima para adicionar uma ata é a de 1 ano após o ano atual;
        Apenas uma ata ordinária por mês;
        No máximo três atas extraordinárias por mês;
        Apenas uma ata ordinária com o nome no ano;
        Apenas uma ata extraordinária com o nome no ano;
*/

        // Adicionando no banco
        $ata            = new Ata;
        $ata->nome      = $nome;
        $ata->nome_pdf  = $nome_pdf;
        $ata->mes       = $mes;
        $ata->ano       = $ano;
        $ata->tipo      = $tipo;
        $ata->user_id   = Auth::id();
        $ata->save();

        // Adicionar pdf no diretorio
        $diretorio = "upload_pdf/atas/".$ata->ano;
        $request->file()['pdf']->move($diretorio,$ata->nome_pdf);

        /*Voltando para a pagina e listar atas*/
        $mensagem = 'Ata cadastrada com Sucesso!';
        return redirect('/admin/atas')->with('mensagem',$mensagem);

    }

    public function show($id)
    {
        $ata = Ata::where('id',$id)->first();
        return redirect('/upload_pdf/atas/'.$ata->ano.'/'.$ata->nome_pdf);
    }


    public function edit($id)
    {
        $ata = Ata::where('id','=', $id)->first();
        $ata->data = $ata->mes.'-'.$ata->ano;
        return view('/admin/ata/add-edit', compact('ata'));
    }


    public function update(Request $request, $id)
    {
        $validar            =   $request->validate([
            'nome'           => 'required | max:30',
            'data'           => 'required',
            'tipo'           => 'required',

        ],[
            'nome.required' => 'Preencha o nome da ata',
            'nome.max'      => 'Digite no máximo 30 caracteres no nome',
            'data.required'  => 'Adicione uma data',
            'tipo.required'  => 'Selecione o tipe de ata',
        ]);

        // Nomeando as variaveis do request
        $nome       = $request['nome'];
        $tipo       = $request['tipo'];
        $data       =  explode('-',$request['data']);
        $mes        = $data[1];
        $ano        = $data[0];


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

        // Apenas atas com data mínima 2017 e no máximo um ano após o ano atual
        $anoAtualMaisUm = intval( date('Y') ) + 1;
        if($ano > $anoAtualMaisUm or $ano < 2017){
            return back()->withErrors(['data'=>'Digite uma data válida']);
        }


        // Apenas uma ata ordinária por mês
        $quantOrdinaria = DB::table('atas')->where('ano', $ano)->where('mes',$mes)->where('tipo', 'ordinaria')->get();
        if( $quantOrdinaria->count() == 1){
            if($quantOrdinaria[0]->id != $id){
                return back()->withErrors(['data'=>'Já existe uma ata ordinária neste mês e ano!']);
            }
        }

        // Apenas uma ata ordinária com o nome
        $nomeOrdinaria = DB::table('atas')->where('ano', $ano)->where('nome_pdf',$nome_pdf)->where('tipo', 'ordinaria')->get();
        if( $nomeOrdinaria->count() == 1){
            if($nomeOrdinaria[0]->id != $id){
                return back()->withErrors(['data'=>'Já existe uma ata ordinária com esse nome neste ano!']);
            }
        }

        // No máximo três atas extraordinárias por mês;
        $quantExtraordinaria = DB::table('atas')->where('ano', $ano)->where('mes',$mes)->where('tipo', 'extraordinaria')->get();
        if($quantExtraordinaria->count() == 3){
            if($quantExtraordinaria[0]->id != $id){
                return back()->withErrors(['dagta'=>'Já foram adicionadas três atas extraordinárias no mês e ano solicitado!']);
            }
        }

        // Apenas uma ata extraordinária com o nome
        $nomeExtraordinaria = DB::table('atas')->where('ano', $ano)->where('nome_pdf',$nome_pdf)->where('tipo', 'extraordinaria')->get();
        if($nomeExtraordinaria->count() == 1){
            if($nomeExtraordinaria[0]->id != $id){
                return back()->withErrors(['data'=>'Já existe uma ata extraordinária com esse nome neste ano!']);
            }
        }

        //Pegando as informações da ata
        $ata = Ata::where('id',$id)->first();


        // Verifica se está enviando um arquivo pdf
        $ex = "upload_pdf/atas/";
        if($request->file('pdf') != null){

            // Verifica se o ano enviado é igual ao do banco
            if($ata->ano == $ano){
                $diretorio = $ex.$ano;
                unlink($diretorio."/".$ata->nome_pdf);
                $request->file()['pdf']->move($diretorio,$nome_pdf);

            // Se o ano enviado é diferte ao do banco
            }else{
                $diretorio = $ex;
                unlink($diretorio.$ata->ano."/".$ata->nome_pdf);
                $request->file()['pdf']->move($diretorio.$ano,$nome_pdf);
            }

        // Caso não esteja enviando um arquivo pdf
        }else{

            // Verifica se o ano enviado é igual ao do banco
            if($ata->ano == $ano){

                // Verifica se o nome enviado é igual ao do banco
                if($ata->nome_pdf != $nome_pdf){
                    rename($ex.$ata->ano."/".$ata->nome_pdf, $ex.$ata->ano."/".$nome_pdf);
                }

            // Se o ano enviado for diferente ao do banco
            }else{

                // Verifica se o nome enviado é igual ao do banco
                if($ata->nome_pdf == $nome_pdf){
                    $anoAntigo = $ex.$ata->ano."/".$ata->nome_pdf;
                    $anoNovo = $ex.$ano."/".$ata->nome_pdf;
                    rename($anoAntigo, $anoNovo);

                // Se o nome enviado for diferente ao do banco
                }else{
                    $anoAntigo = $ex.$ata->ano."/".$ata->nome_pdf;
                    $anoNovo = $ex.$ano."/".$nome_pdf;
                    rename($anoAntigo, $anoNovo);
                }
            }
        }

        // Editando pdf no banco
        $ata->nome = $nome;
        $ata->nome_pdf = $nome_pdf;
        $ata->mes = $mes;
        $ata->ano = $ano;
        $ata->tipo = $tipo;
        $ata->user_id = $ata->user_id;
        $ata->save();

        /*Voltando para a pagina e listar atas*/
        $mensagem = 'Ata atualizada com Sucesso!';
        return redirect('/admin/atas')->with('mensagem',$mensagem);
    }

    public function destroy($id)
    {
        // Consulta ata no banco
        $query = DB::table('atas')->where('id',$id);
        $ata = $query->get();

        // diretorio e nome
        $diretorio = "upload_pdf/atas/".$ata[0]->ano.'/';
        $nome_pdf = $ata[0]->nome_pdf;

        // Vê se existe o arquivo pdf para exclui-lo
        if (File::exists($diretorio.$nome_pdf)) {
            File::delete($diretorio.$nome_pdf);
        }
        // Deleta as tabelas e redireciona
        $query->delete();
        $mensagem = 'Ata excluida com Sucesso!';
        return redirect('/admin/atas')->with('mensagem',$mensagem);
    }
}
