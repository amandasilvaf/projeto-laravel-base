@extends('layouts.principal')
@section('conteudo')
@section('titulo', 'Clientes - Adicionar')

    <h1>Novo Cliente</h1>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf 
        <input type="text" name="nome">
        <input type="submit" value="Salvar">
    </form>
@endsection