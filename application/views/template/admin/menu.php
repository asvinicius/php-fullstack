<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url(); ?>">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Início
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('funcionarios'); ?>">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Funcionários
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('movimentacoes'); ?>">
                    <span data-feather="repeat" class="align-text-bottom"></span>
                    Movimentações
                </a>
            </li>
            <hr class="my-3">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('login/signout'); ?>">
                    <span data-feather="log-out" class="align-text-bottom"></span>
                    Sair
                </a>
            </li>
        </ul>

        <!--
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
        -->
    </div>
</nav>