<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Funcionarios</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="<?= base_url('addfunc'); ?>">
                <span data-feather="plus" class="align-text-bottom"></span>
                Adicionar
            </a>
        </div>
    </div>
    <?php if ($alert != null) { ?>
        <div class="alert alert-<?php echo $alert["class"]; ?>" role="alert"> 
            <?php echo $alert["message"]; ?> 
        </div>
    <?php } ?>
    
    <?php if($funcionarios){ ?>
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Criação</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($funcionarios as $item){ ?>
                        <tr>
                            <td><?php echo $item->fun_id ?></td>
                            <td><?php echo $item->fun_nome ?></td>
                            <td>$ <?php echo number_format($item->fun_saldo, 2, ',', '.'); ?></td>
                            <td><?php echo $item->fun_criacao ?></td>
                            <td>Ações</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <h4>Nenhum funcionário cadastrado</h4>
    <?php } ?>
</main>