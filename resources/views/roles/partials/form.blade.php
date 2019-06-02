                        <div class="form-group row">
                            <div class="col-sm-2">
                            {{ Form::label('name','Nombre') }}
                            </div>
                            <div class="col-sm-10">
                            {{ Form::text('name', null , ['autocomplete' => 'off', 'class' => 'form-control','placeholder'=>'Administrador']) }}
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
                                {{ Form::text('slug', null, ['autocomplete' => 'off', 'class' => 'form-control','placeholder'=>'admin_user']) }}
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
                                {{ Form::text('description', null, ['autocomplete' => 'off', 'class' => 'form-control','placeholder'=>'Administrador de usuarios']) }}
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
                            <div class="row col-sm-10">
                              <!-- Permisos de usuarios -->
                              <div class="card col-4 p-0 my-1">
                                <div class="card-header">
                                  Usuarios
                                </div>
                                <div class="card-body py-2">
                                  <ul class="list-unstyled my-0">
                                    @foreach($permissions as $permission)
                                      @if($permission->grupo=="usuarios")
                                        <li>
                                            <label>
                                            {{ Form::checkbox('permissions[]', $permission->id, null ) }}
                                            {{ $permission->name}}
                                            </label>
                                        </li>
                                      @endif
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                              <!-- Permisos de usuarios -->

                              <!-- Permisos de roles -->
                              <div class="card col-4 p-0 my-1">
                                <div class="card-header">
                                  Roles
                                </div>
                                <div class="card-body py-2">
                                  <ul class="list-unstyled my-0">
                                    @foreach($permissions as $permission)
                                      @if($permission->grupo=="roles")
                                        <li>
                                            <label>
                                            {{ Form::checkbox('permissions[]', $permission->id, null ) }}
                                            {{ $permission->name}}
                                            </label>
                                        </li>
                                      @endif
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                              <!-- Permisos de roles -->

                              <!-- Permisos de bicicletas -->
                              <div class="card col-4 p-0 my-1">
                                <div class="card-header">
                                  Bicicletas
                                </div>
                                <div class="card-body py-2">
                                  <ul class="list-unstyled my-0">
                                    @foreach($permissions as $permission)
                                      @if($permission->grupo=="bicicletas")
                                        <li>
                                            <label>
                                            {{ Form::checkbox('permissions[]', $permission->id, null ) }}
                                            {{ $permission->name}}
                                            </label>
                                        </li>
                                      @endif
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                              <!-- Permisos de bicicletas -->

                              <!-- Permisos de dueños -->
                              <div class="card col-4 p-0 my-1">
                                <div class="card-header">
                                  Dueños
                                </div>
                                <div class="card-body py-2">
                                  <ul class="list-unstyled my-0">
                                    @foreach($permissions as $permission)
                                      @if($permission->grupo=="duenos")
                                        <li>
                                            <label>
                                            {{ Form::checkbox('permissions[]', $permission->id, null ) }}
                                            {{ $permission->name}}
                                            </label>
                                        </li>
                                      @endif
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                              <!-- Permisos de dueños -->

                              <!-- Permisos de otros -->
                              <div class="card col-8 p-0 my-1">
                                <div class="card-header">
                                  Otros
                                </div>
                                <div class="card-body py-2">
                                  <ul class="list-unstyled my-0">
                                    @foreach($permissions as $permission)
                                      @if($permission->grupo=="otros")
                                        <li>
                                            <label>
                                            {{ Form::checkbox('permissions[]', $permission->id, null ) }}
                                            {{ $permission->name}}
                                            </label>
                                        </li>
                                      @endif
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                              <!-- Permisos de otros -->

                            </div>
                        </div>
