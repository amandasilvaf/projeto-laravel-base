<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
    <style>
          .row {
              display: flex;
            }
          
          .col1 {
            flex: 30%;
            padding: 10px;
          }
          
          .col2 {
            flex: 70%;
            padding: 10px;
          }
          
          .menu ul
          {
            margin: 0px;
            padding: 0px;
            list-style-type: none;
          }
          
          .menu li
          {
            list-style: none;
          }
          
          .menu a
          {
            display: block;
            width: 200px;
            height: 20px;
            color: black;
            background-color: #FFFFFF;
            text-decoration: none;
            text-align: center;
            margin: 5px;
            font-size: 18px;
          }
          
          .menu a:hover
          {
            background-color: #b9bcd0;
            color: #0000ff;
            font-weight: bold;
          }
          
          .menu .active
          {
            background-color: #c0d4f3;
          }
    </style>
</head>
<body>
  <div class="row">
    <div class="col1">
        <div class="menu">
            <ul>
              <li><a href="{{route('clientes.index')}}">Clientes</a></li>
              <li><a href="">Produtos</a></li>
              <li><a href="">Departamentos</a></li>
            </ul>
        </div>
    </div>
    <div class="col2">
      @yield('conteudo')
    </div>
  </div>
  
</body>
</html>