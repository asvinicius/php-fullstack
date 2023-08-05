<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Novo funcionário</h1>
    </div>
    <div class="form-responsive">
        <?php if ($alert != null) { ?>
            <div class="alert alert-<?php echo $alert["class"]; ?>"> <?php echo $alert["message"]; ?> </div>
        <?php } ?>
        <form class="row g-3" action="<?= base_url('addfunc/salvar'); ?>" method="post" enctype="multipart/form-data">
            <div class="col-8">
                <label for="inputName" class="form-label">Nome</label>
                <input type="text" class="form-control" id="inputName" name="fun_nome" placeholder="Nome" autofocus required>
            </div>
            <div class="col-4">
                <label for="inputLogin" class="form-label">Login</label>
                <input type="text" class="form-control" id="inputLogin" name="fun_login" placeholder="Login" required>
            </div>
            <div class="col-6">
                <label for="validatepassword" class="form-label">Senha</label>
                <input type="password" class="form-control" id="validatepassword" name="fun_senha" placeholder="Senha" required>
            </div>
            <div class="col-6">
                <label for="confirmpassword" class="form-label">Confirmar senha</label>
                <input type="password" class="form-control" id="confirmpassword" name="fun_senha_conf" placeholder="Confirmar Senha" required>
            </div>
            <div class="col-4">
                <label for="inputSaldo" class="form-label">Saldo</label>
                <input type="text" class="form-control" id="inputSaldo" name="fun_saldo" placeholder="Saldo" onkeyup="MoneyMask(this);" onkeypress="integerMask();" maxlength="7" required>
            </div>
            <div class="col-8">
                <label for="inputFoto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="inputFoto" name="fun_foto" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a type="button" href="<?= base_url('funcionarios'); ?>" class="btn btn-danger btn-user">
					Cancelar
				</a>
            </div>
        </form>
    </div>
</main>
<script src="<?= base_url('assets/dist/js/lr-maskvalid.js'); ?>" type="text/javascript"></script>
		<script src="<?= base_url('assets/dist/js/lr-passconfirm.min.js'); ?>" type="text/javascript"></script>