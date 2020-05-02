<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Http\Controllers\iseet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use File;

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
        $atas = Ata::where('id','=', $id)->first();
        return view('/admin/ata/add-edit', compact('atas'));
    }


    public function update(Request $request, $id)
    {
        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Ata cadastrada com Sucesso!';
        return redirect('/admin/atas')->with('mensagem',$mensagem);
    }

    public function destroy($id)
    {
        $mensagem = 'Ata excluida com Sucesso!';
        return redirect('/admin/atas')->with('mensagem',$mensagem);
    }
}
