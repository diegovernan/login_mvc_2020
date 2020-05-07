<?php $render('header'); ?>

<div class="container vh-100 d-flex align-items-center col justify-content-center">
    <div class="card">
        <div class="card-header">
            <h5 class="text-center">Registrar-se</h5>
        </div>

        <div class="card-body">
            <form method="" action="">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="passwordconfirm">Confirmação da senha</label>
                    <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <span><a href="<?= $base ?>/login">Já possuí cadastro?</a></span>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $render('footer'); ?>