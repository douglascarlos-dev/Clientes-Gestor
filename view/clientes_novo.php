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
<div class="alert alert-danger d-none" role="alert" id="divNome">O campo Nome deve ter no mínimo 10 caracteres.</div>
<div class="alert alert-danger d-none" role="alert" id="divEmail">O campo E-mail deve ter no mínimo 10 caracteres.</div>
<div class="alert alert-danger d-none" role="alert" id="divCpf">Verifique o campo CPF.</div>
<div class="alert alert-danger d-none" role="alert" id="divData">Verifique o campo Data de Nascimento.</div>

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
                        <input type="text" class="form-control" id="inputCpf" name="cpf" maxlength="14" data-mask="000.000.000-00">
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
<script type="text/javascript" src="<?php echo URLROOT; ?>/js/jquery.mask.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(document).ready(function () {

        $('form[name="register"]').on("submit", function (e) {

            var username = $(this).find('input[name="nome"]');
            var useremail = $(this).find('input[name="email"]');
            var usercpf = $(this).find('input[name="cpf"]');
            var cpf = $('input[name="cpf"]').val().replace(/[^0-9]/g, '').toString();
            var userdata_de_nascimento = $(this).find('input[name="data_de_nascimento"]');

            if ($.trim(username.val()) === "" || $.trim(useremail.val()) === "" || $.trim(usercpf.val()) === "" || $.trim(userdata_de_nascimento.val()) === "") {
                $("#myDIV").removeClass('d-none');
                e.preventDefault();
            } else {
                $("#myDIV").addClass('d-none');
            }

            if ($.trim(username.val().length) <= 10) {
                $("#divNome").removeClass('d-none');
                e.preventDefault();
            } else {
                $("#divNome").addClass('d-none');
            }

            if ($.trim(useremail.val().length) <= 10) {
                $("#divEmail").removeClass('d-none');
                e.preventDefault();
            } else {
                $("#divEmail").addClass('d-none');
            }

            if( cpf.length == 11 && $.trim(usercpf.val().length) == 14 && $.trim(usercpf.val()) != "000.000.000-00" && $.trim(usercpf.val()) != "111.111.111-11" && $.trim(usercpf.val()) != "222.222.222-22" && $.trim(usercpf.val()) != "333.333.333-33" && $.trim(usercpf.val()) != "444.444.444-44" && $.trim(usercpf.val()) != "555.555.555-55" && $.trim(usercpf.val()) != "666.666.666-66" && $.trim(usercpf.val()) != "777.777.777-77" && $.trim(usercpf.val()) != "888.888.888-88" && $.trim(usercpf.val()) != "999.999.999-99")
            {
                var v = [];

                //Calcula o primeiro dígito de verificação.
                v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
                v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
                v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
                v[0] = v[0] % 11;
                v[0] = v[0] % 10;

                //Calcula o segundo dígito de verificação.
                v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
                v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
                v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
                v[1] = v[1] % 11;
                v[1] = v[1] % 10;

                //Retorna Verdadeiro se os dígitos de verificação são os esperados.
                if ( (v[0] != cpf[9]) || (v[1] != cpf[10]) )
                {
                    $("#divCpf").removeClass('d-none');
                    e.preventDefault();
                } else {
                    $("#divCpf").addClass('d-none');
                }
            }
            else
            {
                $("#divCpf").removeClass('d-none');
                e.preventDefault();
            }

            if ($.trim(userdata_de_nascimento.val()) > new Date().toJSON().substring(0,10) || $.trim(userdata_de_nascimento.val()) === "") {
                $("#divData").removeClass('d-none');
                e.preventDefault();
            } else {
                $("#divData").addClass('d-none');
            }
        });

    });
    </script>
</body>
</html>