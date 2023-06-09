<div class="p-3 control-sidebar-content">
    <h5>Configuraciones</h5>
    <ul class="nav flex-column mb-5">
        <li class="nav-item">
            <a class="nav-link" href=" <?php echo e(route('codigos.index')); ?>" :class="request()->routeIs('codigos.index')? 'active' : '' ">
                <i class="fas fa-bookmark text-warning"></i> Codigos

            </a>
            <a class="nav-link" href=" <?php echo e(route('configuraciones.index')); ?>" :class="request()->routeIs('configuraciones.index')? 'active' : '' ">
                <i class="fas fa-cogs text-danger"> </i> Configuración

            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=" <?php echo e(route('configuraciones.auditoria')); ?>" :class="request()->routeIs('configuraciones.auditoria')? 'active' : '' ">
                <i class="fas fa-unlock"> Auditorias</i>
            </a>
        </li>
    </ul>
</div><?php /**PATH /var/www/aportes/resources/views/admin/right_sidebar.blade.php ENDPATH**/ ?>