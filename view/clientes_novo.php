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
        #main_area {
            margin-top: 50px;
        }
    </style>
  </head>
  <body>
  <?php require_once 'menu.php'; ?>




<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center col-md-8 order-md-1">

<div id="formAlert" class="alert alert-warning hide">  
    <a class="close">×</a>  
    <strong>Alerta!</strong> Certifique-se de que todos os campos estão preenchidos e tente novamente.
</div>

    <div class="card">
        <div class="card-body">
            <form name="register" action="../../clientes/cadastrar" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" id="inputNome" name="nome" maxlength="100">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">E-mail</label>
                        <input type="text" class="form-control" id="inputPassword4" name="email" maxlength="100">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNome">CPF</label>
                        <input type="text" class="form-control" id="inputNome" name="cpf" maxlength="11">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Data de Nascimento</label>
                        <input type="date" class="form-control" id="inputPassword4" name="data_de_nascimento">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNome">Sexo</label>
                        <select name=sexo class="form-control">
                            <option value='Masculino' selected>Masculino</option>
                            <option value='Feminino'>Feminino</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNome">Estado Civil</label>
                        <select name=estado_civil class="form-control">
                            <option value=Solteiro selected>Solteiro</option>
                            <option value=Casado>Casado</option>
                            <option value=Divorciado>Divorciado</option>
                            <option value=Viúvo>Viúvo</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

<script
    type="text/javascript"
    src="//code.jquery.com/jquery-1.10.1.js"
    
  ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<script type="text/javascript">

    
$(document).ready(function () {
    // Run this code only when the DOM (all elements) are ready

    $("#formAlert").slideUp(400, function (){});
    $('form[name="register"]').on("submit", function (e) {
        // Find all <form>s with the name "register", and bind a "submit" event handler
        
        // Find the <input /> element with the name "username"
        var username = $(this).find('input[name="nome"]');
        if ($.trim(username.val()) === "") {
            // If its value is empty
            e.preventDefault();    // Stop the form from submitting
            $("#formAlert").slideDown(400);    // Show the Alert
        } else {
            $("#formAlert").slideUp(400, function () {    // Hide the Alert (if visible)
            });
        }

        var useremail = $(this).find('input[name="email"]');
        if ($.trim(useremail.val()) === "") {
            // If its value is empty
            e.preventDefault();    // Stop the form from submitting
            $("#formAlert").slideDown(400);    // Show the Alert
        } else {
            $("#formAlert").slideUp(400, function () {    // Hide the Alert (if visible)
            });
        }

        var usercpf = $(this).find('input[name="cpf"]');
        if ($.trim(usercpf.val()) === "") {
            // If its value is empty
            e.preventDefault();    // Stop the form from submitting
            $("#formAlert").slideDown(400);    // Show the Alert
        } else {
            $("#formAlert").slideUp(400, function () {    // Hide the Alert (if visible)
            });
        }

        var userdata_de_nascimento = $(this).find('input[name="data_de_nascimento"]');
        if ($.trim(userdata_de_nascimento.val()) === "") {
            // If its value is empty
            e.preventDefault();    // Stop the form from submitting
            $("#formAlert").slideDown(400);    // Show the Alert
        } else {
            $("#formAlert").slideUp(400, function () {    // Hide the Alert (if visible)
            });
        }
    });
    
    $(".alert").find(".close").on("click", function (e) {
        // Find all elements with the "alert" class, get all descendant elements with the class "close", and bind a "click" event handler
        e.stopPropagation();    // Don't allow the click to bubble up the DOM
        e.preventDefault();    // Don't let any default functionality occur (in case it's a link)
        $(this).closest(".alert").slideUp(400);    // Hide this specific Alert
    });
});
</script>
</body>
</html>