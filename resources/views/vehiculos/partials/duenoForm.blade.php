                        <div class="form-group row">
                            <div class="col-sm-2">
                            {{ Form::label('run_dueno','Run') }}
                            </div>
                            <div class="col-sm-10">
                            {{ Form::text('run_dueno', null , ['autocomplete' => 'off', 'placeholder' => '11111111-1','class' => 'form-control', isset($dueno)?'disabled':'']) }}
                                @if ($errors->has('run_dueno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('run_dueno') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('nombre_dueno','Nombre') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('nombre_dueno', null, ['autocomplete' => 'off', 'class' => 'form-control']) }}
                                @if ($errors->has('nombre_dueno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre_dueno') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('correo_dueno','Correo') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('correo_dueno', null, ['autocomplete' => 'off', 'class' => 'form-control']) }}
                                @if ($errors->has('correo_dueno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('correo_dueno') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('tipoDueno','Área') }}
                            </div>
                            <div class="col-sm-10">
                            {{ Form::select('tipoDueno', $tipoDuenos->pluck('description','id'), null, ['class' => 'form-control', 'placeholder' =>'Seleccione una opción']) }}
                                @if ($errors->has('marca_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipoDueno') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                {{ Form::label('celular_dueno','Celular') }}
                            </div>
                            <div class="col-4 col-md-3 col-sm-4">
                                {{ Form::label('celularLabel','(+56)',['class'=>'form-control px-1 pl-2']) }}
                            </div>
                            <div class="col-8 col-md-7 col-sm-8">
                                {{ Form::number('celular_dueno', null, ['class' => 'form-control','placeholder' => '9XXXXXXXX']) }}
                                @if ($errors->has('celular_dueno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('celular_dueno') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('image_dueno','Imagen') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::file('image_dueno', null, null) }} <br>
                                @if ($errors->has('image_dueno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_dueno') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
