@extends('layout/assets')

@section('content')
    <div class="row" style="text-align: center; margin-top: 10%;">
        <div class="col-lg-12">
            <span class="glyphicon glyphicon-fire text-danger"></span>
            <h2>Lo sentimos, el servidor no est&#225; disponible por el momento.</h2>
        </div>
        <div class="col-lg-12">
            <a href="{!! route('home') !!}">Volver a intentarlo</a>
        </div>
    </div>
@endsection