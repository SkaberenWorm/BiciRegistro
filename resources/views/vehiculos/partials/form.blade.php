                        <div class="form-group row">
                            <div class="col-sm-2">
                            {{ Form::label('codigo','Código') }}
                            </div>
                            <div class="col-sm-10">
                            {{ Form::text('codigo', null , ['class' => 'form-control', isset($vehiculo)?'disabled':'']) }}
                                @if ($errors->has('codigo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('codigo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('marca_id','Marca') }}
                            </div>
                            <div class="col-sm-10">
                            {{ Form::select('marca_id', $marcas->pluck('description','id'), null, ['id'=> 'selectMarca','class' => 'form-control', 'placeholder' =>'Seleccione una opción']) }}
                                @if ($errors->has('marca_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('marca_id') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('modelo','Modelo') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('modelo', null, ['class' => 'form-control']) }}
                                @if ($errors->has('modelo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('modelo') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('color','Color') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('color', null, ['class' => 'form-control px-1 py-0', 'style'=>'height:37px;']) }}
                                @if ($errors->has('color'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                 @endif
                            </div>

                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('image','Imagen') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::file('image', null, null) }} <br>
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
