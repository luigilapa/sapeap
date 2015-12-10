@extends('layout/master')
<?php $title='Cambiar Contrase&#241;a' ?>
@section('content')
    @include('alerts.request')
    {!! Form::open(['route' => 'user_reset', 'class' => 'form']) !!}
    <div class="row">
        <label class="col-lg-4 label label-danger">Verificaci&#243;n de credenciales</label>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label>Usuario</label>
            {!! Form::text( 'user', '', ['class'=> 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label>Contrase&#241;a</label>
            {!! Form::password('password', ['class'=> 'form-control']) !!}
        </div>
    </div>
    <hr/>
    <div class="row">
        <label class="col-lg-4 label label-warning">Ingrese su nuevo nombre de usuario</label>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label>Nuevo Usuario</label>
            {!! Form::text( 'new_user', '', ['class'=> 'form-control']) !!}
        </div>
    </div>
    <hr/>
    <div class="row">
        <label class="label label-warning col-lg-4">Ingrese su nueva contrase&#241;a</label>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label>Nueva Contrase&#241;a</label>
            {!! Form::password('new_password', ['class'=> 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label>Confirmaci&#243;n de contrase&#241;a</label>
            {!! Form::password('new_password_confirmation', ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div>
        {!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection