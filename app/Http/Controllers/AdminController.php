<?php

namespace App\Http\Controllers;
use Auth;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Doacao_boleto;
use App\Contato;
use App\User;
use App\Tipo_user;
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

    public function edit()
    {
        $user = User::find(Auth::id());
        return view('admin.admin_update' , compact('user'))->with(compact('user'));

    }

    // Métodos do usuário

    // Método que edit
    public function update(Request $request)
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
                return back()->with(compact('mensagem'));
        }else{
            $mensagem = "erro na atualizacao dos dados";
            return back()->with(compact('fail'));
        }
    }

    public function add_user(Request $request){
        $this->validate(request(), [
            'name' => 'required|max:50',
            'email' => 'required|email|',
            'password' => 'required|min:8',
            'password2' => 'min:8|required_with:password|same:password',
        ],[
            'name.required' => 'Preencha o nome do usuário',
            'name.max'      => 'Digite no máximo 50 caracteres neste campo',
            'email.required' => 'Preencha o e-mail do usuário',
            'email.email'      => 'Utilize o @ pois este é um campo de e-mail',
            'password.required' => 'Os campos de senhas são obrigatorios',
            'password.min'      => 'Digite no mínimo 8 caracteres neste campo',
            'password2.required' => 'Os campos de senhas são obrigatorios',
            'password2.min'      => 'Digite no mínimo 8 caracteres neste campo',
            'password2.same' => 'Os campos senha e confirmação de senha devem ter os mesmos valores',
        ]);

        $user  = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tipo_user = $request->tipo_user;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
                $mensagem = "Dados alterados com sucesso";
                return back()->with(compact('mensagem'));
        }else{
            $mensagem = "erro na atualizacao dos dados";
            return back()->with(compact('fail' ,$mensagem));
        }
    }
    public function list_users(){
        $usuarios = DB::table('users')->paginate(10);
        return view('auth.listusers' , compact('usuarios'));
    }
    public function show_user($id){
        $usuario = User::where('id', $id)->get();
        $usuario = $usuario[0];
        $tipos = Tipo_user::all();
        return view('auth.showuser' , compact('usuario','tipos'));
    }
    public function edit_user($id){
        $usuario = User::where('id', $id)->get()->first();
        $tipos = Tipo_user::all();
        return view('auth.register' , compact('usuario','tipos'));
    }

    public function update_user(Request $request, $id){
        $this->validate(request(), [
            'name' => 'required|max:50',
            'email' => 'required|email|',
            'password' => 'required|min:8',
            'password2' => 'min:8|required_with:password|same:password',
        ],[
            'name.required' => 'Preencha o nome do usuário',
            'name.max'      => 'Digite no máximo 50 caracteres neste campo',
            'email.required' => 'Preencha o e-mail do usuário',
            'email.email'      => 'Utilize o @ pois este é um campo de e-mail',
            'password.required' => 'Os campos de senhas são obrigatorios',
            'password.min'      => 'Digite no mínimo 8 caracteres neste campo',
            'password2.required' => 'Os campos de senhas são obrigatorios',
            'password2.min'      => 'Digite no mínimo 8 caracteres neste campo',
            'password2.required_with:password'      => 'Digite no mínimo 8 caracteres neste campo',
            'password2.same' => 'Os campos senha e confirmação de senha devem ter os mesmos valores',
            ]);

            $user  = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->tipo_user = $request->tipo_user;
            $user->password = bcrypt($request->password);
            // return $user;
        if ($user->save()) {
                $mensagem = "Dados alterados com sucesso";
                return back()->with(compact('mensagem'));
        }else{
            $mensagem = "erro na atualizacao dos dados";
            return back()->with(compact('fail' ,$mensagem));
        }
    }
    public function destroy_user($id)
    {

        // Deleta as tabelas e redireciona
        $user  = User::find($id);
        $user->delete();
        $mensagem = "Usuário deletado com sucesso";
        return redirect()->route('admin.list_users')->with(compact('mensagem'));
    }
}
