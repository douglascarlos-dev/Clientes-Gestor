<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Sistema 1.0</title>

    <style>
    .mt-4, .my-4 {
    margin-top: 2rem!important;
    }

    .thumbnail {
        border-radius: 50%;
        display: block;
        padding: 2px;
        line-height: 1.42857143;
        background-color: #fff;
        border: 1px solid #ddd;
        /*border-radius: 4px;*/
        -webkit-transition: border .2s ease-in-out;
        -o-transition: border .2s ease-in-out;
        transition: border .2s ease-in-out;
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

?>
<form action="<?php echo URLROOT; ?>/customer/update/<?php echo $customer->getCPF(); ?>" method="post">

  <div class="form-row">

    <div class="form-group col-md-2">
      <center><a href="<?php echo URLROOT; ?>/photo/new/<?php echo $customer->getCPF(); ?>"><img src="<?php echo URLROOT; ?>/images/<?php echo $customer->getPhoto()."?t=".time(); ?>" alt="Image preview" class="thumbnail" width="133" height="133"></a></center>
    </div>

    <div class="form-group col-md-4 text-left">
      <p>Cadastrado em: <?php echo $customer->getCreated(); ?></p>
      <p>Atualizado em: <?php echo $customer->getUpdated(); ?></p>
    </div>

    <div class="form-group col-md-6">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNome">Nome</label>
      <input type="text" class="form-control" id="inputNome" name="nome" value="<?php echo $customer->getName(); ?>" maxlength="100">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail">E-mail</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text">@</div>
        </div>
        <input type="text" class="form-control" id="inputEmail" name="email" value="<?php echo $customer->getEmail(); ?>" maxlength="100">
      </div>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCPF">CPF</label>
      <input type="text" class="form-control" id="inputCPF" name="cpf" value="<?php echo Mask("###.###.###-##",$customer->getCPF()); ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputDataDeNascimento">Data de Nascimento</label>
      <input type="date" class="form-control" id="inputDataDeNascimento" name="data_de_nascimento" value="<?php echo $customer->getBirthDate(); ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputSexo">Sexo</label>
        <select name="sexo" id="selectSexo" class="form-control">
          <option value='Masculino' name='Masculino'  <?php if($customer->getSex() == 'Masculino') { echo 'selected'; } ?>>Masculino</option>
          <option value='Feminino' name='Feminino' <?php if($customer->getSex() == 'Feminino') { echo 'selected'; } ?>>Feminino</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="selectEstadoCivil">Estado Civil</label>
            <select id="selectEstadoCivil" name='estado_civil' class="form-control">
            <option value="Solteiro" name='Solteiro' <?php if($customer->getMaritalStatus() == 'Solteiro') { echo 'selected'; } ?>>Solteiro</option>
                <option value="Casado" name='Casado' <?php if($customer->getMaritalStatus() == 'Casado') { echo 'selected'; } ?>>Casado</option>
                <option value="Divorciado" name='Divorciado' <?php if($customer->getMaritalStatus() == 'Divorciado') { echo 'selected'; } ?>>Divorciado</option>
                <option value="Viúvo" name='Viúvo' <?php if($customer->getMaritalStatus() == 'Viúvo') { echo 'selected'; } ?>>Viúvo</option>
            </select>
    </div>
  </div>
  
<?php
foreach($phone as &$phone_value):
?>
<div class="form-row">
  <a class="btn btn-danger col-md-1 my-4" href="<?php echo URLROOT; ?>/phone/delete/<?php echo $phone_value->getCPF(); ?>/<?php echo $phone_value->getType(); ?>/<?php echo $phone_value->getPhone(); ?>" role="button">Deletar</a>
  <div class="form-group col-md-5">
    <label for="inputTipoTelefone">Telefone</label>
    <input type="text" class="form-control" id="inputTipoTelefone" name="phone_type" value="<?php echo $phone_value->getType(); ?>" readonly>
  </div>
  <div class="form-group col-md-6">
    <label for="inputTelefone">Número</label>
    <input type="text" class="form-control" id="inputTelefone" name="phone" value="<?php $phone_ = $phone_value->getPhone(); echo (strlen($phone_) == 10) ? Mask('(##) ####-####',$phone_) : Mask('(##) # ####-####',$phone_); ?>" readonly>
  </div>
</div>
<?php
endforeach;

foreach($address as &$address_value):
?>

<div class="form-row">
  <a class="btn btn-danger col-md-1 my-4" href="<?php echo URLROOT; ?>/address/delete/<?php echo $address_value->getCPF(); ?>/<?php echo $address_value->getAddressCategory(); ?>" role="button">Deletar</a>
  <div class="form-group col-md-5">
  <label for="inputCategoria">Categoria endereço</label>
  <input type="text" class="form-control" id="inputCategoria" name="address_category" value="<?php echo $address_value->getAddressCategory(); ?>" readonly>
</div>
<div class="form-group col-md-6">
  <label for="inputTipo">Tipo</label>
  <input type="text" class="form-control" id="inputTipo" name="type" value="<?php echo $address_value->getType(); ?>" readonly>
</div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputNome">Nome</label>
    <input type="text" class="form-control" id="inputNome" name="name" value="<?php echo $address_value->getName(); ?>" readonly>
  </div>
  <div class="form-group col-md-2">
    <label for="inputNumero">Número</label>
    <input type="text" class="form-control" id="inputNumero" name="number" value="<?php echo $address_value->getNumber(); ?>" readonly>
  </div>
  <div class="form-group col-md-4">
    <label for="inputBairro">Bairro</label>
    <input type="text" class="form-control" id="inputBairro" name="district" value="<?php echo $address_value->getDistrict(); ?>" readonly>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputCidade">Cidade</label>
    <input type="text" class="form-control" id="inputCidade" name="city" value="<?php echo $address_value->getCity(); ?>" readonly>
  </div>
  <div class="form-group col-md-2">
    <label for="inputUF">UF</label>
    <input type="text" class="form-control" id="inputUF" name="state" value="<?php echo $address_value->getState(); ?>" readonly>
  </div>
  <div class="form-group col-md-4">
    <label for="inputCEP">CEP</label>
    <input type="text" class="form-control" id="inputCEP" name="zip_code" value="<?php echo Mask("##.###-###",$address_value->getZipCode()); ?>" readonly>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-12">
    <label for="inputComplemento">Complemento</label>
    <input type="text" class="form-control" id="inputComplemento" name="complement" value="<?php echo $address_value->getComplement(); ?>" readonly>
  </div>
</div>

<?php
endforeach;
?>

<button type="submit" class="btn btn-primary">Atualizar</button>
<a class="btn btn-info" id="newAddress" href="<?php echo URLROOT; ?>/customer/pdf/<?php echo $cpf; ?>" role="button" target="_blank">Relatório em PDF</a>
<a class="btn btn-outline-primary" id="newAddress" href="<?php echo URLROOT; ?>/address/new/<?php echo $cpf; ?>" role="button">Adicionar endereço</a>
<a class="btn btn-outline-primary" id="newPhone" href="<?php echo URLROOT; ?>/phone/new/<?php echo $cpf; ?>" role="button">Adicionar telefone</a>
<a class="btn btn-danger" href="<?php echo URLROOT; ?>/customer/delete/<?php echo $cpf; ?>" role="button">Deletar</a>

</form>

</div>

</div>
</div>
<script type="text/javascript" src="<?php echo URLROOT; ?>/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>