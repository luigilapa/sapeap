@extends('layout/master')

<?php $title='Usuarios Inactivos' ?>

@section('content')
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>Perfil</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $users as $user)
                <tr>
                    <td>
                        @if(Auth::user()->type == 'admin')
                            <small><a onclick="ResestUser($(this).data('id'))" data-id="{!! $user->id !!}" class="btn btn-success glyphicon glyphicon-refresh btn-xs" title="Activar"></a></small>
                        @endif
                    </td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->user}}</td>
                    <td>{{$user->type=='user'?'Usuario':'Administrador'}}</td>
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
        function ResestUser(id) {
            noty({
                text: '&#191;Est&#225; seguro de querer activar este usuario?',
                buttons: [
                    {addClass: 'btn btn-primary', text: 'Si', onClick: function($noty) {
                        $noty.close();
                        var token = $('#token').val();
                        //***************//
                        $.ajax({
                            url : '/user_restart/'+id,
                            headers:{'X-CSRF-TOKEN' : token},
                            type:'POST',
                            dataType: 'json',
                            success:function(r)
                            {
                                if(r.mensaje == "ok") {
                                    window.location.reload();
                                    var n = noty({text: 'Usuario activado correctamente!', type: 'success'});
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