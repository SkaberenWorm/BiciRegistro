                        <div class="form-group row">
                            <div class="col-sm-2">
                            <?php echo e(Form::label('run_dueno','Run')); ?>

                            </div>
                            <div class="col-sm-10">
                            <?php echo e(Form::text('run_dueno', null , ['autocomplete' => 'off', 'placeholder' => '11111111-1','class' => 'form-control', isset($dueno)?'disabled':''])); ?>

                                <?php if($errors->has('run_dueno')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('run_dueno')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('nombre_dueno','Nombre')); ?>

                            </div>
                            <div class="col-sm-10">
                                <?php echo e(Form::text('nombre_dueno', null, ['autocomplete' => 'off', 'class' => 'form-control'])); ?>

                                <?php if($errors->has('nombre_dueno')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('nombre_dueno')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('correo_dueno','Correo')); ?>

                            </div>
                            <div class="col-sm-10">
                                <?php echo e(Form::text('correo_dueno', null, ['autocomplete' => 'off', 'class' => 'form-control'])); ?>

                                <?php if($errors->has('correo_dueno')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('correo_dueno')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('tipoDueno','Área')); ?>

                            </div>
                            <div class="col-sm-10">
                            <?php echo e(Form::select('tipoDueno', $tipoDuenos->pluck('description','id'), null, ['class' => 'form-control', 'placeholder' =>'Seleccione una opción'])); ?>

                                <?php if($errors->has('marca_id')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('tipoDueno')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('celular_dueno','Celular')); ?>

                            </div>
                            <div class="col-2 col-sm-2">
                                <?php echo e(Form::label('cel_dueno','+569',['class'=>'mt-2'])); ?>

                            </div>
                            <div class="col-10 col-sm-8">
                                <?php echo e(Form::number('celular_dueno', null, ['class' => 'form-control'])); ?>

                                <?php if($errors->has('celular_dueno')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('celular_dueno')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('image_dueno','Imagen')); ?>

                            </div>
                            <div class="col-sm-10">
                                <?php echo e(Form::file('image_dueno', null, null)); ?> <br>
                                <?php if($errors->has('image_dueno')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('image_dueno')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>
