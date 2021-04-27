<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ENDERECO; ?>/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Sistema 1.0</title>
    <style>
[class*="col"] {
    margin-bottom: 5px;
}
      </style>
  </head>
  <body>
  <?php require_once 'menu.php'; ?>
  <div class="px-3">
<a class="btn btn-primary" href="<?php echo ENDERECO; ?>/clientes/novo/" role="button">Novo Cliente</a>
</div>

<div class="px-3 pt-md-3 pb-md-4 mx-auto text-center">

<?php
$resultado = $cliente->get_all_clientes();
if(count($resultado) >= 1){
?>

 <div id="lista_de_clientes" class="row">
    <div class="table-responsive col-md-12">
        
    <div class="container">
    <div class="row">
      <div class="col p-2"><b>Nome</b></div>
      <div class="col p-2"><b>CPF</b></div>
      <div class="col p-2"><b>Ações</b></div>
 

      <?php
      $i = 0;
foreach($resultado as &$value):
    ?>
      <div class="w-100"></div>
      <div class="col<?php echo !($i % 2) ? " bg-light text-dark p-2" : " p-2"; ?>"><?php echo $value["nome"]; ?></div>  
      <div class="col<?php echo !($i % 2) ? " bg-light text-dark p-2" : " p-2"; ?>"><?php echo $value["cpf"]; ?></div>  
      <div class="col<?php echo !($i % 2) ? " bg-light text-dark p-2" : " p-2"; ?>"><a class="btn btn-primary btn-xs" href="<?php echo ENDERECO; ?>/clientes/editar/<?php echo $value["cpf"]; ?>">Visualizar</a></div>   
      
      <?php
      $i++;
endforeach;
    ?>


</div>
     </div>
 </div> <!-- /#list -->
<?php
} else {
?>
<div id="lista_de_clientes">
    <img src="<?php echo ENDERECO; ?>/img/resultado.png" alt="some text" width=304 height=182>
    <p>Ops! Nenhum resultado encontrado! :(</p>
</div>
<?php
}
?>
 

</div>

<script type="text/javascript" src="<?php echo ENDERECO; ?>/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo ENDERECO; ?>/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>