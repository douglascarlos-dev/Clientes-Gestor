<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Sistema 1.0</title>
  </head>
  <body>
  <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center col-md-8 order-md-1">
  <div class="card">
  <div class="card-body">

  <form name="entrar" action="<?php echo URLROOT; ?>/user/login" method="post">

  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputUsuario">Usuário</label>
      <input type="text" class="form-control" id="inputUsuario" name="username" autocomplete="username" placeholder="admin" value="admin" maxlength="100">
  </div>

  <div class="form-group col-md-6">
      <label for="inputSenha">Senha</label>
      <input type="password" class="form-control" id="inputSenha" name="password" autocomplete="off" placeholder="admin" value="admin" maxlength="100">
  </div>
  </div>

  <button type="submit" class="btn btn-primary">Entrar</button>
  </form>

  </div>
  </div>
  </div>

<script type="text/javascript" src="<?php echo URLROOT; ?>/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>