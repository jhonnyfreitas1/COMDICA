<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Http\Controllers\iseet;
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
        $atas = DB::table('atas')->paginate(10);
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

        ],[
            'nome.required' => 'Preencha o nome da ata',
            'nome.max'      => 'Digite no máximo 30 caracteres no nome',
            'pdf.required'  => 'Adicione o arquivo em pdf',
            'pdf.required'  => 'Adicione uma data',
        ]);

        //validação dos pdfs
        if( $request->file('pdf') != null){
            if($request->file('pdf')->extension() != 'pdf'){
                return back()->withErrors(['pdf'=>'O campo pdf deve conter arquivos do tipo pdf']);
            }
       }

       // Corrigindo a data
        $data =  explode('-',$request['data']);
        if($data[0] > 2040 or $data[0] < 1999){
            return back()->withErrors(['data'=>'Digite uma data válida']);
        }

        //corrigindo a variavel
        $data = $data[1].'-'.$data[0];

        //Verificação se existe alguma ata com o mesmo nome
        $atasMesmoNome = DB::table('atas')->where('data',  $data)->where('nome',$request['nome'].'.pdf')->get();
        if(sizeOf($atasMesmoNome) >= 1){
            return back()->withErrors(['pdf'=>'Já existe um pdf com esse nome no mês solicitado!']);
        }

        // Verificação da quantidade de atas do mês
        $atasMesmoMes = DB::table('atas')->where('data',  $data)->get();
        if(sizeOf($atasMesmoMes) <= 3){

            // Adiciona pdf no banco
            $ata            = new Ata;
            $ata->nome      = $request['nome'].'.pdf';
            $ata->data      = $data;
            $ata->user_id   = Auth::id();
            $ata->save();

            // Adicionar pdf no diretorio
            $diretorio = "upload_pdf/atas/".$ata->data;
            $request->file()['pdf']->move($diretorio,$ata->nome);

        }else{
            return back()->withErrors(['pdf'=>'Já foi adicionado três atas no mês solicitado!']);
        }

        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Ata cadastrada com Sucesso!';
        return redirect('/admin/atas')->with('mensagem',$mensagem);

    }

    public function show($id)
    {
        $ata = DB::table('atas');
        return view('/admin/ata/show', compact('atas'));
    }


    public function edit($id)
    {
        $ata = Ata::where('id','=', $id)->first();
        return view('/admin/ata/add-edit', compact('ata'));
    }


    public function update(Request $request, $id)
    {
        $validar            =   $request->validate([
            'nome'           => 'required | max:30',
            'data'           => 'required',

        ],[
            'nome.required' => 'Preencha o nome da ata',
            'nome.max'      => 'Digite no máximo 30 caracteres no nome',
            'pdf.required'  => 'Adicione uma data',
        ]);

        //validação dos pdfs
        if( $request->file('pdf') != null){
            if($request->file('pdf')->extension() != 'pdf'){
                return back()->withErrors(['pdf'=>'O campo pdf deve conter arquivos do tipo pdf']);
            }
        }

        // Corrigindo a data
        $data =  explode('-',$request['data']);
        if($data[0] > 2040 or $data[0] < 1999){
            return back()->withErrors(['data'=>'Digite uma data válida']);
        }

        //corrigindo a variavel
        $data = $data[1].'-'.$data[0];

        //Pegando as informações da ata
        $ata = Ata::where('id',$id)->first();

        // Verificação da quantidade de atas do mês
        $atasMesmoMes = DB::table('atas')->where('data',  $data)->get();
        if(sizeOf($atasMesmoMes) <= 3){

            // Renomeando pasta e arquivo
            $renomearPasta = rename("upload_pdf/atas/".$ata->data, "upload_pdf/atas/".$data);
            $renomearArquivo = rename("upload_pdf/atas/".$data."/".$ata->nome, "upload_pdf/atas/".$data."/".$request['nome'].'.pdf');

            // Editando pdf no banco
            $ata->nome = $request['nome'].'.pdf';
            $ata->data = $data;
            $ata->user_id =  Auth::id();
            $ata->save();

            // Removendo pdf e adicionando outro no diretorio
            if(!empty($request->file('pdf'))){
                unlink("upload_pdf/atas/".$data."/".$ata->nome);
                $diretorio = "upload_pdf/atas/".$data;
                $request->file()['pdf']->move($diretorio, $request['nome'].'.pdf');
            };
        }else{
            return back()->withErrors(['pdf'=>'Já foi adicionado três atas no mês solicitado!']);
        }

        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Ata atualizada com Sucesso!';
        return redirect('/admin/atas')->with('mensagem',$mensagem);
    }

    public function destroy($id)
    {
        $query = DB::table('atas')->where('id',$id);
        $ata = $query->get();

        // Consulta ata asno banco
        $ex = "upload_pdf/atas/".$ata[0]->data.'/';
        $nome = $ata[0]->nome;

        // Vê se existe a pasta/pdf para exclui-lá
        if (File::exists($ex.$nome)) {
            File::delete($ex.$nome);
        }

        if (File::exists($ex)) {
            $rm = rmdir($ex);
        }

        // Deleta as tabelas e redireciona
        $query->delete();
        $mensagem = 'Ata excluida com Sucesso!';
        return redirect('/admin/atas')->with('mensagem',$mensagem);
    }
}
