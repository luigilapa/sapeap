@extends('layout/master')

<?php $title='Abogados Inactivos' ?>

<?php $message=Session::get('message') ?>
@if($message == 'ok')
@section('script')
    <script>
        var n = noty({text: 'Abogado registrado Correctamente!', type: 'success'});
    </script>
@endsection
@endif

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <th></th>
            <!--
            <th>decula</th>
            <th>matricula</th>
            -->
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Direeci&#243;n</th>
            <th>Tel&#233;fono</th>
            <th>Celular</th>

            </thead>
            <tbody>
            @foreach( $lawyers as $lawyer)
                <tr>
                    <td>
                        <small><a id="lawyer_restore" onclick="RestoreLawyer($(this).data('id'))" data-id="{!! $lawyer->id !!}"  class="btn btn-success glyphicon glyphicon-refresh btn-xs" title="Restaurar" data-toggle="modal" data-target="#myModalRestore" onclick=""></a></small>
                    </td>
                    <!--
                    <td>{{$lawyer->identification}}</td>
                    <td>{{$lawyer->registration_number}}</td>
                    -->
                    <td>{{$lawyer->first_name}}</td>
                    <td>{{$lawyer->last_name}}</td>
                    <td>{{$lawyer->email}}</td>
                    <td>{{$lawyer->address}}</td>
                    <td>{{$lawyer->telephone}}</td>
                    <td>{{$lawyer->mobile}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('lawyer.modalRestore')
@endsection
@section('content_extend')
    {!! $lawyers->render() !!}
@endsection

@section('script')
<script>
    function RestoreLawyer(id) {
        $('#btn_lawyer_restore').attr('data-id',id);
    }

    $('#btn_lawyer_restore').on('click', function(){
        var token = $('#token').val();
        var id = $('#btn_lawyer_restore').data('id');
        var lawyer = { 'id':id, 'identification': $('#identification').val(), 'registration_number': $('#registration_number').val(), 'first_name': 'xxx', 'last_name': 'xxx', 'email': 'xx@yy.zz', 'telephone': 555555, 'mobile': 9955555555, 'address': 'xx yy zz'};

        $.ajax({
            url : '/lawyer_restore/'+id,
            headers:{'X-CSRF-TOKEN' : token},
            type:'POST',
            dataType: 'json',
            data:lawyer,
            success:function(r)
            {
                if(r.mensaje == "ok") {
                    ClearLawyerForm();
                    $('#myModalRestore').modal('toggle');
                    window.location.reload();
                    var n = noty({text: 'Abogado Restaurado Correctamente!', type: 'success'});
                }
                else{
                    var n = noty({text: r.mensaje, type: 'error'});
                }
            },
            error:function(r)
            {
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
    });
</script>
@endsection