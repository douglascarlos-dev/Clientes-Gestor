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
        #main_area {
            margin-top: 50px;
        }
    </style>
  </head>
  <body>
  <?php require_once 'menu.php'; ?>




<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center col-md-8 order-md-1">

<div class="alert alert-danger d-none" role="alert" id="myDIV">Certifique-se de que todos os campos estão preenchidos e tente novamente.</div>

    <div class="card">
        <div class="card-body">
            <form name="register" action="<?php echo URLROOT; ?>/clientes/cadastrar" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" id="inputNome" name="nome" maxlength="100">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail">E-mail</label>
                        <input type="text" class="form-control" id="inputEmail" name="email" maxlength="100">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCpf">CPF</label>
                        <input type="text" class="form-control" id="inputCpf" name="cpf" maxlength="11">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDataDeNascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="inputDataDeNascimento" name="data_de_nascimento">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputSexo">Sexo</label>
                        <select id="selectSexo" name='sexo' class="form-control">
                            <option value='Masculino' name='Masculino' selected>Masculino</option>
                            <option value='Feminino' name='Feminino'>Feminino</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEstadoCivil">Estado Civil</label>
                        <select id="inputEstadoCivil" name='estado_civil' class="form-control">
                            <option value='Solteiro' name='Solteiro' selected>Solteiro</option>
                            <option value='Casado' name='Casado'>Casado</option>
                            <option value='Divorciado' name='Divorciado'>Divorciado</option>
                            <option value='Viúvo' name='Viúvo'>Viúvo</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo URLROOT; ?>/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


    <script type="text/javascript">
    $(document).ready(function () {

        $('form[name="register"]').on("submit", function (e) {

            var username = $(this).find('input[name="nome"]');
            var useremail = $(this).find('input[name="email"]');
            var usercpf = $(this).find('input[name="cpf"]');
            var userdata_de_nascimento = $(this).find('input[name="data_de_nascimento"]');

            if ($.trim(username.val()) === "" || $.trim(useremail.val()) === "" || $.trim(usercpf.val()) === "" || $.trim(userdata_de_nascimento.val()) === "") {
                $("#myDIV").removeClass('d-none');
                e.preventDefault();
            } else {
                $("#myDIV").addClass('d-none');
            }
        });

    });
    </script>
</body>
</html>