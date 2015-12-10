<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aso. Ab. Manta</title>
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    @yield('style')
</head>
<body>

@yield('nav');

<div class="container-fluid main-container">
    @yield('content')
</div>

{!! Html::script('assets/js/jquery.js') !!}
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/noty/packaged/jquery.noty.packaged.min.js') !!}
@yield('script');
</body>
<footer class="footer">

    <hr class="divider"/>
    @yield('footer')
</footer>
</html>
