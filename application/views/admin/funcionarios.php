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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('funcionarios/ordenacao/2'); ?>">Mais novos</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('funcionarios/ordenacao/1'); ?>">Mais antigos</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('funcionarios'); ?>">Ordem alfabética</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('funcionarios/ordenacao/3'); ?>">Ordem alfabética decrescente</a></li>
        </ol>
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Criação</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($funcionarios as $item){ ?>
                        <tr>
                            <td><?php echo $item->fun_id ?></td>
                            <td><?php echo $item->fun_nome ?></td>
                            <td>$ <?php echo number_format($item->fun_saldo, 2, ',', '.'); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($item->fun_criacao)) ?></td>
                            <td>
                                <a class="nav-link" href="<?= base_url('movimentacoes/funcionario/'.$item->fun_id); ?>" title="Extrato do funcionário">
                                    <span data-feather="file-text" class="align-text-bottom"></span>
                                </a>
                            </td>
                            <td>
                                <a class="nav-link" href="<?= base_url('editafunc/id/'.$item->fun_id); ?>" title="Editar" style="color: blue;">
                                    <span data-feather="edit-2" class="align-text-bottom"></span>
                                </a>
                            </td>
                            <td>
                                <a class="nav-link" href="<?= base_url('funcionarios/remover/'.$item->fun_id); ?>" title="Remover" style="color: red;" onclick="return confirm('Tem certeza que deseja remover?');">
                                    <span data-feather="trash" class="align-text-bottom"></span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php if($pagina == 0){ ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php } else{ ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= base_url('funcionarios/pagina/'.($pagina-1)); ?>" aria-label="Voltar">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if($mult == true){ ?>
                        <?php for($i = 0; $i<intdiv($itens, 10); $i++){ ?>
                            <?php if($i == $pagina){ ?>
                                <li class="page-item active"><a class="page-link" href="<?= base_url('funcionarios/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
                            <?php } else {?>
                                <li class="page-item"><a class="page-link" href="<?= base_url('funcionarios/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <?php for($i = 0; $i<=intdiv($itens, 10); $i++){ ?>
                            <?php if($i == $pagina){ ?>
                                <li class="page-item active"><a class="page-link" href="<?= base_url('funcionarios/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
                            <?php } else {?>
                                <li class="page-item"><a class="page-link" href="<?= base_url('funcionarios/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if($pagina == intdiv($itens, 10)){ ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php } else{ ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= base_url('funcionarios/pagina/'.($pagina+1)); ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    <?php } else { ?>
        <h4>Nenhum funcionário cadastrado</h4>
    <?php } ?>
</main>