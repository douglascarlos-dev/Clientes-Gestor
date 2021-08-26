<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Sistema 1.0</title>
  </head>
  <body>
  <?php require_once 'menu.php'; ?>
  
    Bem vindo <?php echo $_SESSION['username']; ?>.

  <div id="dashboard">
  </div>

<script type="text/javascript" src="<?php echo URLROOT; ?>/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>