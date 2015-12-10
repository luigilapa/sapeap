@extends('layout/master')

<?php $title='Imprimir Aportaciones' ?>
@section('content')
    @include('alerts.request')
    {!! Form::open(['route' => 'payments', 'class' => 'form']) !!}
    <div class="row">
        <div class="form-group col-lg-3">
            {!! Form::label('year','A&#241;o') !!}
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-primary glyphicon glyphicon-chevron-left" type="button" id="btn_year_down"></button>
               </span>
                <input id="year" name="year" type="text" class="form-control" readonly="true">
               <span class="input-group-btn">
                    <button class="btn btn-primary glyphicon glyphicon-chevron-right" type="button" id="btn_year_up"></button>
               </span>
            </div>
        </div>
        <div class="form-group col-lg-3">
            {!! Form::label('identification','C&#233;dula') !!}
            {!! Form::number('identification', '', ['class'=> 'form-control']) !!}
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-lg-2">
            {!! Form::submit('Generar PDF',['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('script')
    <script>
        $(function() {
            var now = new Date(Date.now());
            $('#year').val(now.getFullYear());
        });

        $('#btn_year_down').on('click',function(){
            var year = parseInt($('#year').val());
            year--;
            $('#year').val(year);
        });

        $('#btn_year_up').on('click',function(){
            var year = parseInt($('#year').val());
            year++;
            $('#year').val(year);
        });
    </script>
@endsection