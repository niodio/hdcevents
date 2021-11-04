<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>


    <!-- CSS Styles da aplicação -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- JavaScripts da aplicação -->
    <script src="/assets/js/script.js"></script>

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/hdcevents_logo.svg" type="image/x-icon">

    <!--- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

  <!--- Bootstrap 5 --->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container ">
            <div class="navbar-brand">
                <img src="/assets/img/hdcevents_logo.svg" alt="Logo da empresa" class="logo">
            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index')}}">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.create') }}">Criar Evento</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">Meus eventos</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <a href="/logout"
                                class="nav-link" 
                                onclick="event.preventDefault();
                                    this.closest('form').submit()">Sair</a>
                            </form>
                        </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Cadastrar</a>
                    </li>    
                    @endguest
                      
                </ul>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </nav>
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                @if (session('message'))
                    <p class="msg">{{ session('message')}}</p>
                @endif
                @yield('content')
            </div>
        </div>
    <footer>
        
        <p>HDC Events &copy; 2021</p>
    </footer>

    <!-- ionicons -->
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>


</body>
</html>