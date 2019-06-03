                        <div class="form-group row">
                            <div class="col-sm-2">
                            <?php echo e(Form::label('name','Nombre')); ?>

                            </div>
                            <div class="col-sm-10">
                            <?php echo e(Form::text('name', null , ['autocomplete' => 'off', 'class' => 'form-control','placeholder'=>'Administrador'])); ?>

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
                                <?php echo e(Form::text('slug', null, ['autocomplete' => 'off', 'class' => 'form-control','placeholder'=>'admin_user'])); ?>

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
                                <?php echo e(Form::text('description', null, ['autocomplete' => 'off', 'class' => 'form-control','placeholder'=>'Administrador de usuarios'])); ?>

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
                            <div class="row col-sm-10">
                              <!-- Permisos de usuarios -->
                              <div class="card col-4 p-0 my-1">
                                <div class="card-header">
                                  Usuarios
                                </div>
                                <div class="card-body py-2">
                                  <ul class="list-unstyled my-0">
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($permission->grupo=="usuarios"): ?>
                                        <li>
                                            <label>
                                            <?php echo e(Form::checkbox('permissions[]', $permission->id, null )); ?>

                                            <?php echo e($permission->name); ?>

                                            </label>
                                        </li>
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($permission->grupo=="roles"): ?>
                                        <li>
                                            <label>
                                            <?php echo e(Form::checkbox('permissions[]', $permission->id, null )); ?>

                                            <?php echo e($permission->name); ?>

                                            </label>
                                        </li>
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($permission->grupo=="bicicletas"): ?>
                                        <li>
                                            <label>
                                            <?php echo e(Form::checkbox('permissions[]', $permission->id, null )); ?>

                                            <?php echo e($permission->name); ?>

                                            </label>
                                        </li>
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($permission->grupo=="duenos"): ?>
                                        <li>
                                            <label>
                                            <?php echo e(Form::checkbox('permissions[]', $permission->id, null )); ?>

                                            <?php echo e($permission->name); ?>

                                            </label>
                                        </li>
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($permission->grupo=="otros"): ?>
                                        <li>
                                            <label>
                                            <?php echo e(Form::checkbox('permissions[]', $permission->id, null )); ?>

                                            <?php echo e($permission->name); ?>

                                            </label>
                                        </li>
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </ul>
                                </div>
                              </div>
                              <!-- Permisos de otros -->

                            </div>
                        </div>
