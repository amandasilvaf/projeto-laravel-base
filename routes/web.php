<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Desenvolvedor;
use App\Models\Projeto;
use App\Models\Alocacao;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rota com parâmetros. Os parâmetros serão atribuídos respectivamente na função.
Route:: get('/ola/{nome}/{sobrenome}', function($nome1, $lastname){
    return "Olá, {$nome1} {$lastname}";
});

// Rota com parâmetro(s) opcional(ais)
// nesse caso, o que torna o parâmetro opcional é o "?", e devo iniciar a variável como nula, na função
Route::get('/seunome/{nome?}', function($nome=null) {
    if(isset($nome)){
        return "Olá, {$nome}";
    }
    return "Você não digitou nenhum nome (parâmetro opcional).";
});

// Rota com regras
// Regras: $nome = letras e $n = int. 
// Expressões regulares.
Route::get('rotacomregras/{nome}/{n}', function($nome, $n) {
    for($i=0; $i<$n; $i++)
        echo "Olá, {$nome}. <br>";
})->where('nome', '[A-Za-z]+')
  ->where('n', '[0-9]+');  

// Agrupando rotas
Route::prefix('/app')->group(function(){
    
    Route::get('/', function() {
        return view('app');
    })->name('app');

    Route::get('/user', function() {
        return view('user');
    })->name('app.user');

    Route::get('/profile', function() {
        return view('profile');
    })->name('app.profile');
    
});

// Nomeando as rotas
/*Route::get('/produtos', function() {
    return view('produtos');
})->name('meusprodutos');*/

// Redirecionando Requisições
// ('de onde veio', 'pra onde vai', 301?? )
Route::redirect('todosprodutos1', 'meusprodutos', 301);

// Agora redirecionando de maneira parecida com o que irá acontecer qnd utilizar controllers
Route::get('todosprodutos2', function() {
    return redirect()->route('meusprodutos');
});

// MÉTODOS DE REQUISIÇÕES HTTP //

// GET - para 'pegar'
Route::get('/requisicoes', function(Request $req) {
    return 'Hello, GET!';
});

// POST - para enviar
Route::post('/requisicoes', function(Request $req) {
    return 'Hello, POST!';
});

// DELETE - para deletar
Route::delete('/requisicoes', function(Request $req) {
    return 'Hello, DELETE!';
});

// PUT - para salvar
Route::put('/requisicoes', function(Request $req) {
    return 'Hello, PUT!';
});

// PATCH - para salvar, também
Route::patch('/requisicoes', function(Request $req) {
    return 'Hello, PATCH!';
});

// OPTIONS
Route::options('/requisicoes', function(Request $req) {
    return 'Hello, OPTIONS!';
});

// ('url', 'Controller@Método')
Route::get('oi', 'App\Http\Controllers\MeuControlador@intro');
Route::get('nome', 'App\Http\Controllers\MeuControlador@getNome');
Route::get('idade', 'App\Http\Controllers\MeuControlador@getIdade');
Route::get('multiplicar/{n1}/{n2}', 'App\Http\Controllers\MeuControlador@multiplicar');

// Chamando todos os métodos do controlador de uma vez só,
// utilizando o resource (mesmo atributo usado para criar o controllador).
// php artisan make:controller ClienteControlador --resource
Route::resource('clientes', 'App\Http\Controllers\ClienteControlador');


Route::get('produtos', function() {
    return view('outras.produtos');
})->name('produtos');

Route::get('departamentos', function() {
    return view('outras.departamentos');
})->name('departamentos');


Route::get('opcoes/{opcao?}', function($opcao=null) {
    return view('outras.opcoes', compact(['opcao']));
})-> name('opcoes');



Route::get('bootstrap', function() {
    return view('outras.exemploBootstrap');
});


Route::get('/clientes', function() {
    $clientes = Cliente::all();
    foreach($clientes as $c){
        echo "<p>ID: " . $c->id . "</p>";
        echo "<p>Nome: " . $c->nome . "</p>";
        echo "<p>Telefone: " . $c->telefone . "</p>";
        echo "<p>Rua: " . $c->endereco->rua . "</p>";
        echo "<p>Número: " . $c->endereco->numero . "</p>";
        echo "<p>Bairro: " . $c->endereco->bairro . "</p>";
        echo "<p>Cidade: " . $c->endereco->cidade . "</p>";
        echo "<p>Estado: " . $c->endereco->estado . "</p>";
        echo "<p>CEP: " . $c->endereco->cep . "</p>";
        echo "<hr>";
    }
});



Route::get('/enderecos', function() {
    $ends = Endereco::all();
    foreach ($ends as $e){
        echo "<p>ID: " . $e->cliente_id . "</p>";
        echo "<p>Nome: " . $e->cliente->nome . "</p>";
        echo "<p>Telefone: " . $e->cliente->telefone . "</p>";
        echo "<p>Rua: " . $e->rua . "</p>";
        echo "<p>Número: " . $e->numero . "</p>";
        echo "<p>Bairro: " . $e->bairro . "</p>";
        echo "<p>Cidade: " . $e->cidade . "</p>";
        echo "<p>Estado: " . $e->estado . "</p>";
        echo "<p>CEP: " . $e->cep . "</p>";
        echo "<hr>";

    }
    
});

