<h1>Clientes: listando de dentro da View Clientes.Index</h1>
<a href="{{ route('clientes.create' )}}">NOVO CLIENTE</a>
<ol>
    @foreach($clientes as $c)
        <li>
            {{ $c['nome']}} |
            <a href="{{ route('clientes.edit', $c['id']) }}">Editar</a>
            <a href="{{ route('clientes.show', $c['id']) }}">Info</a>
            
        </li>
    @endforeach
</ol>