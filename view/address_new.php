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

  <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center col-md-8 order-md-1">

  <div class="alert alert-danger d-none" role="alert" id="myDIV">Certifique-se de que todos os campos estão preenchidos e tente novamente.</div>
  <div class="alert alert-danger d-none" role="alert" id="divUf">Verifique o campo UF.</div>
  <div class="alert alert-danger d-none" role="alert" id="divCep">Verifique o campo CEP.</div>

<div class="card">
<div class="card-body">
<form name="register" action="<?php echo URLROOT; ?>/address/save/<?php echo $cpf; ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCategoria">Categoria endereço</label>
      <select id="selectCategoria" name="address_category" class="form-control" autofocus>
          <option value='Residencial' name='Residencial' selected>Residencial</option>
          <option value='Comercial' name='Comercial'>Comercial</option>
          <option value='Caixa postal' name='Caixa postal'>Caixa postal</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputTipo">Tipo (Avenida, Rua, etc)</label>
      <input type="text" class="form-control" id="inputTipo" name="type" maxlength="20">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNome">Nome</label>
      <input type="text" class="form-control" id="inputNome" name="name" maxlength="100">
    </div>
    <div class="form-group col-md-6">
      <label for="inputNumero">Número</label>
      <input type="text" class="form-control" id="inputNumero" name="number" maxlength="10">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputBairro">Bairro</label>
      <input type="text" class="form-control" id="inputBairro" name="neighborhood" maxlength="100">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCidade">Cidade</label>
      <input type="text" class="form-control" id="inputCidade" name="city" maxlength="100">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputUF">UF</label>
      <input type="text" class="form-control" id="inputUF" name="state" maxlength="2" style="text-transform:uppercase">
    </div>
    <div class="form-group col-md-3">
      <label for="inputCEP">CEP</label>
      <input type="text" class="form-control" id="inputCEP" name="zip_code" maxlength="8">
    </div>
    <div class="form-group col-md-6">
      <label for="inputComplemento">Complemento</label>
      <input type="text" class="form-control" id="inputComplemento" name="complement" maxlength="60">
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

            var useraddresstype = $(this).find('input[name="type"]');
            var useraddressname = $(this).find('input[name="name"]');
            var useraddressnumber = $(this).find('input[name="number"]');
            var useraddressneighborhood = $(this).find('input[name="neighborhood"]');
            var useraddresscity = $(this).find('input[name="city"]');
            var useraddressstate = $(this).find('input[name="state"]');
            var useraddresszipcode = $(this).find('input[name="zip_code"]');
            var useraddresscomplement = $(this).find('input[name="complement"]');

            if ($.trim(useraddresstype.val()) === "" || $.trim(useraddressname.val()) === "" || $.trim(useraddressnumber.val()) === "" || $.trim(useraddressneighborhood.val()) === "" || $.trim(useraddresscity.val()) === "" || $.trim(useraddressstate.val()) === "" || $.trim(useraddresszipcode.val()) === "") {
                $("#myDIV").removeClass('d-none');
                e.preventDefault();
            } else {
                $("#myDIV").addClass('d-none');
            }

            if ($.trim(useraddressstate.val().length) != 2) {
                $("#divUf").removeClass('d-none');
                e.preventDefault();
            } else {
                $("#divUf").addClass('d-none');
            }

            if ($.trim(useraddresszipcode.val().length) != 8 || $.isNumeric( useraddresszipcode.val() ) != true) {
                $("#divCep").removeClass('d-none');
                e.preventDefault();
            } else {
                $("#divCep").addClass('d-none');
            }
        });

    });
    </script>
</body>
</html>