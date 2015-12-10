@extends('layout/assets')
@section('style')
<style>
    body {
        font: 13px/20px 'Lucida Grande', Tahoma, Verdana, sans-serif;
        color: #404040;
        background: #0ca3d2;
    }
    .login
    {
        margin-top: 5%;
    }
    .about {
        margin: 70px auto 40px;
        padding: 8px;
        max-width: 260px;
        font: 10px/18px 'Lucida Grande', Arial, sans-serif;
        color: #666;
        text-align: center;
        text-shadow: 0 1px rgba(255, 255, 255, 0.25);
        background: #FFFFFF;
        background: rgba(250, 250, 250, 0.5);
        border-radius: 4px;
    }
</style>
@endsection

<?php $message=Session::get('message') ?>
@if($message == 'resetok')
    @section('script')
        <script>
            var n = noty({text: 'Las credenciales han sido cambiadas!', type: 'alert'});
        </script>
    @endsection
@endif

@section('content')
    <div class="row login">
        <div class="col-md-4 col-md-offset-4 vcenter">
            <div class="panel panel-default">
                <div class="panel-heading"><a href={{route('/')}}><h5>Asociaci&#243;n de Abogados de Manta</h5></a></div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'login', 'class' => 'form']) !!}
                    <div class="form-group">
                        <label>Usuario</label>
                        {!! Form::input('text', 'user','', ['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>Contrase&#241;a</label>
                        {!! Form::password('password', ['class'=> 'form-control']) !!}
                    </div>
                    <div class="checkbox">
                        <label><input name="remember" type="checkbox">Recu&#233;rdame</label>
                    </div>
                    <div style="text-align: right">
                        {!! Form::submit('iniciar sesi&#243;n',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                @include('alerts.request')
            </div>
        </div>
    </div>
    <div class="row about">
            <img src="assets/image/logo.jpg" style="width: 100px; height: 100px;">
            <p class="about-author">
                &copy; 2015 <a href="https://www.facebook.com/Facci.Uleam" target="_blank">FACCI - ULEAM </a> <br>
                Desarrollado por <a href="https://ec.linkedin.com/pub/luis-palma/a5/829/777" target="_blank">Luis Palma</a>
                - lapa89@outlook.es
            </p>
    </div>
@endsection