<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Requests;
use estoque\Http\Controllers\Controller;
use Request;
use Auth;


class AutenticaController extends Controller
{

public function login()
{          
   $credenciais = Request::only('email', 'password');
     if(Auth::attempt($credenciais)) {
             if(Auth::attempt($credenciais)) {
               return "Usuário ".
                Auth::user()->name." logado com sucesso";
}
  }
              return "As credencias não são válidas";

// Usa o true como função lembrar senha, onde o usuário fica logado por tempo indeterminado  
//if(Auth::attempt($credenciais, true))
	
// fazer logout Auth::logout(); 

// verifica apenas se as credenciais são
// válidas, sem necessariamente se logar
//Auth::validate($credentials);
// para logar um usuário de determinado id
//Auth::loginUsingId(7);
// para ver se o usuário está logado
//Auth::check();
// ou então, verificar o próprio usuário
//Auth::user();

}




}
  
  