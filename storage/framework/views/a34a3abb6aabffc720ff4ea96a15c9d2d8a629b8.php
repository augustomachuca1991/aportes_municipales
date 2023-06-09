<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" type="image/png" href="<?php echo e(asset('image/ips.png')); ?>">
    <title>I.P.S Corrientes</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--fontaweson-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!--custom style-->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <!-- <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet"> -->
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('image/logo-ips-header.png')); ?>" width="250px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <?php if(auth()->guard()->guest()): ?>
                        <li><a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                        <?php if(Route::has('register')): ?>
                        <li><a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
                        <?php endif; ?>
                        <!-- <?php else: ?>
                        <li><a href="#"><?php echo e(Auth::user()->name); ?></a></li>
                        <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                        <?php endif; ?> -->
                    </ul>
                </nav>
                <img src="<?php echo e(asset('image/moon.png')); ?>" id="icon" width="30px" height="30px">
                <img src="<?php echo e(asset('image/menu.png')); ?>" id="menu-toggle" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="account-page">
                <div id="app" class="container">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>
    <!--script dark mode-->
    <script src="<?php echo e(asset('js/script.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(mix('js/app.js')); ?>" type="text/javascript"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html><?php /**PATH /var/www/aportes/resources/views/layouts/app.blade.php ENDPATH**/ ?>