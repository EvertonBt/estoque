<?php 
namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller {

public function __construct()
{

/* usando meu próprio middleware
$this->middleware('nosso-middleware',
['only' => ['adiciona', 'remove']]);

*/

//Usando o middleware padrão

$this->middleware('auth',
['only' => ['adiciona', 'remove']]);
}



public function lista(){

$html = "<h1>Listagem de produtos com Laravel</h1>";
$html .= "<ul>";

/* Usando o facade com sql
$produtos = DB::select('select * from produtos');
return  view('produto/listagem')->with('produtos', $produtos);
*/

// Usando o eloquent orm, o método all retorna todos os registros:

$produtos = Produto::all();
return view('produto/listagem')->with('produtos', $produtos);


// Também pode fazer passando um array assim: return view(’listagem’, [’produtos’ => $produtos]);
/*
Usando o método exists para testar se uma view existe e usando o método file para gerar uma view a partir de um caminho qualquer

if (view()->exists(’listagem’))
{
return view(’listagem’);
}

view()->file(’/caminho/para/sua/view’);

*/
}

public function mostra($id){

// Ao passar o valor como parametro de busca, se recebe assim:
//$id = Request::input('id', '0'); 
// Ao passar o valor como parametro de rota se recebe como abaixo, e outra forma é recebendo o valor como parametro do método mostra
//$id = Request::route(’id’);

// usando o Facade
//$resposta = DB::select('select * from produtos where id = ?', [$id]);
//return view('produto/detalhes')->with('p', $resposta[0]);

//Usando o eloquent orm
$resposta = Produto::find($id);


if(empty($resposta)) {
return "Esse produto não existe";
}
return view('produto/detalhes')->with('p', $resposta);
}

// o request tem também outros métodos como o all, has, except, only
// lista todos os params
//$input = Request::all();
// apenas nome e id
//$input = Request::only(’nome’, ’id’);
// todos os params, menos o id
//$input = Request::except(’id’);
// Retorna a url atual: http://localhost:8000/produtos/mostra
//$url = Request::url();
// Retorna a uri: exemplo /produtos/mostra
//$uri = Request::path();



public function novo(){
	return view('produto/formulario');
	
}

public function adiciona(ProdutoRequest $request){

/* Usando o Facade
$nome = Request::input('nome');
$descricao = Request::input('descricao');
$valor = Request::input('valor');
$quantidade = Request::input('quantidade');

DB::insert('insert into produtos
(nome, valor, descricao, quantidade) values (?,?,?,?)',
array($nome, $valor, $descricao, $quantidade));

*/

//Usando o orm
 /*
$param = Request::all();
$produto = new Produto($param);
$produto->save();
*/
//Outra forma é fazer tudo numa linha e usando validação
Produto::create($request->all());

//enviando o valor "nome" para a página de listagem
return redirect('/produtos')->withInput(Request::only('nome'));



// posso mandar todos os valores de volta no redirect assim :
//return redirect('/produtos')->withInput();

// Ou todos exceto um :
//return redirect('/usuarios')->withInput(Request::except(’senha’));


// Dá para fazer redirects acessando diretamente o método do controller assim
//return redirect()->action(’ProdutoController@lista’)->withInput(Request::only(’nome’));

// Antes, quando após adicionar o produto ele direcionava para essa pagina, agora ele direciona para a página de listagem
 //return view('produto.adicionada')->with('nome', $nome);

// Uma forma de testar se o valores estão sendo passados
//return implode( ', ', array($nome,
//$descricao, $valor, $quantidade));

// 

/*Outra forma de fazer insert
DB::table(’produtos’)->insert(
[’nome’ => $nome,
’valor’ => $valor,
’descricao’ => $descricao,
’quantidade’ => $quantidade
]
);
*/


}

public function remove($id){

$produto = Produto::find($id);
$produto->delete();
return redirect()->action('ProdutoController@lista');
	
}



// Vai retornar a lista de produtos no formato padrão Json
public function listaJson(){

 // Usando o Facade DB com sql
 //$produtos = DB::select('select * from produtos');
 
 //Usando o método orm
 $produtos = Produto::all();
 
 //  Pode ser mais explícito usando o response
 return response()->json($produtos); 

 
 
}

public function download(){
	// Faz download de um arquivo
	$caminho = "F:\Programas\downloads\download.txt";
	return response()->download($caminho);
	
}

}         