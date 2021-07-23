@extends('layouts.principal')

@section('conteudo')
@section('titulo', 'Departamentos')
    <h3>Departamentos:</h3>

    <ul>
        <li>Computadores</li>
        <li>Eletrônicos</li>
        <li>Acessórios</li>
    </ul>



<x-component-alert tipo="error" titulo="ERRO">
 <p><strong>Erro inesperado!!</strong></p>
 <p>teste</p>
</x-component-alert>

<x-component-alert tipo="success" titulo="SUCESSO">
    <p><strong>Sucesso ao salvar!</strong></p>
    <p>teste</p>
</x-component-alert>

<x-component-alert tipo="warning" titulo="ALERTA">
    <p><strong>Alerta para ataques!</strong></p>
    <p>teste</p>
</x-component-alert>

@endsection