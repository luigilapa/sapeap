@extends('layout/master')
<?php $title='Abogados Activos' ?>
@section('panel')
    <div class="pull-right">
        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>Filtro</button>
    </div>
@endsection
@section('content')
    <div class="table-responsive">
    <table class="table">
        <thead>
        <tr class="filters">
            <th>
                @if(Auth::user()->type == 'admin')
                <small><a id="lawyer_new" data-id='0' class="btn btn-success glyphicon glyphicon-plus btn-xs" title="Nuevo" data-toggle="modal" data-target="#myModal" onclick=""></a></small>
                @endif
            </th>
            <th><input type="text" class="form-control" placeholder="Apellidos" disabled></th>
            <th><input type="text" class="form-control" placeholder="Nombres" disabled></th>
            <th><input type="text" class="form-control" placeholder="C&#233;dula" disabled></th>
            <th><input type="text" class="form-control" placeholder="Matricula" disabled></th>
            <th></th>
            <th></th>
            <!--
            <th>Correo</th>
            <th>Direeci&#243;n</th>
            <th>Tel&#233;fono</th>
            <th>Celular</th>
            -->
        </tr>
        </thead>
        <tbody>
        @foreach( $lawyers as $lawyer)
            <tr>
                <td>
                    <small><a id="lawyer_view" onclick="ViewLawyer($(this).data('id'))" data-id="{!! $lawyer->id !!}" class="btn btn-info glyphicon glyphicon-eye-open btn-xs" title="Ver" data-toggle="modal" data-target="#MyModalView" onclick=""></a></small>
                </td>
                <td>{{$lawyer->last_name}}</td>
                <td>{{$lawyer->first_name}}</td>
                <td>{{$lawyer->identification}}</td>
                <td>{{$lawyer->registration_number}}</td>
                <!--
                <td>{{$lawyer->email}}</td>
                <td>{{$lawyer->address}}</td>
                <td>{{$lawyer->telephone}}</td>
                <td>{{$lawyer->mobile}}</td>
                -->
                <td>
                    @if(Auth::user()->type == 'admin')
                    <small><a id="lawyer_edit" onclick="SetEditLawyer($(this).data('id'))" data-id="{!! $lawyer->id !!}" class="btn btn-warning glyphicon glyphicon-pencil btn-xs" title="Editar" data-toggle="modal" data-target="#myModal" onclick=""></a></small>
                    @endif
                </td>
                <td>
                    @if(Auth::user()->type == 'admin')
                    <small><a id="lawyer_delete" onclick="DeleteLawyer($(this).data('id'))" data-id="{!! $lawyer->id !!}" class="btn btn-danger glyphicon glyphicon-trash btn-xs" title="Eliminar"></a></small>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

        @include('lawyer.modal')
        @include('lawyer.modalView')
@endsection

