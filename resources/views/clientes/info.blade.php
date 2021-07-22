@extends('layouts.principal')
@section('conteudo')
    <h1>Informações do Cliente</h1>

    <h3>ID: {{$cliente['id']}} </h3>
    <h3>NOME: {{$cliente['nome']}} </h3>
    <br>

    <a href="{{route('clientes.index')}}">Voltar para a listagem</a>
@endsection