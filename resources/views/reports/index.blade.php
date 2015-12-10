@extends('layout/master')

<?php $title='Imprimir Lista Abogados en PDF' ?>

@section('content')
        <div class="row " data-toggle="collapse" data-target="#filters" style="cursor: pointer;">
            <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1">
                <button type="button" class="btn btn-warning glyphicon glyphicon-expand btn-xs" data-toggle="collapse" data-target="#filters"></button>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-2 col-lg-2">
                <p class="text-primary">Activar Filtros</p>
            </div>
        </div>
        <div id="form" class="">
            {!! Form::open(['route' => 'reports', 'class' => 'form', 'target'=>'_blank']) !!}
                <div id="filters" class="collapse in bg-warning" style="padding: 5px; border-radius: 5px;">
                    <div class="row">
                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                            {!! Form::label('last_name','Apellidos ') !!}
                            {!! Form::text('last_name', '', ['class'=> 'form-control','placeholder'=>'Comienza con...']) !!}
                        </div>
                        <div class="form-group col-sm-3 col-md-3 col-lg-3">
                            {!! Form::label('first_name','Nombres ') !!}
                            {!! Form::text('first_name', '', ['class'=> 'form-control','placeholder'=>'Comienza con...']) !!}
                        </div>
                        <div class="form-group col-sm-3 col-md-2 col-lg-2">
                            {!! Form::label('gender','Sexo ') !!}
                            {!! Form::select('gender', array('X'=>'Todos','M' => 'Masculino', 'F' => 'Femenino'), 'X' , ['class'=> 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                            {!! Form::submit('Generar PDF',['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
@endsection

@section('script')
    <script>
        $("#filters").collapse();
    </script>
@endsection