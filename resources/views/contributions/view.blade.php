@extends('layout/master')
<?php $title='Ver Pagos' ?>
<?php $message=Session::get('message') ?>
@if($message == 'editok')
@section('script')
    <script>
        var n = noty({text: 'Pago actualizado correctamente', type: 'success'});
    </script>
@endsection
@endif
@section('content')
    @include('alerts.request')
    {!! Form::open(['route' => 'contribution_view', 'class' => 'form']) !!}
            <div class="row">
                <div class="form-group col-sm-3 col-md-3 col-lg-3">
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
                <div class="form-group col-sm-3 col-md-3 col-lg-3">
                    {!! Form::label('identification','C&#233;dula') !!}
                    {!! Form::number('identification', '', ['class'=> 'form-control']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    {!! Form::submit('Buscar',['class' => 'btn btn-primary']) !!}
                </div>
            </div>
    {!! Form::close() !!}
    <hr/>
    @if(isset($lawyer))
        <div class="row">
            <div class="form-group col-sm-3 col-md-3 col-lg-3">
                {!! Form::label('registration_number','Matricula') !!}
                {!! Form::text('registration_number', $lawyer->registration_number, ['class'=> 'form-control', 'ReadOnly'=>'true']) !!}
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
    @endif
    <hr/>
    @if(isset($contributions))

        <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Mes</th>
                <th>Monto</th>
                <th>Nota</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($contributions as $item)
                    <tr>
                        <td>{!! $month[$item->month-1] !!}</td>
                        <td>{!! $item->amount!!}</td>
                        <td>{!! $item->description !!}</td>
                        <td>
                            @if(Auth::user()->type == 'admin')
                            <small><a href="{{route('contribution_edit',$item->id)}}" class="btn btn-warning glyphicon glyphicon-pencil btn-xs" title="Editar"></a></small>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endif
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