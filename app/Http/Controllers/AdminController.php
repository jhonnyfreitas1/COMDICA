<?php

namespace App\Http\Controllers;
use Auth;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Doacao_boleto;
use App\Contato;
use App\User;
use App\Postagem;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index(){
        $boletos = Doacao_boleto::get()->count();
        $contato = Contato::where('visto', false)->get()->count();
        $cancelados = Doacao_boleto::where('status' , 'FAILED')->count();
        $pagos =Doacao_boleto::where('status' , 'CONFIRMED')->count();
        $wating= Doacao_boleto::where('status' , 'AUTHORIZED')->count();
        
        $lava = new Lavacharts;
        $reasons = $lava->DataTable();
        $reasons->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['Pagamento não realizado', $cancelados])
                ->addRow(['Pagos', $pagos])
                ->addRow(['Esperando pagamento', $wating]);

        $lava->DonutChart('IMDB', $reasons, [
            'width' => 1000,
            'height' => 600,
              'colors'=> ['#b71f2d', 'rgb(8, 179, 41)', '#babaca'],
                'is3D' => true,
            'legend' => [
                'position' => 'right',
            ],
            'backgroundColor' => ''
        ]);

        return View('admin.index', compact('lava'))->with(compact('contato'));
    }
    
    public function doacoes_boleto(){
        $doacoes = Doacao_boleto::orderBy('id', 'DESC')->paginate(10);
        $contato = Contato::where('visto', false)->get()->count();
        return view('admin.doacoes')->with(compact('doacoes','contato'));
    }
    public function store(Request $request)
    {
         $this->validate(request(), [
            'name' => 'required',
            'password' => 'required|min:8|confirmed',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password2' => 'min:8'
        ]);

         
        $user  = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);     

        if ($user->save()) {
                $mensagem = "Dados alterados com sucesso";
                return back()->with(compact('mensagem' , $mensagem));  
        }else{
            $mensagem = "erro na atualizacao dos dados";
            return back()->with(compact('fail' ,$mensagem));
        }
    }
    public function back(){
        return back()->withInput();
    }

    public function contato_single($id){
        $model = Contato::where('id', '=' , $id)->first();
        $contato = Contato::where('visto', false)->get()->count();
        if ($model) {   
            $model->visto = true;
            $model->save();
            return view('admin.mensagem')->with(compact('model','contato'));
        }else{
            return redirect('/notfound');
        }
    }

    public function contato(){
        $mensagens =  Contato::orderBy('id', 'DESC')->paginate(12);
        $contato = Contato::where('visto', false)->get()->count();
        if ($mensagens) {
            return view('admin.contato')->with(compact('mensagens','contato'));
        }else{
            $mensagens = 'Sem mensagens no momento.';
            return view('admin.contato')->with(compact('mensagens')); 
        }
    }
  
    public function update(){
    
        $user = User::find(Auth::id());
        return view('admin.admin_update' , compact('user'))->with(compact('user'));
    } 
}
