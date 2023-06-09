<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" type="image/png" href="<?php echo e(asset('image/ips.png')); ?>">
    <title>I.P.S Corrientes</title>




    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--fontaweson-->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/font-awesome.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!--custom style-->
    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body>
    <div id="app">
        <div class="header">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <img src="<?php echo e(asset('image/logo-ips-header.png')); ?>" alt="logo_ips" class="rounded float-left">

                        <!-- <small class="text-muted">Instittuto de Previsión Social de Corrientes</small> -->
                        <!-- <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('image/logo-ips-header.png')); ?>"></a> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto w-100">
                            <li>
                                
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">


                            <?php if(auth()->guard()->check()): ?>
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" type="button" id="dropdownAuthUser"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span><?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownAuthUser">
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                            <i
                                                class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;<?php echo e(__('Logout')); ?></a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                            style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </div>

                            <?php endif; ?>
                            <!-- <img src="image/moon.png" id="icon"> -->
                        </ul>
                    </div>
                </div>
            </nav>

        </div>

        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>

    </div>

    <!--script dark mode-->
    <script src="<?php echo e(mix('js/app.js')); ?>" type="text/javascript"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html>
<?php /**PATH /var/www/aportes/resources/views/layouts/app2.blade.php ENDPATH**/ ?>