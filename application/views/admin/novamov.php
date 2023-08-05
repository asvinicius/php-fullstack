<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Nova movimentação</h1>
    </div>
    <div class="form-responsive">
        <?php if ($alert != null) { ?>
            <div class="alert alert-<?php echo $alert["class"]; ?>"> <?php echo $alert["message"]; ?> </div>
        <?php } ?>
        <form class="row g-3" action="<?= base_url('addmov/salvar'); ?>" method="post">
            <div class="col-4">
                <label for="inputTipo" class="form-label">Tipo</label>
                <select class="form-select" id="inputTipo" name="mov_tipo" aria-label="Selecione o tipo" required>
                    <option selected>Selecione o tipo</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>
            </div>
            <div class="col-4">
                <label for="inputFunc" class="form-label">Funcionário</label>
                <select class="form-select" id="inputFunc" name="mov_fun" aria-label="Selecione o funcionário" required>
                    <option selected>Selecione o funcionário</option>
                    <?php foreach($funcionarios as $funcionario){ ?>
                        <option value="<?= $funcionario->fun_id ?>"><?= $funcionario->fun_nome ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-4">
                <label for="inputValor" class="form-label">Valor</label>
                <input type="text" class="form-control" id="inputValor" name="mov_valor" placeholder="Saldo" onkeyup="MoneyMask(this);" onkeypress="integerMask();" maxlength="7" required>
            </div>
            <div class="col-12">
                <label for="inputObs" class="form-label">Observação</label>
                <textarea class="form-control" id="inputObs" name="mov_obs" placeholder="Observação"  required></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a type="button" href="<?= base_url('movimentacoes'); ?>" class="btn btn-danger btn-user">
					Cancelar
				</a>
            </div>
        </form>
    </div>
</main>
<script src="<?= base_url('assets/dist/js/lr-maskvalid.js'); ?>" type="text/javascript"></script>
		<script src="<?= base_url('assets/dist/js/lr-passconfirm.min.js'); ?>" type="text/javascript"></script>