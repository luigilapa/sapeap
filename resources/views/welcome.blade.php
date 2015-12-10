@extends('layout/assets')
@section('style')
    {!! Html::style('assets/css/welcome.css') !!}
@endsection
@section('nav')
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('/')}}">Asociaci&#243;n Abogados Manta</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('about')}}">Acerca de</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (!Auth::guest())
                        <li class="page-scroll">
                            <a href="{{route('home')}}" title="Ingresar">{{ Auth::user()->first_name }} <small class="glyphicon glyphicon-user"></small> </a>
                        </li>
                    @else
                        <li class="page-scroll">
                            <a href="{{route('login')}}" title="Ingresar"> Iniciar Sesi&#243;n <small class="glyphicon glyphicon-log-in"></small> </a>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
@endsection
@section('content')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive img-circle" src="assets/image/logo.jpg" alt="" style="width: 150px; height: 150px;">
                    <div class="intro-text">
                        <h1 class="nv-title">Asociación de Abogados de Manta</h1>
                        <hr class="star-light">
                        <h2 class="skills">Padrón Electoral</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('footer')

@endsection
