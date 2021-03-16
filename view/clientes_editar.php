<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Sistema 1.0</title>
  </head>
  <body>
  <?php require_once 'menu.php'; ?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center col-md-8 order-md-1">

<div class="card">
<div class="card-body">
<?php
$resultado = $cliente->get_cliente($cpf);
//print_r($resultado);
?>
<form action="<?php echo ENDERECO; ?>/clientes/atualizar/08416200670" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNome">Nome</label>
      <input type="text" class="form-control" id="inputNome" name="nome" value="<?php echo $resultado["nome"]; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">E-mail</label>
      <input type="text" class="form-control" id="inputPassword4" name="email" value="<?php echo $resultado["email"]; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNome">CPF</label>
      <input type="text" class="form-control" id="inputNome" name="cpf" value="<?php echo $resultado["cpf"]; ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Data de Nascimento</label>
      <input type="date" class="form-control" id="inputPassword4" name="data_de_nascimento" value="<?php echo $resultado["data_de_nascimento"]; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNome">Sexo</label>
        <select name=sexo class="form-control">
          <option value='Masculino' <?php if($resultado["sexo_cliente"] == 'Masculino') { echo 'selected'; } ?>>Masculino</option>
          <option value='Feminino' <?php if($resultado["sexo_cliente"] == 'Feminino') { echo 'selected'; } ?>>Feminino</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="inputNome">Estado Civil</label>
            <select name=estado_civil class="form-control">
            <option value=Solteiro <?php if($resultado["estado_civil_cliente"] == 'Solteiro') { echo 'selected'; } ?>>Solteiro</option>
                <option value=Casado <?php if($resultado["estado_civil_cliente"] == 'Casado') { echo 'selected'; } ?>>Casado</option>
                <option value=Divorciado <?php if($resultado["estado_civil_cliente"] == 'Divorciado') { echo 'selected'; } ?>>Divorciado</option>
                <option value=Viúvo <?php if($resultado["estado_civil_cliente"] == 'Viúvo') { echo 'selected'; } ?>>Viúvo</option>
            </select>
    </div>
  </div>
  
  <?php

$telefone = $cliente->get_cliente_telefone($cpf);

foreach($telefone as &$value):

    echo "<div class=\"form-row\">";
    echo "<div class=\"form-group col-md-6\">";
    echo "<label for=\"inputNome\">Telefone</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputNome\" name=\"descricao\" value=\"" . $value["tipo"] . "\" readonly>";
    
    echo "</div>";
    echo "<div class=\"form-group col-md-5\">";
    echo "<label for=\"inputNome\">Número</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputNome\" name=\"telefone\" value=\"" . $value["telefone"] . "\" readonly>";
    
    echo "</div>";

    echo "<div class=\"form-group col-md-1\">
      <label for=\"inputZip\">Apagar</label>
      <a class=\"btn btn-danger\" href=\"";echo ENDERECO; echo "/telefones/apagar/";
    echo $cpf;
    echo "/";
    echo $value["tipo"];
    echo "/";
    echo $value["telefone"];
    echo "\" role=\"button\">Deletar</a>
    </div>";

    echo "</div>";

endforeach;
  ?>
  
  

  <button type="submit" class="btn btn-primary">Atualizar</button>
  <a class="btn btn-outline-primary" href="<?php echo ENDERECO; ?>/telefones/novo/<?php echo $cpf; ?>" role="button">Adicionar telefone</a>
  <a class="btn btn-danger" href="<?php echo ENDERECO; ?>/clientes/deletar/<?php echo $cpf; ?>" role="button">Deletar</a>

  
</form>

</div>

</div>
</div>

</div><script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>