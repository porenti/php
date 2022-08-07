<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <title>@yield('ti')</title>
</head>
<body class="bg-dark">
  <div class="container" style="color: white; margin-top: 5%">
    <h1> @yield('ti') <h1>
  </div>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top", style="background-color: #808080">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Тц</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('main')}}">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('users.create')}}">Создать</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container" style="color: white; margin-top: 5%">
    @yield('content')
    </div>

</body>
</html>
