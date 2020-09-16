<h1 style="text-align: center">Bem vindos a Dog cursos</h1>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <form method="post" name="login" action="login.php">
                <div class="form-group">
                    <label>Usuário</label>
                    <input class="form-control" type="text" name="user" placeholder="Usuário">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" type="password" name="password" placeholder="Senha">
                </div>

                <input class="btn btn-success" type="submit" value="Login">
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<?php if (isset($_GET['erro'])) { ?>
    <br>
    <div class="alert alert-danger" role="alert">
        Usuário e/ou senha incorretos!
    </div>

<?php } ?>