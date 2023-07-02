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
  <div class="card">
    <div class="card-body">
      <form name="register" action="<?php echo URLROOT; ?>/photo/save/<?php echo $cpf; ?>" method="post" enctype="multipart/form-data">
        <div class="form-row">
          <label for="inputPhoto">Foto</label>
          <div class="input-group col-md-12">
            <input type="file" id="inputPhoto" name="photo" accept="image/png, image/jpeg">
          </div>
        </div>
        <br><a class="btn btn-outline-primary" href="<?php echo URLROOT; ?>/customer/edit/<?php echo $cpf; ?>" role="button">Cancelar</a> 
        <button type="submit" class="btn btn-primary">Carregar</button> 
      </form>
    </div>
    </div>
</div>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script type="text/javascript" src="<?php echo URLROOT; ?>/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>