<!-- Modal -->
<div class="modal fade" id="MyModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Informaci&#243;n Adicional</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                {!! Form::label('','Identificaci&#243;n ', ['class'=> 'label label-info bg-red col-xs-4 col-sm-4 col-md-4 col-lg-4']) !!}
                {!! Form::label('','', ['id'=> 'lblidentification', 'class'=> 'col-lg-8']) !!}
                </div>
                <div class="row">
                {!! Form::label('','Matricula ', ['class'=> 'label label-info col-xs-4 col-sm-4 col-md-4 col-lg-4']) !!}
                {!! Form::label('','', ['id'=> 'lblregistration_number', 'class'=> 'col-lg-8']) !!}
                </div>
                <div class="row">
                {!! Form::label('','Nombres ', ['class'=> 'label label-info col-xs-4 col-sm-4 col-md-4 col-lg-4']) !!}
                {!! Form::label('','', ['id'=> 'lblfirst_name', 'class'=> 'col-lg-8']) !!}
                </div>
                <div class="row">
                {!! Form::label('','Apellidos ', ['class'=> 'label label-info col-xs-4 col-sm-4 col-md-4 col-lg-4']) !!}
                {!! Form::label('','', ['id'=> 'lbllast_name', 'class'=> 'col-lg-8']) !!}
                </div>
                <div class="row">
                    {!! Form::label('','Sexo', ['class'=> 'label label-info col-xs-4 col-sm-4 col-md-4 col-lg-4']) !!}
                    {!! Form::label('','', ['id'=> 'lblgender', 'class'=> 'col-lg-8']) !!}
                </div>
                <div class="row">
                {!! Form::label('','Correo ', ['class'=> 'label label-info col-xs-4 col-sm-4 col-md-4 col-lg-4']) !!}
                {!! Form::label('','', ['id'=> 'lblemail', 'class'=> 'col-lg-8']) !!}
                </div>
                <div class="row">
                {!! Form::label('','Tel&#233;fono ', ['class'=> 'label label-info col-xs-4 col-sm-4 col-md-4 col-lg-4']) !!}
                {!! Form::label('','', ['id'=> 'lbltelephone', 'class'=> 'col-lg-8']) !!}
                </div>
                <div class="row">
                {!! Form::label('','Celular ', ['class'=> 'label label-info col-xs-4 col-sm-4 col-md-4 col-lg-4']) !!}
                {!! Form::label('','', ['id'=> 'lblmobile', 'class'=> 'col-lg-8']) !!}
                </div>
                <div class="row">
                {!! Form::label('','Direcci&#243;n ', ['class'=> 'label label-info col-xs-4 col-sm-4 col-md-4 col-lg-4']) !!}
                {!! Form::label('','', ['id'=> 'lbladdress', 'class'=> 'col-lg-8']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>