Route::get('/inserir', function() {
    $c = new Cliente();
    $c->nome = "Amanda Ferreira";
    $c->telefone="44998989898";
    $c->save();

    $e = new Endereco();
    $e->rua = "Rua A";
    $e->numero = 2211;
    $e->bairro = "Porto Madero";
    $e->cidade = "Umuarama";
    $e->uf = "pr";
    $e->cep = "87504-590";
    
    $c->endereco()->save($e);

    $c = new Cliente();
    $c->nome = "Geovani Pereira";
    $c->telefone="44998989898";
    $c->save();

    $e = new Endereco();
    $e->rua = "Rua A";
    $e->numero = 2211;
    $e->bairro = "Porto Madero";
    $e->cidade = "Umuarama";
    $e->uf = "pr";
    $e->cep = "87504-590";
    
    $c->endereco()->save($e);
});


Route::get('/clientess/json', function() {

    //return Cliente::all()->toJson(); // Retornaria sem o endereço, Lazy Loading!
    $clientes = Cliente::with(['endereco'])->get(); // agora sim com o o endereco. Eager Loading
    return $clientes->toJson(); 
});

Route::get('/enderecoss/json', function() {

    $enderecos = Endereco::with(['cliente'])->get(); 
    return $enderecos->toJson(); 
});


Route::get('/categorias', function() {
    $cats = Categoria::all();
    foreach($cats as $c){
        echo "<p>  {$c->id}   -   {$c->nome}  </p>";
    }
});

Route::get('/produtos', function() {
    $prods = Produto::all();
    echo "<table>";
    echo "<thead><tr><td>Nome</td><td>Estoque</td><td>Valor</td><td>Categoria</tr></thead>";

    foreach($prods as $p){
        echo "<tr>";
        echo "<td> {$p->nome} </td>";
        echo "<td> {$p->estoque} </td>";
        echo "<td> {$p->valor_atual} </td>";
        echo "<td> {$p->categoria->nome} </td>";
        echo "</tr>";    
    }
});

Route::get('/categoriaprodutos', function() {
    $cats = Categoria::all();
    foreach($cats as $c){
        echo "<p>  {$c->id}   -   {$c->nome}  </p>";
        $produtos = $c->produtos;

        if(count($produtos)){
            echo "<ul>";
            foreach($produtos as $p){
                echo "<li> {$p->nome} </li>";
            }
            echo "</ul>";
        }
    }
});


Route::get('/categoriaprodutos/json', function() {
    $cats = Categoria::with('produto')->get();
    return $cats->toJson();
});


Route::get('/adicionarproduto', function() {
    $cat = Categoria::find(1);
    $p = new Produto();
    $p->nome = "Calca Jeans Pittbul";
    $p->estoque = 20;
    $p->valor_atual = 350;
    $p->categoria()->associate($cat);
    $p->save();
    return $p->toJson();
});



Route::get('/removerprodutocategoria', function() {
    $p = Produto::find(1);
    if(isset($p)){
        $p->categoria()->dissociate();
        $p->save();
        return $p->toJson();
    }
    else{
        return "Não há produto com o ID passado como parâmetro";
    }
});


Route::get('/adicionarproduto/{cat}', function($catid) {
    $cat = Categoria::with('produto')->find($catid);

    $p = new Produto();
    $p->nome = "Colar de pérolas";
    $p->estoque = 5;
    $p->valor_atual = 300;

    if(isset($cat)){
        $cat->produto()->save($p);
    }
    $cat->load('produto');
    return $cat->toJson();
});


Route::get('/desenvolvedor_projeto', function() {
    $devs = Desenvolvedor::with('projetos')->get();
    //return $devs->toJson();

    foreach($devs as $dev){
        echo "<p>Nome do desenvolvedor: {$dev->nome}</p>";
        echo "<p>Cargo: {$dev->cargo}</p>";
        if(count($dev->projetos) > 0){
            echo "Projetos: <br>";
            echo "<ul>";
            foreach($dev->projetos as $p){
                echo "<li>";
                echo "Nome: {$p->nome} <br>";
                echo "Horas previstas: {$p->horas_previstas} <br>";
                echo "Horas trabalhadas: {$p->pivot->horas_trabalhadas} <br><br>";
                echo "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";

    }

});


Route::get('/projeto_desenvolvedor', function() {
    $projetos = Projeto::with('desenvolvedores')->get();
    //return $projetos->toJson();

    foreach($projetos as $p){
        echo "Nome do Projeto: {$p->nome} <br>";
        echo "Horas previstas: {$p->horas_previstas} <br>";
        if(count($p->desenvolvedores) > 0){
            echo "Desenvolvedores: <br>";
            echo "<ol>";
            foreach($p->desenvolvedores as $dev){
                echo "<li>";
                echo "Nome: {$dev->nome} <br>";
                echo "Horas trabalhadas: {$dev->pivot->horas_trabalhadas}<br>";
                echo "</li>";
            }
            echo "</ol>";
            echo "<hr>";
        }

    }
    
});



