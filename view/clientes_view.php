<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Sistema 1.0</title>
    <style>
      .container {  
      display: grid;  
      grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
      grid-template-rows: repeat(auto-fit, minmax(50px, 1fr));  
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
        <div><b>ID</b></div>  
        <div><b>Nome</b></div>  
        <div><b>CPF</b></div>  
        <div><b>Ações</b></div>
      </div>

      <?php
foreach($resultado as &$value):
    ?>
      <div class="container"> 
        <div><?php echo $value["id"]; ?></div>  
        <div><?php echo $value["nome"]; ?></div>  
        <div><?php echo $value["cpf"]; ?></div>  
        <div><a class="btn btn-primary btn-xs" href="<?php echo ENDERECO; ?>/clientes/editar/<?php echo $value["cpf"]; ?>">Visualizar</a></div>   
      </div>
      <?php
endforeach;
    ?>


 
     </div>
 </div> <!-- /#list -->
<?php
} else {
?>
<div id="lista_de_clientes">
    <img src="../../img/resultado.png" alt="some text" width=304 height=182>
    <p>Ops! Nenhum resultado encontrado! :(</p>
</div>
<?php
}
?>
 

</div><script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>