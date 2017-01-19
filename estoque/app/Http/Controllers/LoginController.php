<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;
use estoque\Http\Controllers\Controller;
use estoque\Http\Requests;
use Auth;
use Request;

class LoginController extends Controller
{

public function login()
{          
   $credenciais = Request::only('email', 'password');
     if(Auth::attempt($credenciais)) {
              return "Usuário NOME logado com sucesso";
  }
             return "As credencias não são válidas";

			 

}




}
  
  
  

