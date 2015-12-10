@extends('layout/master')
<?php $title='Registrar Abogado' ?>
<?php $message=Session::get('message') ?>
@if($message == 'ok')
@section('script')
    <script>
        var n = noty({text: 'Abogado registrado Correctamente!', type: 'success'});
    </script>
@endsection
@endif
@section('content')
    @include('alerts.request')
    {!! Form::open(['route' => 'lawyer_create', 'class' => 'form']) !!}
    @include('lawyer.form')
    <hr/>
    <div class="row">
        <div class="col-lg-2">
            {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection