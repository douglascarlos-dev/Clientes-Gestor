# Clientes Gestor

Software Web para cadastro de clientes com URL amigavel usando PHP Orientado a Objetos com banco de dados Postgresql com PDO

## Recursos usados no desenvolvimento:

- PHP;
- PostgreSQL;
- pgModeler;
- HTML;
- Bootstrap;
- Apache HTTP Server;


## Instalação:

Para começar, você deve simplesmente clonar o repositório do projeto na sua máquina, instalar os pre-requisitos, criar o banco de dados e configurar o arquivos database.ini.

### Pre-requisitos:

Antes de instalar o projeto, você precisa já ter instalado na sua máquina:

- Apache:
- PHP:
- PostgreSQL:

### Obtendo uma cópia:

```shell
# Antes de tudo, clone o projeto
$ git clone https://github.com/douglascarlos-dev/Clientes-Getor
```

### Configuração:

```php
# Entre na pasta model do projeto e crie um arquivo database.ini
# com os dados de conexão do banco de dados PostgreSQL
host=
port=5432
dbname=
user=
password=

# Informe o nome da pasta em que o projeto está executando no arquivo index.php
# Exemplo:
define('ENDERECO', '/php-pdo-oop-clean-urls-postgresql'); //ou
define('ENDERECO', ''); //se executar no dirtorio root.
```

### Modelagem do banco

A pasta pgmodeler contem a modelagem do banco usando o programa pgModeler 0.9.3, bem como uma imagem da modelagem e o arquivo sql de criação do banco.

![Logo API](./pgmodeler/database_model.png)