@section('content_extend')
    <div class="row" style="margin-top: 10px;">
        <div class="col-lg-10">
            @if(Request::path()  != 'lawyer_list/0' )
                {!! $lawyers->render() !!}
            @endif
        </div>
        <div class="col-lg-2">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Registros
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu bg-primary" aria-labelledby="dropdownMenu1">
                    <li><a href="{!! route('lawyer_list',10) !!}">10</a></li>
                    <li><a href="{!! route('lawyer_list',20) !!}">20</a></li>
                    <li><a href="{!! route('lawyer_list',30) !!}">30</a></li>
                    <li><a href="{!! route('lawyer_list',40) !!}">40</a></li>
                    <li><a href="{!! route('lawyer_list',50) !!}">50</a></li>
                    <li><a href="{!! route('lawyer_list', 0) !!}">Todos</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $('#btn_lawyer_save').on('click', function(){
        var token = $('#token').val();
        var id = 0;
        var data = $('#btn_lawyer_save').data('id');
        if(typeof data == 'undefined') {
            var lawyer = { 'id':0, 'identification': $('#identification').val(), 'registration_number': $('#registration_number').val(), 'first_name': $('#first_name').val(), 'last_name': $('#last_name').val(), 'email': $('#email').val(), 'telephone': $('#telephone').val(), 'mobile': $('#mobile').val(), 'address': $('#address').val()};
            $.ajax({
                url : '/lawyer_create',
                headers:{'X-CSRF-TOKEN' : token},
                type:'POST',
                dataType: 'json',
                data:lawyer,
                success:function(r)
                {
                    debugger;
                    if(r.mensaje == "ok") {
                        ClearLawyerForm();
                        $('#myModal').modal('toggle');
                        window.location.reload();
                        var n = noty({text: 'Abogado registrado Correctamente!', type: 'success'});
                    }
                    else{
                        var n = noty({text: r.mensaje, type: 'error'});
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
                        var n = noty({text: 'Hay errores en el envi&#243; de datos!', type: 'error'});
                    }
                }
            });
        }
        else
        {
            var lawyer = { 'id':data, 'identification': $('#identification').val(), 'registration_number': $('#registration_number').val(), 'first_name': $('#first_name').val(), 'last_name': $('#last_name').val(), 'email': $('#email').val(), 'telephone': $('#telephone').val(), 'mobile': $('#mobile').val(), 'address': $('#address').val()};
            $.ajax({
                url : '/lawyer_edit/'+data,
                headers:{'X-CSRF-TOKEN' : token},
                type:'POST',
                dataType: 'json',
                data:lawyer,
                success:function(r)
                {
                    debugger;
                    if(r.mensaje == "ok") {
                        ClearLawyerForm();
                        $('#myModal').modal('toggle');
                        window.location.reload();
                        var n = noty({text: 'Abogado actualizado Correctamente!', type: 'success'});
                    }
                    else{
                        var n = noty({text: r.mensaje, type: 'error'});
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
                        var n = noty({text: 'Hay errores en el envi&#243; de datos!', type: 'error'});
                    }
                }
            });
        }

    });

    $('#lawyer_new').click(function(){
        $('#btn_lawyer_save').removeAttr('data-id');
        ClearLawyerForm();
    });

    function ClearLawyerForm() {
        $('#identification').val('');
        $('#registration_number').val('');
        $('#first_name').val('');
        $('#last_name').val('');
        $('#email').val('');
        $('#telephone').val('');
        $('#mobile').val('');
        $('#address').val('');
    }

    function SetEditLawyer(id){
        $('#btn_lawyer_save').attr('data-id',id);
        var token = $('#token').val();
        $.ajax({
            url : '/lawyer_edit/'+id,
            headers:{'X-CSRF-TOKEN' : token},
            type:'GET',
            dataType: 'json',
            success:function(r)
            {
                $('#id').val(r.id);
                $('#identification').val(r.identification);
                $('#registration_number').val(r.registration_number);
                $('#first_name').val(r.first_name);
                $('#last_name').val(r.last_name);
                $('#email').val(r.email);
                $('#telephone').val(r.telephone);
                $('#mobile').val(r.mobile);
                $('#address').val(r.address);
            },
            error:function(r)
            {
                var n = noty({text: 'Errores en la obtenci&#243n de datos!', type: 'error'});
            }
        });
    };

    function ViewLawyer(id){
        $.ajax({
            url : '/lawyer_edit/'+id,
            headers:{'X-CSRF-TOKEN' : token},
            type:'GET',
            dataType: 'json',
            success:function(r)
            {
                $('#lblidentification').text(r.identification);
                $('#lblregistration_number').text(r.registration_number);
                $('#lblfirst_name').text(r.first_name);
                $('#lbllast_name').text(r.last_name);

                $('#lblgender').text(r.gender == 'M'?'Masculino':'Femenino');
                $('#lblemail').text(r.email);
                $('#lbltelephone').text(r.telephone);
                $('#lblmobile').text(r.mobile);
                $('#lbladdress').text(r.address);
            },
            error:function(r)
            {
                var n = noty({text: 'Errores en la obtenci&#243n de datos!', type: 'error'});
            }
        });
    };

    function DeleteLawyer(id) {
        noty({
            text: '&#191;Est&#225; seguro de querer eliminar el registro?',
            buttons: [
                {addClass: 'btn btn-primary', text: 'Si', onClick: function($noty) {
                    $noty.close();
                    var token = $('#token').val();
                    //***************//
                    $.ajax({
                        url : '/lawyer_delete/'+id,
                        headers:{'X-CSRF-TOKEN' : token},
                        type:'POST',
                        dataType: 'json',
                        success:function(r)
                        {
                            if(r.mensaje == "ok") {
                                window.location.reload();
                                var n = noty({text: 'Registro Eliminado Correctamente!', type: 'success'});
                            }
                        },
                        error:function(r)
                        {
                            debugger;
                            var s = r;
                            var n = noty({text: 'Errores!', type: 'error'});
                        }
                    });
                    //**************//
                }
                },
                {addClass: 'btn btn-danger', text: 'Cancelar', onClick: function($noty) {
                    $noty.close();
                    noty({text: 'Acci&#243;n Cancelada ', type: 'information'});
                }
                }
            ]
        });

    }
</script>
@endsection