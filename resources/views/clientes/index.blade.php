<h1>Clientes: listando de dentro da View Clientes.Index</h1>
<a href="{{ route('clientes.create' )}}">NOVO CLIENTE</a>
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

// Teste commit