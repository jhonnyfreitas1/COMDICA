<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resolucao;
use Illuminate\Support\Facades\DB;
class ResolucoesController extends Controller
{
    public function index(){
        $resolucoes = DB::table('resolucoes')->paginate(10);
        return view('newFront.resolucoes')->with(compact('resolucoes'));
    }
    public function showResolucao($id){
        $resolucao = Resolucao::where('id',$id)->first();
        return redirect('/upload_pdf/resolucoes/'.$resolucao->ano.'/'.$resolucao->nome_pdf);
    }
}
