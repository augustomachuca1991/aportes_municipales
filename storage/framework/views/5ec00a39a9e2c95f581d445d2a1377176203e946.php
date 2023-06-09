<?php $__env->startSection('content'); ?>

<div class="col-2">
    <div class="form-container">
      <div class="form-btn">
      <span><?php echo e(__('Login')); ?></span>
          <hr id="Indicator">
      </div>
      <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
          <input id="email" type="email" name="email" class="fontAwesome <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="&#xf1fa; correo electronico" >
          <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <i><?php echo e($message); ?></i>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          <input id="password" type="password" name="password" placeholder="&#xf084; contraseña" class="fontAwesome <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="current-password">
          <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <i><?php echo e($message); ?></i>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

          <button type="submit" class="btn"> <?php echo e(__('Login')); ?>&#8594;</button>
          <?php if(Route::has('password.request')): ?>
              <a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot Your Password?')); ?></a>
          <?php endif; ?>

      </form>
    </div>
</div>

<div class="col-2">
  <h1>Empezemos Ahora!</h1>
  <p>Si aún no estas registrado <br>hazlo <a href="<?php echo e(route('register')); ?>" style="cursor: pointer; color: #79ab42;"><span><strong>aquí</strong></span></a> </p>
  <div class="img-box">
    <img width="100px" class="back-img" src="image/login-verde.png" style="height: 350px;">
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aportes/resources/views/auth/login.blade.php ENDPATH**/ ?>