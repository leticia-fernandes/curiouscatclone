# Curiouscatclone



## Requisitos

- PHP 7.1
- PostgreSQL
- Composer
- Laravel 5.7



## Clonando o projeto

```bash
git clone https://github.com/leticia-fernandes/curiouscatclone.git

cd curiouscatclone
```



## Instalando app 

```bash
composer install
```



## Criando banco de dados

No seu server local do PostgreSQL crie um novo banco de dados `curiouscatclone` . Pode ser acessado pelo pgAdmin.

```sql
CREATE DATABASE curiouscatclone
```



## Configurando o app

Crie uma copia do arquivo `.env.example` 

Renomeie essa copia para `.env`

### Configurando a conexão com o Banco de Dados

Altere o arquivo `.env` com os seus dados locais 

```config
...
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=curiouscatclone
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
...
```

### Configurando o App

Altere o arquivo `.env` com os dados do seu app

```
APP_NAME=CuriousCatClone
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
```



## Gerando uma chave para a aplicação

Dentro da pasta do projeto `/curiouscatclone`  execute o comando

```bash
php artisan key:generate
```



## Executando as migrations

Com a conexão com o banco configurada, e a base de dados criada, são executadas as migrations com o comando

```bash
php artisan migrate
```



## Executando a aplicação

Para rodar a aplicação basta executar

```bash
php artisan serve
```



## Pronto!

Aplicação rodando no seu localhost http://localhost:8000/

# Screenshots

<p align="center">
    <img alt="Logo" src="https://i.imgur.com/YzLYUNL.png" width="600px">
</p>






