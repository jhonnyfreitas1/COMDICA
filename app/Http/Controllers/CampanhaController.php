<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campanha;
use App\ImgCampanha;
use App\VideoCampanha;

class CampanhaController extends Controller
{
    public function index()
    {
        $campanha = Campanha::orderBy('id', 'DESC')->first();
        // return $campanha;
        return view('newFront.doacaoIndex',compact('campanha'));
    }
}
