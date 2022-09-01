<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <title>{{ \Artesaos\SEOTools\Facades\SEOMeta::getTitle() }}</title>

    <script type="text/javascript" src="selectize.js"></script>
    <link rel="stylesheet" type="text/css" href="selectize.css" />


</head>
<body>
@include('components.main.usersbar')

<div class="container" style="color: white">
    <div class=" my-2 text-white">
        <h2> {{ Artesaos\SEOTools\Facades\SEOMeta::getTitle() }} </h2>
    </div>

    <main id="main" class="mt-3">

        @if(session('flash_message') && isset(session('flash_message')['type']) && isset(session('flash_message')['text']))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="alert alert-{{ session('flash_message')['type'] }} text-center">
                            {!!  session('flash_message')['text']!!}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>

<script>
    $(function () {
        $("selectize").selectize();
    });
</script>
</body>
</html>
