                        <div class="form-group row">
                            <div class="col-sm-2">
                            {{ Form::label('codigo','Código') }}
                            </div>
                            <div class="col-sm-10">
                            {{ Form::text('codigo', null , ['class' => 'form-control', isset($vehiculo)?'disabled':'']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('modelo','Modelo') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('modelo', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('color','Color') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('color', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('image','Imagen') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::file('image', null, null) }}
                            </div>
                        </div>

                        