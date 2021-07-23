@extends('layouts.principal')

@section('conteudo')
@section('titulo', 'Departamentos')
    <h3>Departamentos:</h3>

    <ul>
        <li>Computadores</li>
        <li>Eletrônicos</li>
        <li>Acessórios</li>
    </ul>


@component('componentes.alerta', ['titulo'=> 'ERROR', 'tipo'=>'error'])
<p><strong>Erro inesperado</strong></p>
<p>Ocorreu um erro inesperado</p>
@endcomponent

@component('componentes.alerta', ['titulo'=> 'ALERTA', 'tipo'=>'warning'])
<p><strong>Alerta para vírus</strong></p>
<p>Seu pc está sem antivírus</p>
@endcomponent

@component('componentes.alerta', ['titulo'=> 'SUCESSO', 'tipo'=>'success'])
<p><strong>Sucesso ao salvar</strong></p>
<p>Arquivo salvo com sucesso</p>
@endcomponent

@endsection