<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ENDERECO; ?>/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Sistema 1.0</title>
  </head>
  <body>
  <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center col-md-8 order-md-1">
  <div class="card">
  <div class="card-body">

  <form name="entrar" action="<?php echo ENDERECO; ?>/user/login" method="post">

  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputUsuario">Usuário</label>
      <input type="text" class="form-control" id="inputUsuario" name="username" autocomplete="username" maxlength="100">
  </div>

  <div class="form-group col-md-6">
      <label for="inputSenha">Senha</label>
      <input type="password" class="form-control" id="inputSenha" name="password" autocomplete="off" maxlength="100">
  </div>
  </div>

  <button type="submit" class="btn btn-primary">Entar</button>
  </form>

  </div>
  </div>
  </div>

<script type="text/javascript" src="<?php echo ENDERECO; ?>/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo ENDERECO; ?>/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>