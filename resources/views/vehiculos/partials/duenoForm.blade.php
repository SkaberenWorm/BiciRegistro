                        <div class="form-group row">
                            <div class="col-sm-2">
                            {{ Form::label('run_dueno','Run') }}
                            </div>
                            <div class="col-sm-10">
                            {{ Form::text('run_dueno', null , ['class' => 'form-control', isset($dueno)?'disabled':'']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('nombre_dueno','Nombre') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('nombre_dueno', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('correo_dueno','Correo') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('correo_dueno', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('celular_dueno','Celular') }}
                            </div>
                            <div class="col-sm-3">
                                {{ Form::number('cel_dueno', "569", ['class' => 'form-control','disabled']) }}
                            </div>
                            <div class="col-sm-7">
                                {{ Form::number('celular_dueno', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('imagen_dueno','Imagen') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::file('imagen_dueno', null, null) }}
                            </div>
                        </div>

                        