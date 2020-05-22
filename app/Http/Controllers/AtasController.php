<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ata;
class AtasController extends Controller
{
    public function index(){
        $atas = Ata::all();
        return view('newFront.atas', compact('atas'));
    }
    public function showAtas($id){
        $ata = Ata::where('id',$id)->first();
        return redirect('/upload_pdf/atas/'.$ata->ano.'/'.$ata->nome_pdf);
    }
}
