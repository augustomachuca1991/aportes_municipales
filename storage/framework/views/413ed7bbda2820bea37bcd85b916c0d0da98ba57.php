<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Dashboard Admin'); ?>

<?php $__env->startSection('content_header'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item active" aria-current="page">
                <i class="fas fa-home"></i> Panel

            </li>
        </ol>
    </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right-sidebar'); ?>
    <?php echo $__env->make('admin.right_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section id="app" class="">
        <div class="container">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver botones panel')): ?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <a href="/home">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-home"></i>
                                    </h1>
                                    <h6 class="text-white">Dashboard</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-olive text-center">
                                <a href="<?php echo e(route('files.index')); ?>">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-file-csv"></i>
                                    </h1>
                                    <h6 class="text-white">Excel / CSV</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-orange text-center">
                                <a href="<?php echo e(route('ddjj.index')); ?>">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-book"></i>
                                    </h1>
                                    <h6 class="text-white">Declaraciones Juradas</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <a href="<?php echo e(route('users.index')); ?>">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-users"></i>
                                    </h1>
                                    <h6 class="text-white">Usuarios</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <a href="/computos">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-calculator"></i>
                                    </h1>
                                    <h6 class="text-white">Computos</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <a href="<?php echo e(route('liquidaciones.index')); ?>">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </h1>
                                    <h6 class="text-white">Liquidaciones</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <a href="/hlaborales">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-stream"></i>
                                    </h1>
                                    <h6 class="text-white">Historias Laborales</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <a href="/conceptos">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-cogs"></i>
                                    </h1>
                                    <h6 class="text-white">Configuraciones</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-olive text-center">
                                <h1 class="font-light text-white">
                                    <i class="fas fa-building"></i>
                                </h1>
                                <h6 class="text-white">Departamentos</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-orange text-center">
                                <a href="<?php echo e(route('codigos.index')); ?>">
                                    <h1 class="font-light text-white">
                                        <i class="fas fa-list"></i>
                                    </h1>
                                    <h6 class="text-white">Codigos</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            <?php endif; ?>

            
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(mix('/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aportes/resources/views/admin/index.blade.php ENDPATH**/ ?>