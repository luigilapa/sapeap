@extends('layout/master')
<?php $title='Registrar Pago' ?>
<?php $message=Session::get('message') ?>
@if($message == 'ok')
@section('script')
    <script>
        var n = noty({text: 'Pago registrado correctamente', type: 'success'});
    </script>
@endsection
@endif
@section('content')
    @include('alerts.request')
    <div class="row">
        <div class="col-lg-4">
            <label class="required" for="txtIdentification">Busqueda por C&#233;dula</label>
        <div class="input-group">
            <input id="txtIdentification" type="number" class="form-control" placeholder="Ingrese C&#233;dula...">
               <span class="input-group-btn">
                    <button class="btn btn-primary glyphicon glyphicon-search" type="button" onclick="SeachLawyer()" data-toggle="tooltip" data-placement="bottom" title="Buscar"></button>
               </span>
        </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="form-group col-sm-3 col-md-3 col-lg-3">
            {!! Form::label('registration_number','Matricula') !!}
            {!! Form::text('registration_number', '', ['class'=> 'form-control', 'ReadOnly'=>'true']) !!}
        </div>
        <div class="form-group col-sm-4 col-md-4 col-lg-4">
            {!! Form::label('first_name','Nombres ') !!}
            {!! Form::text('first_name', '', ['class'=> 'form-control', 'ReadOnly'=>'true']) !!}
        </div>
        <div class="form-group col-sm-4 col-md-4 col-lg-4">
            {!! Form::label('last_name','Apellidos ') !!}
            {!! Form::text('last_name', '', ['class'=> 'form-control', 'ReadOnly'=>'true']) !!}
        </div>
    </div>
    <hr/>
    {!! Form::open(['route' => 'contribution_register', 'class' => 'form']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <input id="lawyer_id" name="lawyer_id" type="hidden"/>
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
            {!! Form::label('month','Mes') !!}
            {!! Form::select('month', array('1' => 'Enero', '2' => 'Febrero', '3' => 'Marzo', '4' => 'Abril', '5' => 'Mayo', '6' => 'Junio', '7' => 'Julio', '8' => 'Agosto', '9' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'), '' , ['class'=> 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-2">
            {!! Form::label('amount','Monto',['class'=>'required']) !!}
            {!! Form::text('amount', '', ['class'=> 'form-control', 'placeholder'=>'00.00']) !!}
        </div>
        <div class="form-group col-lg-8">
            {!! Form::label('description','Nota') !!}
            {!! Form::text('description', '', ['class'=> 'form-control']) !!}
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-lg-2">
            {!! Form::button('Guardar',['class' => 'btn btn-primary', 'onclick'=>'SavePay()', 'placeholder'=>'00.00']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('script')
<script>
    function SavePay() {
        var token = $('#token').val();
        var lawyer_id = $("#lawyer_id").val();
        var year = $("#year").val();
        var month = $("#month").val();
        var amount = $("#amount").val();
        var description = $("#description").val();

        var contribution = { 'id':0, 'lawyer_id': lawyer_id, 'year': year, 'month': $('#month').val(), 'amount': $('#amount').val(), 'description': $('#description').val() };
        $.ajax({
            url : '/contribution_register',
            headers:{'X-CSRF-TOKEN' : token},
            type:'POST',
            dataType: 'json',
            data:contribution,
            success:function(r)
            {
                debugger;
                if(r.mensaje == "ok") {
                    debugger;
                    var n = noty({text: 'Pago registrado correctamente!', type: 'success'});
                    ClearFormPay();
                }
                else{
                    debugger;
                    var n = noty({text: 'Error', type: 'error'});
                }
            },
            error:function(r)
            {
                debugger;
                var e = r.responseJSON ;
                if(typeof e != 'undefined')
                {
                    var msg = "";
                    $.each( e, function(i, n){
                        msg = msg += n+'<br/>';
                    });
                    var n = noty({  text: msg, type: 'warning'});
                }
                else {
                    debugger
                    var n = noty({text: 'Hay errores en el envi&#243; de datos!', type: 'error'});
                }
            }
        });

    }

    function ClearFormPay() {
        $("#lawyer_id").val('');
        $("#txtIdentification").val('');
        $('#registration_number').val('');
        $('#first_name').val('');
        $('#last_name').val('');
        //$("#year").val();
        //$("#month").val();
        $("#amount").val('');
        $("#description").val('');
    }

    function SeachLawyer() {
        $('#registration_number').val('');
        $('#first_name').val('');
        $('#last_name').val('');
        $('#lawyer_id').val('');

        var identification = $('#txtIdentification').val();
        if (isNaN(identification)) {
            $('#txtIdentification').val('');
            var n = noty({text: 'Ingrese solo n&#250;meros!', type: 'warning'});
            return;
        }
        $.ajax({
            url : '/lawyer_search/'+identification,
            type:'GET',
            dataType: 'json',
            success:function(r)
            {
                $('#lawyer_id').val(r.id);
                $('#registration_number').val(r.registration_number);
                $('#first_name').val(r.first_name);
                $('#last_name').val(r.last_name);
            },
            error:function(r)
            {
                var n = noty({text: 'No se encontr&#243; registro con la c&#233;dula ingresada!', type: 'information'});
            }
        });
    }

    $(function() {
        var now = new Date(Date.now());
        $('#year').val(now.getFullYear());
        var month = now.getMonth()+1;
        $('#month option[value='+month+']').attr('selected','selected');
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