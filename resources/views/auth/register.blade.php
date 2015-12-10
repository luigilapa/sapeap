@extends('layout/master')
<?php $title='Registrar Usuario' ?>
@section('content')
    @include('alerts.request')
    {!! Form::open(['route' => 'user_register', 'class' => 'form']) !!}


    <div class="row">
        <div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label class="required">Nombres</label>
            {!! Form::text('first_name', '', ['class'=> 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label class="required">Apellidos</label>
            {!! Form::text('last_name', '', ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-md-6 col-lg-6">
            <label>Email</label>
            {!! Form::email('email', '', ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-md-6 col-lg-3">
            <label class="required">Usuario</label>
            {!! Form::text( 'user',' ', ['class'=> 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6 col-md-6 col-lg-3">
            <label>Perfil</label>
            {!! Form::select('type', array('admin' => 'Administrador', 'user' => 'Usuario'), 'user' , ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-md-6 col-lg-3">
            <label class="required">Contraseña</label>
            {!! Form::password('password', ['class'=> 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6 col-md-6 col-lg-3">
            <label class="required">Confirmación de contraseña</label>
            {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
        </div>
    </div>
    <hr/>
    <div>
        {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection