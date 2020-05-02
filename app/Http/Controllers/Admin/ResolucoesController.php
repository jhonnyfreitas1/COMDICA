<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Http\Controllers\iseet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use File;

class ResolucoesController extends Controller
{
    public function index()
    {
        $resolucoes = DB::table('resolucoes')->paginate(10);
        return view('admin.resolucao.index', compact('resolucoes'));
    }


    public function create()
    {
        return view('admin.resolucao.add-edit');
    }


    public function store(Request $request)
    {

        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Ata cadastrada com Sucesso!';
        return redirect('/admin/resolucoes')->with('mensagem',$mensagem);

    }

    public function show($id)
    {
        $resolucao = DB::table('resolucoes');
        return view('admin.resolucao.show', compact('resolucoes'));
    }


    public function edit($id)
    {
        $resolucoes = DB::table('resolucoes')->where('id','=', $id)->first();
        return view('admin.resolucao.add-edit', compact('resolucoes'));
    }


    public function update(Request $request, $id)
    {
        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Resolução cadastrada com Sucesso!';
        return redirect('/admin/resolucoes')->with('mensagem',$mensagem);
    }

    public function destroy($id)
    {
        $mensagem = 'Resolução excluida com Sucesso!';
        return redirect('/admin/resolucoes')->with('mensagem',$mensagem);
    }
}
