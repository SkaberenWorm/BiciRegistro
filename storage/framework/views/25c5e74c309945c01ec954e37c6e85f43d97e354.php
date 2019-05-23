<div class="form-group row">
    <div class="col-sm-2">
    <?php echo e(Form::label('rut','Run')); ?>

    </div>
    <div class="col-sm-10">
    <?php echo e(Form::text('rut', null , ['class' => 'form-control', isset($dueno)?'disabled':''])); ?>

        <?php if($errors->has('rut')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('rut')); ?></strong>
            </span>
         <?php endif; ?>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <?php echo e(Form::label('nombre','Nombre')); ?>

    </div>
    <div class="col-sm-10">
        <?php echo e(Form::text('nombre', null, ['class' => 'form-control'])); ?>

        <?php if($errors->has('nombre')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('nombre')); ?></strong>
            </span>
         <?php endif; ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <?php echo e(Form::label('correo','Correo')); ?>

    </div>
    <div class="col-sm-10">
        <?php echo e(Form::text('correo', null, ['class' => 'form-control'])); ?>

        <?php if($errors->has('correo')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('correo')); ?></strong>
            </span>
         <?php endif; ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <?php echo e(Form::label('tipoDueno_id','Área')); ?>

    </div>
    <div class="col-sm-10">
    <?php echo e(Form::select('tipoDueno_id', $tipoDuenos->pluck('description','id'), null, ['class' => 'form-control', 'placeholder' =>'Seleccione una opción'])); ?>

        <?php if($errors->has('tipoDueno_id')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('tipoDueno_id')); ?></strong>
            </span>
         <?php endif; ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <?php echo e(Form::label('celular','Celular')); ?>

    </div>
    <div class="col-sm-3">
        <?php echo e(Form::number('cel', "569", ['class' => 'form-control','disabled'])); ?>

    </div>
    <div class="col-sm-7">
        <?php echo e(Form::number('celular', null, ['class' => 'form-control'])); ?>

        <?php if($errors->has('celular')): ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($errors->first('celular')); ?></strong>
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
