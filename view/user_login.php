<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Software Web para cadastro de clientes com URL amigável usando PHP Orientado a Objetos, MVC e banco de dados Postgresql com PDO, CAPTCHA, PDF, API de CEP/Endereço e upload de imagem.">
    <link rel="canonical" href="https://clientesgestor.douglascarlos.dev">
    <meta name="author" content="Douglas Carlos">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/bootstrap.min.css" crossorigin="anonymous">
    <title>Clientes Gestor</title>
    <meta property="og:image" content="https://clientesgestor.douglascarlos.dev/img/5138237.png"/>
    <meta property="og:title" content="Clientes Gestor"/>
    <meta property="og:description" content="Software Web para cadastro de clientes com URL amigável usando PHP Orientado a Objetos, MVC e banco de dados Postgresql com PDO, CAPTCHA, PDF, API de CEP/Endereço e upload de imagem."/>
  </head>
  <body>
  <div class="mx-auto text-center col-md-8 order-md-1">
    <img src="<?php echo URLROOT; ?>/img/5138237.svg" height="200" width="274" alt="Contato">
    <h4>Clientes Gestor</h4>
    <p>Software Web para cadastro de clientes com URL amigável usando PHP Orientado a Objetos, MVC e banco de dados Postgresql com PDO, CAPTCHA, PDF, API de CEP/Endereço e upload de imagem.</p>
    <p>Demonstração
    <br>
    <b>Usuário:</b> admin
    <br>
    <b>Senha:</b> admin</p>
    <div class="card">
      <div class="card-body">
        <form name="entrar" action="<?php echo URLROOT; ?>/user/login" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputUsuario">Usuário</label>
                <input type="text" class="form-control" id="inputUsuario" name="username" autocomplete="username" placeholder="Usuário" maxlength="100">
            </div>
            <div class="form-group col-md-6">
                <label for="inputSenha">Senha</label>
                <input type="password" class="form-control" id="inputSenha" name="password" autocomplete="off" placeholder="Senha" maxlength="100">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                <div class="h-captcha" data-sitekey="<?php
$params = require "model/database.php";
echo $params['captcha_data-sitekey'];
?>"></div>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <footer class="pt-3 my-md-2">
        <div class="row">
          <div class="col-12 col-md">
            <small class="d-block mb-3 text-muted text-center">© 2024<br><a href="https://github.com/douglascarlos-dev" target="_blank"><img src="<?php echo URLROOT; ?>/img/logo.svg" alt="HTML tutorial" style="height:35px;"></a></small>
          </div>
        </div>
      </footer>
  </div>
<script type="text/javascript" src="<?php echo URLROOT; ?>/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src='https://www.hCaptcha.com/1/api.js' async defer></script>
</body>
</html>