                        <div class="form-group row">
                            <div class="col-sm-2">
                            {{ Form::label('name','Nombre') }}
                            </div>
                            <div class="col-sm-10">
                            {{ Form::text('name', null , ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('slug','URL') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('slug', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('description','Descripción') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::text('description', null, ['class' => 'form-control']) }} 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                {{ Form::label('special','Permiso especial') }}
                            </div>
                            <div class="col-sm-10">
                                {{ Form::radio('special', 'all-access') }} Acceso total  <br>
                                {{ Form::radio('special', 'no-access') }} Ningún acceso
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
                        