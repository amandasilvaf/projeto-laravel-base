@extends('layouts.principal')
@section('conteudo')
@section('titulo', 'Clientes - Listar')

    <h1>{{$titulo}}:</h1>
    <a href="{{ route('clientes.create')}}">NOVO CLIENTE</a>

    //Todos os comandos do template Blade começam com @
    @if(count($clientes) > 0)
    <ul>
        @foreach($clientes as $c)
            <li>
                {{ $c['id']}} | {{ $c['nome']}}
                <a href="{{ route('clientes.edit', $c['id']) }}">Editar</a>
                <a href="{{ route('clientes.show', $c['id']) }}">Info</a>
                <form action="{{ route('clientes.destroy', $c['id'])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Apagar">
                </form>
            </li>
        @endforeach
    </ul>

    @else
    <h4>Não existem clientes cadastrados.</h4>
    @endif

    @empty($clientes)
        <h3>Não existem clientes cadastrados. (EMPTY)</h3>
    @endempty

    <hr>
    <h3>LOOPS</h3>
    
    @for ($i = 0; $i <10 ; $i++)
        {{ $i }},
    @endfor

    <br>
    @for ($i = 0; $i < count($clientes) ; $i++)
        {{ $clientes[$i]['nome'] }},
    @endfor

    <hr>
    @foreach($clientes as $c)
        <p> 
            {{$c['nome']}} | {{$loop->index}} |
            @if($loop->first)
                Primeiro do loop |
            @endif
            @if($loop->last)
                Último do loop |
            @endif
            {{ $loop->iteration}} de {{ $loop->count}}
        </p> 
    @endforeach
    <hr>

@endsection