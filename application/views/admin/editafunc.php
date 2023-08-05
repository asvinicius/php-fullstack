<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar funcionário</h1>
    </div>
    <div class="form-responsive">
        <?php if ($alert != null) { ?>
            <div class="alert alert-<?php echo $alert["class"]; ?>"> <?php echo $alert["message"]; ?> </div>
        <?php } ?>
        <form class="row g-3" action="<?= base_url('editafunc/atualizar'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" id="fun_id" name="fun_id" value="<?= $funcionario['fun_id'] ?>">
            <input type="hidden" id="fun_senha" name="fun_senha" value="<?= $funcionario['fun_senha'] ?>">
            <input type="hidden" id="fun_adm" name="fun_adm" value="<?= $funcionario['fun_adm'] ?>">
            <input type="hidden" id="fun_foto" name="fun_foto" value="<?= $funcionario['fun_foto'] ?>">
            <input type="hidden" id="fun_criacao" name="fun_criacao" value="<?= $funcionario['fun_criacao'] ?>">
            <input type="hidden" id="fun_status" name="fun_status" value="<?= $funcionario['fun_status'] ?>">
            <div class="col-8">
                <label for="inputName" class="form-label">Nome</label>
                <input type="text" class="form-control" value="<?= $funcionario['fun_nome']; ?>" id="inputName" name="fun_nome" placeholder="Nome" autofocus required>
            </div>
            <div class="col-4">
                <label for="inputLogin" class="form-label">Login</label>
                <input type="text" class="form-control" value="<?= $funcionario['fun_login']; ?>" id="inputLogin" name="fun_login" placeholder="Login" required>
            </div>
            <div class="col-6">
                <label for="validatepassword" class="form-label">Senha</label>
                <input type="password" class="form-control" id="validatepassword" name="fun_senha_nova" placeholder="Em branco para manter a senha antiga">
            </div>
            <div class="col-6">
                <label for="confirmpassword" class="form-label">Confirmar senha</label>
                <input type="password" class="form-control" id="confirmpassword" name="fun_senha_conf" placeholder="Confirmar Senha">
            </div>
            <div class="col-4">
                <label for="inputSaldo" class="form-label">Saldo</label>
                <input type="text" class="form-control" value="<?= $funcionario['fun_saldo']; ?>" id="inputSaldo" name="fun_saldo" placeholder="Saldo" onkeyup="MoneyMask(this);" onkeypress="integerMask();" maxlength="7" required>
            </div>
            <div class="col-8">
                <label for="inputFoto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="inputFoto" name="fun_foto_atualizada">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a type="button" href="<?= base_url('funcionarios'); ?>" class="btn btn-danger btn-user">
					Cancelar
				</a>
            </div>
        </form>
    </div>
</main>
<script src="<?= base_url('assets/dist/js/lr-maskvalid.js'); ?>" type="text/javascript"></script>
		<script src="<?= base_url('assets/dist/js/lr-passconfirm.min.js'); ?>" type="text/javascript"></script>