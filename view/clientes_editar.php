<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Sistema 1.0</title>

    <style>
    .mt-4, .my-4 {
    margin-top: 2rem!important;
    }
    </style>
    
  </head>
  <body>
  <?php require_once 'menu.php'; ?>

<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center col-md-8 order-md-1">

<div class="card">
<div class="card-body">
<?php

function Mask($mask,$str){
  $str = str_replace(" ","",$str);
  for($i=0;$i<strlen($str);$i++){
      $mask[strpos($mask,"#")] = $str[$i];
  }
  return $mask;
}

$resultado = $cliente->get_cliente($cpf);
?>
<form action="<?php echo URLROOT; ?>/clientes/atualizar/<?php echo $resultado["cpf"]; ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNome">Nome</label>
      <input type="text" class="form-control" id="inputNome" name="nome" value="<?php echo $resultado["nome"]; ?>" maxlength="100">
      
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail">E-mail</label>
      <input type="text" class="form-control" id="inputEmail" name="email" value="<?php echo $resultado["email"]; ?>" maxlength="100">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCPF">CPF</label>
      <input type="text" class="form-control" id="inputCPF" name="cpf" value="<?php echo Mask("###.###.###-##",$resultado["cpf"]); ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputDataDeNascimento">Data de Nascimento</label>
      <input type="date" class="form-control" id="inputDataDeNascimento" name="data_de_nascimento" value="<?php echo $resultado["data_de_nascimento"]; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputSexo">Sexo</label>
        <select name="sexo" id="selectSexo" class="form-control">
          <option value='Masculino' name='Masculino'  <?php if($resultado["sexo_cliente"] == 'Masculino') { echo 'selected'; } ?>>Masculino</option>
          <option value='Feminino' name='Feminino' <?php if($resultado["sexo_cliente"] == 'Feminino') { echo 'selected'; } ?>>Feminino</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="selectEstadoCivil">Estado Civil</label>
            <select id="selectEstadoCivil" name='estado_civil' class="form-control">
            <option value="Solteiro" name='Solteiro' <?php if($resultado["estado_civil_cliente"] == 'Solteiro') { echo 'selected'; } ?>>Solteiro</option>
                <option value="Casado" name='Casado' <?php if($resultado["estado_civil_cliente"] == 'Casado') { echo 'selected'; } ?>>Casado</option>
                <option value="Divorciado" name='Divorciado' <?php if($resultado["estado_civil_cliente"] == 'Divorciado') { echo 'selected'; } ?>>Divorciado</option>
                <option value="Viúvo" name='Viúvo' <?php if($resultado["estado_civil_cliente"] == 'Viúvo') { echo 'selected'; } ?>>Viúvo</option>
            </select>
    </div>
  </div>
  
  <?php
/*
$telefone = $cliente->get_cliente_telefone($cpf);

foreach($telefone as &$value):

    echo "<div class=\"form-row\">";

    echo "<a class=\"btn btn-danger col-md-1 my-4\" href=\"";echo ENDERECO; echo "/telefones/apagar/";
    echo $cpf;
    echo "/";
    echo $value["tipo"];
    echo "/";
    echo $value["telefone"];
    echo "\" role=\"button\">Deletar</a>";
    
    echo "<div class=\"form-group col-md-5\">";
    echo "<label for=\"inputTipoTelefone\">Telefone</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputTipoTelefone\" name=\"tipo_telefone\" value=\"" . $value["tipo"] . "\" readonly>";
    
    echo "</div>";
    echo "<div class=\"form-group col-md-6\">";
    echo "<label for=\"inputTelefone\">Número</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputTelefone\" name=\"telefone\" value=\"" . Mask("(##) # ####-####",$value["telefone"]) . "\" readonly>";
    
    echo "</div>";

    echo "</div>";

endforeach;
*/

