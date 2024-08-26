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

## Passo 2: Executando seeders

Para o melhor funcionamento da aplicação, é ideal executar as seeders para adicionar os registros necessários no banco de dados, como o usuário padrão e status das tasks.

```bash
docker exec -it app-app-1 php yii seed/all 
```
<br/>
Tudo pronto?
Basta acessar <a href="http://localhost:8000">http://localhost:8000</a>

Crie a sua conta e gerencie as suas tarefas de maneira simples e rápida.


## Passo 3: Executanto os testes

Para executar os testes, basta executar o comando abaixo:

```bash
docker exec -it app-app-1 php vendor/bin/codecept run
```

## Decisões
Para desenvolvimento mais rápido e manter uma boa usabilidade e design frontend, decidi manter o Bootstrap 5 instalado como pacote padrão no Yii2.

Realizei alterações no model e form de User, modificando *username*  para *email*, adicionado os campos *first_name* e *last_name*.

Além dos ajustes na página de Login, criei também uma página de cadastro, para que não possa por obrigatório utuilizar o usuário criado na seed.

Criei uma seed para alimentar o banco de dados com os dados que o projeto necessida, como por exemplo, o primeiro usuário e os status das tasks.

Separei a estrutura por *Services*, mantendo uma arquitetura fácil de entender e dar manutenção, desacoplando as regras de negócio das *Controllers*.

Todos os processo acima facilitaram a implementação da permissão, principalmente os services, para que as tasks sejam exibidas, cadastradas, alteradas e excluídas apenas pelo usuário autenticado, sendo assim, cada usuário tem controle apenas de suas tarefas.

<br/>
Eai, que tal você me falar o que achou desta ferramenta maneira que te ajudou a organizar suas tarefas de maneira simples?