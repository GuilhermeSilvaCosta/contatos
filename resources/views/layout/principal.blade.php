<html>
<head>
	<link href="/css/app.css" rel="stylesheet">
	<link href="/css/custom.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<title>Controle de Contatos</title>
</head>
<body>	
	<div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        Contatos Laravel
                    </a>
                </div>
                @guest
                @else
                    <ul class="navbar-nav mr-right ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @endguest
            </div>
        </nav>
        @yield('conteudo')
        <footer class="footer">
            <p>© Desafio Lista de Contatos.</p>
        </footer>        
    </div>
</body>
</html>