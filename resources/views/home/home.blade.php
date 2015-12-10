
@extends('layout/master')

@section('content')

    <?php $title='Inicio' ?>
    <div class="row center">
        <div class="col-lg-4">
            <img class="img-circle" src="assets/image/logo.jpg" style="width: 150px; height: 150px;"/>
        </div>
        <div class="col-lg-4">
            <h2>Bienvenido</h2>
            <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        </div>
    </div>

@endsection
@section('script')
    <script>
        //var n = noty({text: 'Bienvenido!'});
    </script>
@endsection