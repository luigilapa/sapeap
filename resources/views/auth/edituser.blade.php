@extends('layout/master')
<?php $title='Editar Usuario' ?>
@section('content')
    @include('alerts.request')
    {!! Form::open(['route' => 'user_edit', 'class' => 'form']) !!}
    <div class="row">
        <input name="id"  type="hidden" value={{$user->id}} />
        <div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label class="required">Nombres</label>
            {!! Form::text('first_name', $user->first_name, ['class'=> 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label class="required">Apellidos</label>
            {!! Form::text('last_name', $user->last_name, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-md-6 col-lg-6">
            <label>Email</label>
            {!! Form::email('email', $user->email, ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-md-6 col-lg-3">
            <label>Perfil</label>
            {!! Form::select('type', array('admin' => 'Administrador', 'user' => 'Usuario'), $user->type , ['class'=> 'form-control']) !!}
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-lg-2">
            {!! Form::submit('Actualizar',['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection