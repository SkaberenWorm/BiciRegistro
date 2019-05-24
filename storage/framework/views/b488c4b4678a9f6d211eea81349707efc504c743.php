                        <div class="form-group row">
                            <div class="col-sm-2">
                            <?php echo e(Form::label('name','Nombre')); ?>

                            </div>
                            <div class="col-sm-10">
                            <?php echo e(Form::text('name', null , ['class' => 'form-control','placeholder'=>'Administrador'])); ?>

                            <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('slug','URL')); ?>

                            </div>
                            <div class="col-sm-10">
                                <?php echo e(Form::text('slug', null, ['class' => 'form-control','placeholder'=>'admin_user'])); ?>

                                <?php if($errors->has('slug')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('slug')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('description','Descripción')); ?>

                            </div>
                            <div class="col-sm-10">
                                <?php echo e(Form::text('description', null, ['class' => 'form-control','placeholder'=>'Administrador de usuarios'])); ?>

                                <?php if($errors->has('description')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('description')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('special','Permiso especial')); ?>

                            </div>
                            <div class="col-sm-10">
                                <?php echo e(Form::radio('special', 'all-access')); ?> Acceso total  <br>
                                <?php echo e(Form::radio('special', 'no-access')); ?> Ningún acceso <br>
                                <?php echo e(Form::radio('special', 'ninguno')); ?> Sin permisos especiales
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('permission','Permisos')); ?>

                            </div>
                            <div class="col-sm-10">
                                <ul class="list-unstyled">
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <label>
                                            <?php echo e(Form::checkbox('permissions[]', $permission->id, null )); ?>

                                            <?php echo e($permission->name); ?>

                                            </label>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
