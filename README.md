# COVID19_Tracker
Projeto Web para rastreamento de mortes e casos confirmados por COVID-19 em diferentes estados e países.

Feito para um teste técnico para um processo seletivo, recebe os dados dos países de uma API feita especificamente para esse teste técnico (o projeto pode ou não funcionar após o tempo de avaliação, devido à ele utilizar uma API feita pela empresa avaliadora). Podem ser mostrados os dados de um unico país em tela ou podendo comparar a diferenca entre dois paises diferentes.   

---

## Instruções para Configurar o Projeto para Rodar Localmente

### Requisitos

###### PHP 8.2^
###### Composer
###### MySQL




### Passo 1: Instalar dependências do Composer

Abra o terminal na pasta principal do projeto e execute o seguinte comando  para instalar as dependencias do composer:

    composer install -o

### Passo 2: Configurar o arquivo .env 

Abra o arquivo `.env` com um editor de texto de sua escolha e altere os seguites parametros com as configurações do seu banco de dados:

`DB_USERNAME` - Usuário do banco de dados.

`DB_PASSWORD` - Senha do banco de dados.

>[!WARNING]
>Altere ***somente*** esses dois parâmetros, a não ser que deseje alterar o ip do servidor (`DB_HOST`) ou o banco de dados (`DB_DATABASE`)

### Passo 3: Executar o arquivo dump.sql

Execute o arquivo `dump-covid19_tracker-202404071850.sql` em seu gerenciador de banco de dados (MySQL) para configurar a estrutura inicial do projeto.

### Passo 4: Visualização do projeto

Para visualizar o projeto localmente de forma simples e rápida utilizando apenas os programas listados nos requisitos, abra o terminal na pasta principal do projeto e execute o seguinte comando:

    php -S localhost:8000

Em seguida, em seu navegador, entre na página http://localhost:8000.

Ou então, caso prefira, execute o projeto em um servidor web local de sua escolha.



