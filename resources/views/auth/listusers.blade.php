@extends('layout/master')

<?php $title='Lista Usuarios' ?>

<?php $message=Session::get('message') ?>
@if($message == 'ok')
    @section('script')
        <script>
            var n = noty({text: 'Usuario registrado Correctamente!', type: 'success'});
        </script>
    @endsection
@endif
@if($message == 'editok')
@section('script')
    <script>
        var n = noty({text: 'Usuario actualizado Correctamente!', type: 'success'});
    </script>
@endsection
@endif

@section('content')
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Email</th>
            <th>Usuario</th>
            <th>Perfil</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach( $users as $user)
            <tr>
            <td>{{$user->last_name}}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->user}}</td>
            <td>{{$user->type=='user'?'Usuario':'Administrador'}}</td>
            <td>
                @if(Auth::user()->type == 'admin')
                <small><a href="{{route('user_edit',$user->id)}}" class="btn btn-warning glyphicon glyphicon-pencil btn-xs" title="Editar"></a></small>
                @endif
            </td>
            <td>
                @if(Auth::user()->type == 'admin')
                    <small><a onclick="CancelUser($(this).data('id'))" data-id="{!! $user->id !!}" class="btn btn-danger glyphicon glyphicon-remove-sign btn-xs" title="Anular"></a></small>
                @endif
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection
@section('content_extend')
    {!! $users->render() !!}
@endsection

@section('script')
    <script>
        function CancelUser(id) {
            noty({
                text: '&#191;Est&#225; seguro de querer anular este usuario?',
                buttons: [
                    {addClass: 'btn btn-primary', text: 'Si', onClick: function($noty) {
                        $noty.close();
                        var token = $('#token').val();
                        //***************//
                        $.ajax({
                            url : '/user_cancel/'+id,
                            headers:{'X-CSRF-TOKEN' : token},
                            type:'POST',
                            dataType: 'json',
                            success:function(r)
                            {
                                if(r.mensaje == "ok") {
                                    window.location.reload();
                                    var n = noty({text: 'Usuario anulado correctamente!', type: 'success'});
                                }
                                if(r.mensaje == "login") {
                                    var n = noty({text: 'Usuario logiado actualmente!', type: 'information'});
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