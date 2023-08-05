<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Movimentações</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="<?= base_url('addmov'); ?>">
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
    
    <?php if($movimentacoes){ ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php if($tipo == 1){ ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('movimentacoes'); ?>">Mais novos</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('movimentacoes/ordenacao/1'); ?>">Mais antigos</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('movimentacoes/ordenacao/2'); ?>">Ordenação por tipo</a></li>
                <?php } ?>
            </ol>
        </nav>
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <?php if($tipo == 2){ ?>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Observação</th>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Funcionário</th>
                            <th scope="col">Observação</th>
                            <th scope="col">Data</th>
                        </tr>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php foreach($movimentacoes as $item){ ?>
                        <?php if($tipo == 2){ ?>
                            <tr>
                                <td><?php echo date('d/m/Y', strtotime($item->mov_data)) ?></td>
                                <td>
                                    <?php if($item->mov_tipo == 1){ ?>
                                        Entrada
                                    <?php } else { ?>
                                        Saída
                                    <?php } ?>
                                </td>
                                <td>$ <?php echo number_format($item->mov_valor, 2, ',', '.'); ?></td>
                                <td><?php echo $item->mov_obs ?></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td><?php echo $item->mov_id ?></td>
                                <td>
                                    <?php if($item->mov_tipo == 1){ ?>
                                        Entrada
                                    <?php } else { ?>
                                        Saída
                                    <?php } ?>
                                </td>
                                <td>$ <?php echo number_format($item->mov_valor, 2, ',', '.'); ?></td>
                                <td><?php echo $item->fun_nome ?></td>
                                <td><?php echo $item->mov_obs ?></td>
                                <td><?php echo date('d/m/Y', strtotime($item->mov_data)) ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
            <?php if($tipo == 1){ ?>
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
                                <a class="page-link" href="<?= base_url('movimentacoes/pagina/'.($pagina-1)); ?>" aria-label="Voltar">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if($mult == true){ ?>
                            <?php for($i = 0; $i<intdiv($itens, 10); $i++){ ?>
                                <?php if($i == $pagina){ ?>
                                    <li class="page-item active"><a class="page-link" href="<?= base_url('movimentacoes/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
                                <?php } else {?>
                                    <li class="page-item"><a class="page-link" href="<?= base_url('movimentacoes/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
                                <?php } ?>
                            <?php } ?>
                        <?php } else { ?>
                            <?php for($i = 0; $i<=intdiv($itens, 10); $i++){ ?>
                                <?php if($i == $pagina){ ?>
                                    <li class="page-item active"><a class="page-link" href="<?= base_url('movimentacoes/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
                                <?php } else {?>
                                    <li class="page-item"><a class="page-link" href="<?= base_url('movimentacoes/pagina/'.$i); ?>"><?php echo $i+1; ?></a></li>
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
                                <a class="page-link" href="<?= base_url('movimentacoes/pagina/'.($pagina+1)); ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            <?php } ?>
        </div>
    <?php } else { ?>
        <h4>Nenhuma movimentação a ser exibida</h4>
    <?php } ?>
</main>