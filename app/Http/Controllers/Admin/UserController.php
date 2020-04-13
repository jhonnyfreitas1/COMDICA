<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Tipo_user;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){
        $usuarios = DB::table('users')->paginate(10);
        return view('admin.usuario.index' , compact('usuarios'));
    }

    protected function create(){
        $tipos = DB::table('tipos_users')->get();
        // dd($tipos);
        return view('admin.usuario.adc-edit', compact('tipos'));
    }

    public function store(Request $request){
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

    public function show($id){
        $usuario = User::where('id', $id)->get();
        $usuario = $usuario[0];
        $tipos = Tipo_user::all();
        return view('admin.usuario.show' , compact('usuario','tipos'));
    }

    public function edit($id){
        $usuario = User::where('id', $id)->get()->first();
        $tipos = Tipo_user::all();
        return view('admin.usuario.adc-edit' , compact('usuario','tipos'));
    }

    public function update(Request $request, $id){
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

    public function destroy($id)
    {
        // Deleta as tabelas e redireciona
        $user  = User::find($id);
        $user->delete();
        $mensagem = "Usuário deletado com sucesso";
        $mensagem = 'Instituição excluida com Sucesso!';
        return redirect('/admin/users')->with('mensagem',$mensagem);

    }
}
