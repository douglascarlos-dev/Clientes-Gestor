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
            <form action="../../clientes/cadastrar" method="post">
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>