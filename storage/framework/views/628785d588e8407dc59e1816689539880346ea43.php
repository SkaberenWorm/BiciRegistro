                        <div class="form-group row">
                            <div class="col-sm-2">
                            <?php echo e(Form::label('name','Nombre')); ?>

                            </div>
                            <div class="col-sm-10">
                            <?php echo e(Form::text('name', null , ['class' => 'form-control'])); ?>

                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('email','Correo')); ?>

                            </div>
                            <div class="col-sm-10">
                                <?php echo e(Form::text('email', null, ['class' => 'form-control'])); ?>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                 <?php endif; ?>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <?php echo e(Form::label('password','Contraseña')); ?>

                            </div>
                            <div class="col-sm-10">
                                <?php echo e(Form::password('password', ['class' => 'form-control'])); ?>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
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

                        <div class="form-group row">
                                    <div class="col-sm-2">
                                        <?php echo e(Form::label('role','Roles')); ?>

                                    </div>
                                    <div class="col-sm-10">
                                       <ul class="list-unstyled">
                                       
                                       <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <label>
                                                <?php echo e(Form::checkbox('roles[]', $role->id, null )); ?>

                                                <?php echo e($role->name); ?> <em> (<?php echo e($role->description? : 'sin descripción'); ?>) </em>
                                                </label>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                       </ul>
                                    </div>
                                </div>


                        