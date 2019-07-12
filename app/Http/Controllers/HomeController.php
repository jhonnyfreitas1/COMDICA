<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    private $totalPag = 6;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
             $postagem = DB::table('postagens')->limit(3)->orderBy('id', 'DESC')->get();

        $posts = DB::table('postagens')->orderBy('id', 'DESC')->paginate(6);

        return view('home.home1')->with(compact('postagem' ,'posts'));
    }
    public function postagem($id)
    {
        $postagem = DB::table('postagens')->find($id);

        return view('home.postagem')->with(compact('postagem'));
    }
     public function pq_doar()
    {
        return view('home.pq_doar');
    }
    public function sou_doador()
    {
        return view('home.sou_doador');
    }
    public function contato()
    {
        return view('home.contato');
    }
     public function home1()
    {
        $postagem = DB::table('postagens')->limit(3)->get();

        $posts = DB::table('postagens')->paginate(6);

        return view('home.home1')->with(compact('postagem' ,'posts'));
        
    }
}
