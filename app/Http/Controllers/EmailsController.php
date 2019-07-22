<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailComdica;
class EmailsController extends Controller
{
   
	public function verificar(){

			Mail::to('jhonnyfarias87@gmail.com')->send(new SendMailComdica());
		
	}


}
