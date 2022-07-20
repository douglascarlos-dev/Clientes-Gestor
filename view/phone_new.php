<?php
//define('ENDERECO', '/php-pdo-oop-clean-urls-postgresql');
?><!doctype html>
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




  <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center col-md-8 order-md-1">

  <div class="alert alert-danger d-none" role="alert" id="myDIV">Certifique-se de que todos os campos estão preenchidos e tente novamente.</div>
  <div class="alert alert-danger d-none" role="alert" id="divTelefone">O campo telefone deve ter no mínimo 8 e no máximo 11 caracteres.</div>

<div class="card">
<div class="card-body">
<form name="register" action="<?php echo URLROOT; ?>/phone/save/<?php echo $cpf; ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNome">Descrição</label>
      <select id="selectTipo" name="type" class="form-control">
          <option value='Casa' name='Casa' selected>Casa</option>
          <option value='Celular' name='Celular'>Celular</option>
          <option value='Recado' name='Recado'>Recado</option>
          <option value='Trabalho' name='Trabalho'>Trabalho</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputTelefone">Telefone</label>
      <input type="tel" class="form-control" id="inputTelefone" name="phone" maxlength="11">
    </div>
  </div>

  <a class="btn btn-outline-primary" href="<?php echo URLROOT; ?>/customer/edit/<?php echo $cpf; ?>" role="button">Cancelar</a> 
  <button type="submit" class="btn btn-primary">Cadastrar</button> 

</form>

</div>

</div>
</div>

<script
    type="text/javascript"
    src="<?php echo URLROOT; ?>/js/jquery-3.5.1.slim.min.js"
    
  ></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


    <script type="text/javascript">
    $(document).ready(function () {

        $('form[name="register"]').on("submit", function (e) {

            var usertelefone = $(this).find('input[name="phone"]');

            if ($.trim(usertelefone.val()) === "") {
                $("#myDIV").removeClass('d-none');
                e.preventDefault();
            } else {
                $("#myDIV").addClass('d-none');
            }

            if ($.trim(usertelefone.val().length) <= 7 || $.isNumeric( usertelefone.val() ) != true) {
                $("#divTelefone").removeClass('d-none');
                e.preventDefault();
            } else {
                $("#divTelefone").addClass('d-none');
            }
        });

    });
    </script>
</body>
</html>