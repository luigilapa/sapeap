@extends('layout/assets')

@section('content')
    <div class="row" style="text-align: center; margin-top: 10%;">
        <div class="col-lg-12">
            <span class="glyphicon glyphicon-fire text-danger"><h1>Error 503</h1></span>
            <h2>El servidor no est&#225; disponible por el momento.</h2>
        </div>
        <div class="col-lg-12">
            <a href="{!! route('home') !!}">Volver a intentarlo</a>
        </div>
    </div>
@endsection