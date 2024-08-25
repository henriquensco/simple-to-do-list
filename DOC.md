# Instalação do Simple To-Do List

Este guia fornece um passo a passo para configurar um ambiente Yii2 utilizando Docker Compose.

Vamos lá, é muito simples!

## Pré-requisitos

- Docker instalado
- Docker Compose instalado

## Passo 1: Clone o repositório do projeto

```bash
git clone git@github.com:henriquensco/simple-to-do-list.git

cd simple-to-do-list
```

## Passo 2: Configuração do Ambiente

Com o docker instalado, execute os seguintes comandos:

```bash
cd simple-to-do-list

docker-compose up -d

docker exec -it app-app-1 composer install

docker exec -it app-app-1 php yii migrate
docker exec -it app-app-1 php yii migrate/up
```

Tudo pronto?
Basta acessar http://localhost:8000

Crie a sua conta e gerencie as suas tarefas de maneira simples e rápida.


## Passo 3: Executanto os testes

Para executar os testes, basta executar o comando abaixo:

```bash
docker exec -it app-app-1 php vendor/bin/codecept run
```