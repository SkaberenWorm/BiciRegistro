                        <div class="form-group row">
                            <div class="col-sm-2">
                            {{ Form::label('name','Nombre') }}
                            </div>
                            <div class="col-sm-10">
                            {{ Form::text('name', null , ['autocomplete' => 'off', 'class' => 'form-control']) }}
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('email','Correo') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('email', null, ['autocomplete' => 'off', 'class' => 'form-control']) }}
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('password','Contraseña') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::password('password', ['class' => 'form-control']) }}
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
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

                        <div class="form-group row">
                                    <div class="col-sm-2">
                                        {{ Form::label('role','Roles') }}
                                    </div>
                                    <div class="col-sm-10">
                                       <ul class="list-unstyled">

                                       @foreach($roles as $role)
                                            <li>
                                                <label>
                                                {{ Form::checkbox('roles[]', $role->id, null ) }}
                                                {{ $role->name}} <em> ({{$role->description? : 'sin descripción'}}) </em>
                                                </label>
                                            </li>
                                        @endforeach

                                       </ul>
                                    </div>
                                </div>
