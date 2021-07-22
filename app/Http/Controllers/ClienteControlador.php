<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    // Simulando uma tabela de clientes para trabalhar os métodos
    private $clientes = [
        ['id'=> 1, 'nome'=>'Amanda'],
        ['id'=> 2, 'nome'=>'Geovani'],
        ['id'=> 3, 'nome'=>'Isabela'],
        ['id'=> 4, 'nome'=>'João']
    ];

    public function __construct()
    {
        $clientes = session('clientes');
        if(!isset($clientes))
            session(['clientes' => $this->clientes]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   /*
        // lista os clientes
        $clientes = $this->clientes;
        return view('clientes.index', compact(['clientes']));
        // view('pasta.método') 
        Essa era a maneira correta, mas agora vamos ter de buscar na
        sessão, para resolver a questão de recriar o array de clientes
        sempre que chama o controlador (pois não estamos trabalhando
        com banco).*/
        $clientes = session('clientes');
        return view('clientes.index', compact(['clientes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $id = count($this->clientes) +1;
        $nome = $request->nome;
        $dados = ["id"=>$id, "nome"=>$nome];
        $this->clientes[] = $dados;
        dd($this->clientes);
        return redirect()->route('clientes.index');
        // esse seria o retorno, mas como não estamos 
        // trabalhando com banco, apenas simulando uma tabela 
        // com um array no próprio controlador, quando o redirect
        // chamar a rota clientes.index, ele irá apagar o que acabei
        // de fazer aqui e criar novamente o array de clientes do jeito
        // que era antes. 
        // Para resolver isso vamos armazenar os novos clientes em sessão.
        Veja a seguir: PS: o curso podia trabalhar com o real e não com simulações :/*/

        $clientes = session('clientes');
        $id = count($clientes) + 1;
        $nome = $request->nome;
        $dados = ["id"=>$id, "nome"=>$nome];
        $clientes[] = $dados;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = session('clientes');
        $cliente = $clientes[$id - 1];
        return view('clientes.info', compact(['cliente']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = session('clientes');
        $cliente = $clientes[$id - 1];
        return view('clientes.edit', compact(['cliente']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = session('clientes');
        $clientes[$id - 1]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = session('clientes');
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        array_splice($clientes, $index, 1); // 1 é o nº de dígitos a serem apagados a partir da posição do $index
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }
}
