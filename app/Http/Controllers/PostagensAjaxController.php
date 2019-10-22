<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contato;
use \DateTime;
use App\Postagem;
use PDF;
use App\Doacao_boleto;
use App\Doacao_carne;
use App\Recibo;

class PostagensAjaxController extends Controller
{
    public function id0(){
        // $ajax = false;
        // if ($request->ajax()){
        //     $ajax = true;
        // }
        $posts = DB::table('postagens')->orderBy('id', 'DESC')->paginate(8);
        return view('home/postagens', compact('posts'));
    }

	public function id1(){
        $posts = DB::table('postagens')->where('categoria',1)->get();
        return view('home/postagens', compact('posts'));
    }
	public function id2(){
        $posts = DB::table('postagens')->where('categoria',2)->get();
        return view('home/postagens', compact('posts'));
    }
	public function id3(){
        $posts = DB::table('postagens')->where('categoria',3)->get();
        return view('home/postagens', compact('posts'));
    }
	public function id4(){
        $posts = DB::table('postagens')->where('categoria',4)->get();
        return view('home/postagens', compact('posts'));
    }
	public function id5(){
        $posts = DB::table('postagens')->where('categoria',5)->get();
        return view('home/postagens', compact('posts'));
    }
}
