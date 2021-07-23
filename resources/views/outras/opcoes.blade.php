@extends('layouts.principal')
@section('titulo', 'Opcoes')
@section('conteudo')


<div class="options">
    <ul>
        <li><a class="warning" href="{{ route('opcoes', 1)}}">Warning</a></li>
        <li><a class="info" href="{{ route('opcoes', 2)}}">Info</a></li>
        <li><a class="success" href="{{ route('opcoes', 3)}}">Success</a></li>
        <li><a class="error"   href="{{ route('opcoes', 4)}}">Error</a></li>
    </ul>
</div>

@if(isset($opcao))
    
    @switch($opcao)
        @case(1)
                <x-component-alert tipo="warning" titulo="Warning">
                </x-component-alert>
            @break
        @case(2)
                <x-component-alert tipo="info" titulo="Info">
                </x-component-alert>
            @break
        @case(3)
                <x-component-alert tipo="success" titulo="Success">
                </x-component-alert>
            @break
        @case(4)
                <x-component-alert tipo="error" titulo="Error">
                </x-component-alert>
            @break
        @default

    @endswitch

@endif

@endsection
