<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo e(asset('image/ips.png')); ?>">


    <title>I.P.S Corrientes</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <!--fontaweson-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <!--custom style-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('image/logo-ips-header.png')); ?>"
                            width="250px"></a>
                </div>
                <nav>
                    <?php if(Route::has('login')): ?>
                        <ul id="MenuItems">
                            <?php if(auth()->guard()->check()): ?>
                                <li><a href="<?php echo e(route('home')); ?>">HOME</a></li>
                            <?php else: ?>
                                <li><a href="<?php echo e(route('login')); ?>">INGRESAR</a></li>
                                <?php if(Route::has('register')): ?>
                                    <li><a href="<?php echo e(route('register')); ?>">REGISTRAR</a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>


                    <!-- <?php if(Route::has('login')): ?>
                        <ul>
                            <li><a href="">ABOUT</a></li>
                            <li><a href="">PORTFOLIO</a></li>
                            <li><a href="">CONCTAC</a></li>
                            <li><a href="">READ ME</a></li>
                            <?php if(auth()->guard()->check()): ?>
                                                                                        <li><a href="<?php echo e(route('home')); ?>">HOME</a></li>
                            <?php else: ?>
                                                                                        <li><a href="<?php echo e(route('login')); ?>">INGRESAR</a></li>
                                                                                        <?php if(Route::has('register')): ?>
                                                                                            <li><a href="<?php echo e(route('register')); ?>">REGISTRAR</a></li>
                                                                                        <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?> -->

                </nav>
                <img src="<?php echo e(asset('image/moon.png')); ?>" id="icon" width="30px" height="30px">
                <img src="<?php echo e(asset('image/menu.png')); ?>" id="menu-toggle" class="menu-icon"
                    onclick="menutoggle()">
            </div>

            <div class="account-page">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <div class="info">
                                <h1> Sistema de <span>Control</span> de Aporte</h1>
                                <p>Esta pagina esta creada para dar a conocer una alternativa con la que se puede
                                    mantener un buen manejo de los registros de haberes, en especial enfocando el eje
                                    central del
                                    trabajo, en una herramienta para mejorar la coordinación en las personas.</p>
                                <?php if(Route::has('login')): ?>
                                    <?php if(auth()->guard()->check()): ?>
                                        <a href="<?php echo e(route('home')); ?>">Volver</a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>">Ingresar</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="social-links">
                                <a href="https://twitter.com/IPSCorrientes" target="_blank"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/ipsoficialcorrientes" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/ipscorrientes/" target="_blank"><i
                                        class="fab fa-instagram"></i></a>
                                <a href="https://www.youtube.com/channel/UCX4s0DI_uOhAlwPvKLVno9A" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="img-box">

                                <img class="main-img" src="<?php echo e(asset('image/apple2.png')); ?>">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <!--script dark mode-->
    <script src="<?php echo e(asset('js/script.js')); ?>" type="text/javascript"></script>
</body>

</html>

<?php /**PATH /var/www/aportes/resources/views/welcome.blade.php ENDPATH**/ ?>