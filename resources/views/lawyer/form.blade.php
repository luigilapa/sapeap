{!! Form::hidden('id', '', ['id'=> 'id']) !!}
<div class="row">
    <div class="form-group col-sm-6 col-md-6 col-lg-3 ">
        {!! Form::label('identification', 'C&#233;dula',['class'=>'required']) !!}
        {!! Form::number('identification', '', ['class'=> 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6 col-md-6 col-lg-3">
        {!! Form::label('registration_number','Matricula',['class'=>'required']) !!}
        {!! Form::text('registration_number', '', ['class'=> 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        {!! Form::label('first_name','Nombres',['class'=>'required']) !!}
        {!! Form::text('first_name', '', ['class'=> 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        {!! Form::label('last_name','Apellidos',['class'=>'required']) !!}
        {!! Form::text('last_name', '', ['class'=> 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        {!! Form::label('email','Correo Electr&#243;nico ') !!}
        {!! Form::email('email', '', ['class'=> 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6 col-md-3 col-lg-3">
        {!! Form::label('telephone','Tel&#233;fono') !!}
        {!! Form::number('telephone', '', ['class'=> 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6 col-md-3 col-lg-3">
        {!! Form::label('mobile','Celular') !!}
        {!! Form::number('mobile', '', ['class'=> 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-3 col-md-3 col-lg-2">
        <label>Sexo</label>
        {!! Form::select('gender', array('M' => 'Masculino', 'F' => 'Femenino'), '' , ['class'=> 'form-control']) !!}
    </div>
    <div class="form-group col-sm-9 col-md-9 col-lg-10">
        {!! Form::label('address','Direeci&#243;n') !!}
        {!! Form::text('address', '', ['class'=> 'form-control']) !!}
    </div>
</div>