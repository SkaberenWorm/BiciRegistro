                        <div class="form-group row">
                            <div class="col-sm-2">
                            <?php echo e(Form::label('codigo','Código')); ?>

                            </div>
                            <div class="col-sm-10">
                            <?php echo e(Form::text('codigo', null , ['class' => 'form-control', isset($vehiculo)?'disabled':''])); ?>

                                <?php if($errors->has('codigo')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('codigo')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('marca_id','Marca')); ?>

                            </div>
                            <div class="col-sm-10">
                            <?php echo e(Form::select('marca_id', $marcas->pluck('description','id'), null, ['class' => 'form-control', 'placeholder' =>'Seleccione una opción'])); ?>

                                <?php if($errors->has('marca_id')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('marca_id')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('modelo','Modelo')); ?>

                            </div>
                            <div class="col-sm-10">
                                <?php echo e(Form::text('modelo', null, ['class' => 'form-control'])); ?>

                                <?php if($errors->has('modelo')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('modelo')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('color','Color')); ?>

                            </div>
                            <div class="col-sm-10">
                                <?php echo e(Form::color('color', null, ['class' => 'form-control px-1 py-0', 'style'=>'height:37px;'])); ?>

                                <?php if($errors->has('color')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('color')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>

                        </div>


                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('image','Imagen')); ?>

                            </div>
                            <div class="col-sm-10">
                                <?php echo e(Form::file('image', null, null)); ?> <br>
                                <?php if($errors->has('image')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('image')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>
