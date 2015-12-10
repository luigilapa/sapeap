<!-- Modal -->
<div class="modal fade" id="myModalRestore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Restaurar Abogado</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <div class="row">
                    <div class="form-group col-sm-6 ">
                        {!! Form::label('identification', 'C&#233;dula',['class'=>'']) !!}
                        {!! Form::number('identification', '', ['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('registration_number','Matricula') !!}
                        {!! Form::text('registration_number', '', ['class'=> 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="btn_lawyer_restore" type="button" class="btn btn-primary">Verificar y Restaurar</button>
            </div>
        </div>
    </div>
</div>