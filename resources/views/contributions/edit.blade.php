@extends('layout/master')
<?php $title='Editar Pago' ?>
<?php $message=Session::get('message') ?>
@section('content')
    @include('alerts.request')
    <div class="row">
        <div class="form-group col-sm-3 col-md-3 col-lg-3">
            {!! Form::label('registration_number','Matricula') !!}
            {!! Form::text('registration_number',$lawyer->registration_number, ['class'=> 'form-control', 'ReadOnly'=>'true']) !!}
        </div>
        <div class="form-group col-sm-4 col-md-4 col-lg-4">
            {!! Form::label('first_name','Nombres ') !!}
            {!! Form::text('first_name', $lawyer->first_name, ['class'=> 'form-control', 'ReadOnly'=>'true']) !!}
        </div>
        <div class="form-group col-sm-4 col-md-4 col-lg-4">
            {!! Form::label('last_name','Apellidos ') !!}
            {!! Form::text('last_name', $lawyer->last_name, ['class'=> 'form-control', 'ReadOnly'=>'true']) !!}
        </div>
    </div>
    <hr/>
    {!! Form::open(['route' => 'contribution_edit', 'class' => 'form']) !!}
    <input id="id" name="id" type="hidden" value="{!! $contribution->id !!}"/>
    <input id="lawyer_id" name="lawyer_id" type="hidden" value="{!! $lawyer->id !!}"/>
    <div class="row">
        <div class="form-group col-lg-3">
            {!! Form::label('year','A&#241;o') !!}
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-primary glyphicon glyphicon-chevron-left" type="button" id="btn_year_down2"></button>
               </span>
                <input id="year2" name="year" type="text" class="form-control" readonly="true" value="{!! $contribution->year !!}">
               <span class="input-group-btn">
                    <button class="btn btn-primary glyphicon glyphicon-chevron-right" type="button" id="btn_year_up2"></button>
               </span>
            </div>
        </div>
        <div class="form-group col-lg-3">
            {!! Form::label('month','Mes') !!}
            {!! Form::select('month', array('1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril', '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio', '8' => 'Agosto', '9' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'), $contribution->month , ['class'=> 'form-control', 'id'=>'month2']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2">
            {!! Form::label('amount','Monto',['class'=>'required']) !!}
            {!! Form::text('amount', $contribution->amount, ['class'=> 'form-control']) !!}
        </div>
        <div class="form-group col-lg-8">
            {!! Form::label('description','Nota') !!}
            {!! Form::text('description', $contribution->description, ['class'=> 'form-control']) !!}
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