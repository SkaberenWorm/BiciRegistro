                        <div class="form-group row">
                            <div class="col-sm-2">
                            {{ Form::label('run_dueno','Run') }}
                            </div>
                            <div class="col-sm-10">
                            {{ Form::text('run_dueno', null , ['class' => 'form-control', isset($dueno)?'disabled':'']) }}
                                @if ($errors->has('run_dueno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('run_cueno') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('nombre_dueno','Nombre') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('nombre_dueno', null, ['class' => 'form-control']) }}
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
                                {{ Form::text('correo_dueno', null, ['class' => 'form-control']) }}
                                @if ($errors->has('corro_dueno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('correo_dueno') }}</strong>
                                    </span>
                                 @endif
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

                        