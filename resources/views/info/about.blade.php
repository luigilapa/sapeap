@extends('layout/assets')
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
                    <li class="active"><a href="{{route('about')}}">Acerca de</a></li>
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
    <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Acerca de</h3>
            </div>
            <div class="panel-body">

                <div>
                    <p class="text-justify">
                        Esta aplicaci&#243;n web ha sido desarrollada por estudiantes de la
                        <b><a href="https://www.facebook.com/Facci.Uleam" target="_blank">Facultad de Ciencias Inform&#225;ticas</a></b>
                        de la
                        <b><a href="http://www.uleam.edu.ec/" target="_blank">Universidad Laica Eloy Alfaro de Manab&#237;</a></b>.
                        <br/><br/>
                        En colaboraci&#243;n con la comunidad la facultad de Ciencias Inform&#225;ticas y el
                        <b>&#193;rea de Vinculaci&#243;n con la Colectividad</b>
                        brinda un aporte de manera social a las asociaciones profesionales a trav&#233;s
                        de herramientas inform&#225;ticas para impulsar su funcionalidad electoral.
                    </p>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" style="color: #33A5E7">Desarrollado Por:</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class=" col-sm-6 col-md-3 col-lg-2"><a>Chavez Chavez Andrea</a></div>
                            <div class=" col-sm-6 col-md-3 col-lg-2">andreac.chavez@hotmail.com</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3 col-lg-2"><a href="https://ec.linkedin.com/pub/luis-palma/a5/829/777" target="_blank">Palma Andrade Luis</a></div>
                            <div class="col-sm-6 col-md-3 col-lg-2">lapa89@outlook.es</div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="color: #33A5E7">Tutor:</div>
                    <div class="panel-body">
                        <p>Ing. Luzminla Lopez</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="color: #33A5E7">Departamento de Vinculaci&#243;n:</div>
                    <div class="panel-body">
                        <p>Ing. Jorge Moya</p>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('footer')
    <div class="row">
        <div class="col-xs-3 col-md-3">
            <a href="#" class="thumbnail">
                <img src="/assets/image/logo_uleam.png" alt="ULEAM" style="width: 40px; height: 70px;">
            </a>
        </div>
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="/assets/image/logo_facci.png" alt="ULEAM" style="width: 150px; height: 70px;">
            </a>
        </div>
    </div>
@endsection