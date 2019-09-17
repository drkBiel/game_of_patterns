<?php

namespace App\Http\Controllers;
use app\Users;
use Illuminate\Http\Request;
Use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticable;
use Illuminate\Support\Collection;

class UserController extends Controller {
    
    //Mostra a lista dos Usuários cadastrados
    public function listUsers(){
        $users = DB::select("select * from users");
        
        return view('listaUsers')->with('users',$users);
    }

    //mostra o dado de 1 Usuário
    public function mostrar(Request $request){
        $id = $request->route('id') ; // precisamos pegar o id de alguma forma
        
        $resposta = DB::select('select * from users where id = ?', [$id]);
        if(empty($resposta)) {
            return "Usuário inexistente";
        }
        return view('detalhes')->with('p', $resposta[0]);
    }

    //Cadastar um Usuário
    public function cadastrar(Request $request){
        $nome = $request->input('cdNome');
        $email = $request->input('cdEmail');
        $tipoUser = $request->input('tpUser');
        $senha = $request->input('cdSenha');
        
        DB::insert('insert into users (name, email, tipoUsuario, pontuacao,senha,tempTotal) values (?,?,?,?,?,?)',
        array($nome, $email, $tipoUser, 0, md5($senha), 0));

        return redirect('/index');

    }

    public static function login(Request $request, Auth $auth){

        $email = $request->input('email');
        $senha = md5($request->input('senha'));

        $resposta = DB::table('users')->select('id')->where('email','=',$email)->get();
        
        $resposta->transform(function($i) { return (array)$i; });
        
        

        echo (int) $resposta[0]['id'];

        print_r($resposta);

        Auth::login($resposta);
        
        
    }
}