foreach($telefone as &$telefone_value):
?>
<div class="form-row">
<a class="btn btn-danger col-md-1 my-4" href="<?php echo URLROOT; ?>/telefones/apagar/<?php echo $telefone_value->getCPF(); ?>/<?php echo $telefone_value->getTipo(); ?>/<?php echo $telefone_value->getTelefone(); ?>" role="button">Deletar</a>
<div class="form-group col-md-5">
<label for="inputTipoTelefone">Telefone</label>
<input type="text" class="form-control" id="inputTipoTelefone" name="tipo_telefone" value="<?php echo $telefone_value->getTipo(); ?>" readonly>
</div>
<div class="form-group col-md-6">
<label for="inputTelefone">Número</label>
<input type="text" class="form-control" id="inputTelefone" name="telefone" value="<?php echo Mask('(##) # ####-####',$telefone_value->getTelefone()); ?>" readonly>
</div>
</div>
<?php
endforeach;

foreach($address as &$address_value):

    echo "<div class=\"form-row\">";

    echo "<a class=\"btn btn-danger col-md-1 my-4\" href=\"";echo URLROOT; echo "/address/remove/";
    echo $address_value->getCPF();
    echo "/";
    echo $address_value->getAddressCategory();
    echo "\" role=\"button\">Deletar</a>";


    echo "<div class=\"form-group col-md-5\">";
    echo "<label for=\"inputCategoria\">Categoria endereço</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputCategoria\" name=\"address_category\" value=\"" . $address_value->getAddressCategory() . "\" readonly>";
    
    echo "</div>";
    echo "<div class=\"form-group col-md-6\">";
    echo "<label for=\"inputTipo\">Tipo</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputTipo\" name=\"type\" value=\"" . $address_value->getType() . "\" readonly>";
    
    echo "</div>";

    

    echo "</div>";

    echo "<div class=\"form-row\">";
    echo "<div class=\"form-group col-md-6\">";
    echo "<label for=\"inputNome\">Nome</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputNome\" name=\"name\" value=\"" . $address_value->getName() . "\" readonly>";
    
    echo "</div>";
    echo "<div class=\"form-group col-md-2\">";
    echo "<label for=\"inputNumero\">Número</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputNumero\" name=\"number\" value=\"" . $address_value->getNumber() . "\" readonly>";
    
    echo "</div>";

    echo "<div class=\"form-group col-md-4\">";
    echo "<label for=\"inputBairro\">Bairro</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputBairro\" name=\"district\" value=\"" . $address_value->getDistrict() . "\" readonly>";
    
    echo "</div>";
    echo "</div>";

    

    echo "<div class=\"form-row\">";
    echo "<div class=\"form-group col-md-6\">";
    echo "<label for=\"inputCidade\">Cidade</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputCidade\" name=\"city\" value=\"" . $address_value->getCity() . "\" readonly>";
    
    echo "</div>";
    echo "<div class=\"form-group col-md-2\">";
    echo "<label for=\"inputUF\">UF</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputUF\" name=\"state\" value=\"" .  $address_value->getState() . "\" readonly>";
    
    echo "</div>";

    echo "<div class=\"form-group col-md-4\">";
    echo "<label for=\"inputCEP\">CEP</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputCEP\" name=\"zip_code\" value=\"" . Mask("##.###-###",$address_value->getZipCode()) . "\" readonly>";
    
    echo "</div>";
    echo "</div>";



    echo "<div class=\"form-row\">";
    echo "<div class=\"form-group col-md-12\">";
    echo "<label for=\"inputComplemento\">Complemento</label>";

    echo "<input type=\"text\" class=\"form-control\" id=\"inputComplemento\" name=\"complement\" value=\"" . $address_value->getComplement() . "\" readonly>";
    
    echo "</div>";
    echo "</div>";

endforeach;
  ?>
  
  

  <button type="submit" class="btn btn-primary">Atualizar</button>
  <a class="btn btn-outline-primary" id="newAddress" href="<?php echo URLROOT; ?>/address/new/<?php echo $cpf; ?>" role="button">Adicionar endereço</a>
  <a class="btn btn-outline-primary" id="novoTelefone" href="<?php echo URLROOT; ?>/telefones/novo/<?php echo $cpf; ?>" role="button">Adicionar telefone</a>
  <a class="btn btn-danger" href="<?php echo URLROOT; ?>/clientes/deletar/<?php echo $cpf; ?>" role="button">Deletar</a>

  
</form>

</div>

</div>
</div>

<script type="text/javascript" src="<?php echo URLROOT; ?>/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>