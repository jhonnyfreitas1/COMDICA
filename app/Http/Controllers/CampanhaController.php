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
        return view('newFront.doacaoIndex',compact('campanha'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(campanha $campanha)
    {
        //
    }

    public function edit(campanha $campanha)
    {
        //
    }

    public function update(Request $request, campanha $campanha)
    {
        //
    }

    public function destroy(campanha $campanha)
    {
        //
    }
}
