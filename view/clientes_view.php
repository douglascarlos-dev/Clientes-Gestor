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
  <div class="px-3">
<a class="btn btn-primary" href="<?php echo ENDERECO; ?>/clientes/novo/" role="button">Novo Cliente</a>
</div>

<div class="px-3 pt-md-3 pb-md-4 mx-auto text-center">



 <div id="list" class="row">
    <div class="table-responsive col-md-12">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th class="actions">Ações</th>
                 </tr>
            </thead>
            <tbody>
<?php
$resultado = $cliente->get_all_clientes();

foreach($resultado as &$value):
    echo "<tr>";
    echo "<td>" . $value["id"] . "</td>";
    echo "<td>" . $value["nome"] . "</td>";
    echo "<td>" . $value["cpf"] . "</td>";
    echo "<td class=\"actions\">
    <a class=\"btn btn-primary btn-xs\" href=\"" . ENDERECO . "/clientes/editar/" . $value["cpf"] . "\">Visualizar</a>
    </td>";
    echo "</tr>";
endforeach;
?>
</tbody>
         </table>
 
     </div>
 </div> <!-- /#list -->

 

</div><script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>