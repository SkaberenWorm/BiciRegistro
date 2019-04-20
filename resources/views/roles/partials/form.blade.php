                        <div class="form-group row">
                            <div class="col-sm-2">
                            {{ Form::label('name','Nombre') }}
                            </div>
                            <div class="col-sm-10">
                            {{ Form::text('name', null , ['class' => 'form-control','placeholder'=>'Administrador']) }}
                            @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('slug','URL') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('slug', null, ['class' => 'form-control','placeholder'=>'admin_user']) }}
                                @if ($errors->has('slug'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('description','Descripción') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('description', null, ['class' => 'form-control','placeholder'=>'Administrador de usuarios']) }} 
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('special','Permiso especial') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::radio('special', 'all-access') }} Acceso total  <br>
                                {{ Form::radio('special', 'no-access') }} Ningún acceso <br>
                                {{ Form::radio('special', 'ninguno') }} Sin permisos especiales
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('permission','Permisos') }}
                            </div>
                            <div class="col-sm-10">
                                <ul class="list-unstyled">
                                    @foreach($permissions as $permission)
                                        <li>
                                            <label>
                                            {{ Form::checkbox('permissions[]', $permission->id, null ) }}
                                            {{ $permission->name}}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        