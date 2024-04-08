# Projeto Open Food Facts REST API

# Descrição

Este projeto consiste no desenvolvimento de uma REST API para utilizar os dados do projeto Open Food Facts, um banco de dados aberto contendo informações nutricionais de diversos produtos alimentícios.

>  This is a challenge by [Coodesh](https://coodesh.com/)

# Tecnologias utilizadas

* Linguagem de Programação: PHP
* Framework: Laravel (utilizando Laravel Sail)
* Banco de Dados: MySQL
* Ferramentas de Teste: PHPUnit
* Ambiente de Desenvolvimento: Docker

# Instalação e Uso do Projeto

Clone este repositório para o seu ambiente local.
Certifique-se de ter o Docker instalado em sua máquina.
No terminal, navegue até o diretório do projeto clonado.
Execute o seguinte comando para iniciar o ambiente de desenvolvimento:

# Como instalar e usar o projeto (instruções)

## Instalação e Execução

### Para instalar e executar o projeto, siga as seguintes etapas:

1. Clone o projeto em seu ambiente local:
```bash
gh repo clone lesCoder/OpenFoodFacts
```
2. Certifique-se de que você tem o Docker instalado em sua máquina.
3. Na raiz do projeto, crie o arquivo .env a partir do arquivo .env.example:
```bash
cp .env.example .env
```
4. Se você tem dados específicos de conexão é necessário modificar no .env que foi criado, caso contrário o passo 6 irá criar o banco com as credenciais já presentes que foram copiadas do .env.exemple .
5. Na raiz do projeto, execute o seguinte comando para baixar as dependências do projeto:
```bash
composer install
```
6. Na raiz do projeto, execute o seguinte comando para iniciar o projeto:
```bash
./vendor/bin/sail up -d
```
7. Na raiz do projeto, execute o seguinte comando para criar a base de dados:
```bash
./vendor/bin/sail artisan migrate
```
8. (OPICIONAL) Caso ocorra algum erro relacionado a crendenciais no passo anterior ou se o comando 6 foi rodado sem que o arquivo .env esteja presente; tenha certeza que o arquivo .env existe na raiz do projeto com a extenção correta e rode o seguinte comando:
```bash
./vendor/bin/sail build --no-cache
```

### Sistema de filas
No projeto, foi utilizado o sistema de filas do Laravel.

Execute o seguinte comando para iniciar o sistema de filas:
```bash
./vendor/bin/sail artisan queue:work
```
Em outro terminal, simultaneamente, rode o comando abaixo para que elas sejam processadas no seu ambiente local:
```bash
./vendor/bin/sail artisan schedule:list
```

### Sistema cron
Foi definido o horário das 3h da manhã como o melhor horário para execução do cron. No entanto, caso você queira testar a execução do cron em outro horário, basta acessar o arquivo app/Console/Kernel.php e alterar a função dailyAt() para everyMinute(). Dessa forma, o cron será executado a cada minuto, permitindo que você teste a funcionalidade de forma mais rápida e eficiente.

Execute o seguinte comando para iniciar o cron schedule:
```bash
./vendor/bin/sail artisan schedule:work
```

### Testes unitários
Execute o seguinte comando para iniciar os testes:
```bash
./vendor/bin/sail artisan test
```

### Endpoints
Dados da última conexão.
```bash
GET /
```
Atualizações do Projeto Web.
```bash
PUT /products/:code 
```
Altera o status do produto para trash.
```bash
DELETE /products/:code
```
Retorna os dados de somente um produto da base de dados.
```bash
GET /products/:code
```
Listar todos os produtos.
```bash
GET /products
```

### Problemas Conhecidos
Podem existir erros causados por permissão de leitura e escrita a depender de como esta configurado o seu ambiente de desenvolvimento (linux nativo, WSL2, etc), caso algo desta forma ocorra, os comandos listados podem ser rodados diretamente dentro do container (a partir passo 6 do tópico de instalação), porém os comandos neste caso são os comuns do Laravel, por exemplo:
```bash
php artisan schedule:list
php artisan schedule:work
php artisan test
```

>  This is a challenge by [Coodesh](https://coodesh.com/)