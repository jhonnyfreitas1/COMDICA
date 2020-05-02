<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Http\Controllers\iseet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use File;

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

        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Album cadastrada com Sucesso!';
        return redirect('/admin/galeria')->with('mensagem',$mensagem);

    }

    public function show($id)
    {
        $album = DB::table('album_galerias');
        return view('admin.galeria.show', compact('album'));
    }


    public function edit($id)
    {
        $albuns = DB::table('album_galerias')->where('id','=', $id)->first();
        return view('admin.galeria.add-edit', compact('albuns'));
    }


    public function update(Request $request, $id)
    {
        /*Voltando para a pagina e listar instituições*/
        $mensagem = 'Album cadastrada com Sucesso!';
        return redirect('/admin/galeria')->with('mensagem',$mensagem);
    }

    public function destroy($id)
    {
        $mensagem = 'Album excluida com Sucesso!';
        return redirect('/admin/galeria')->with('mensagem',$mensagem);
    }
}
