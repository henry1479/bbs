<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>объявления :: @yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/main.css')}}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="{{ route('index')}}" class="navbar-brand me-auto ">Главная</a>
            <div class="nav-link__block">
            <a href="{{ route('rubrics_index')}}" class="nav-item nav-link">Рубрики</a>
              @guest
                <a href="{{ route('register')}}" class="nav-item nav-link">Регистрация</a>
                <a href="{{ route('login')}}" class="nav-item nav-link">Вход</a>
              @endguest
              @auth
                <p  class="text-success">{{ Auth::user()->name }}</p>
                <a href="{{ route('home')}}" class="nav-item nav-link">Мои объявления</a>
                <a href="{{ route('message.show')}}" class="nav-item nav-link">Мои сообщения</a>
            </div>
            <form action="{{ route('logout')}}" method="POST" class="form-inline">
                @csrf
                <input type="submit" class="btn btn-danger" value="Выход"/>
            </form>
            @endauth
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
          </main>
        </div>
    </div>
      <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>

  </body>
