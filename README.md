# Clientes Gestor

### Esse projeto faz parte dos meus estudos sobre programação e teste de software.

Software Web para cadastro de clientes. No seu desenvolvimento foi utlizado URL amigável usando PHP Orientado a Objetos, MVC, banco de dados Postgresql com PDO e CAPTCHA.

![Logo API](./img/tela_login.png)

![Logo API](./img/tela_cliente.png)

## Recursos usados no desenvolvimento:

- PHP 7.4;
- PostgreSQL 12;
- pgModeler 0.9.4;
- HTML;
- Bootstrap v4.6.0;
- jQuery v.3.5.1;
- Apache HTTP Server;
- DBeaver Community Edition;
- Git;
- Visual Studio Code;
- MVC;
- PlantUML;
- hCaptcha;

## Instalação:

Para começar, você deve simplesmente clonar o repositório do projeto na sua máquina, instalar os pre-requisitos, criar o banco de dados e configurar o arquivo database.php.

## Pre-requisitos:

Antes de instalar o projeto, você precisa já ter instalado na sua máquina:

- Apache;
- Ativar o módulo mod_rewrite do Apache;
- PHP;
- Ativar o módulo pgsql do PHP;
- PostgreSQL;

## Obtendo uma cópia:

```shell
# Antes de tudo, clone o projeto
$ git clone https://github.com/douglascarlos-dev/Clientes-Gestor
```

## Configuração:

```php
# Entre na pasta 'model' do projeto e crie um arquivo database.php
# com os dados de conexão do banco de dados PostgreSQL.
<?php
return [
    "host" => "localhost",
    "port" => "5432",
    "dbname" => "",
    "user" => "",
    "password" => "",
    "captcha_secret" => "0x0",
    "captcha_data-sitekey" => ""
];
?>

# Informe o nome da pasta em que o projeto está executando no arquivo index.php
# Exemplo:
define('ENDERECO', '/php-pdo-oop-clean-urls-postgresql'); // ou
define('ENDERECO', '/' . basename(__DIR__)); // ou
define('ENDERECO', '/douglas/' . basename(__DIR__)); // ou
define('ENDERECO', ''); //se executar no dirtorio root.

# Usuário e senha padrão do software: admin
```

## Modelagem do banco

A pasta pgmodeler contem a modelagem do banco usando o programa pgModeler 0.9.3, bem como uma imagem da modelagem e o arquivo sql de criação do banco.
É necessario estar instalado o módulo pgsql para php para uma correta comunicação.

![Logo API](./pgmodeler/database_model.png)

## Diagrama de classes

A pasta modelagem contem os diagramas de UML criados usando o programa PlantUML, permitindo identificar as classes, métodos, atores e interações utilizadas na execução do software.

![Class Diagram](./modelagem/Class_Diagram.png)