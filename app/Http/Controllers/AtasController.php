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
}
