### Passo a passo
Clone Repositório
```sh
git clone https://github.com/JplsMura/api-ead.git my-project
cd my-project/
```


Crie o Arquivo .env
```sh
cd example-project/
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=EAD
APP_URL=http://localhost:8180

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker-compose exec laravel_8 bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```


Acesse o projeto
[http://localhost:8180](http://localhost:8180)


## **Erros que podem acontecer ao tentar cadastrar uma nova conexão no MYSQL WORKBEANCH:**

>Acesse ao Ubuntu Software, pesquise pelo Workbench, selecione Permissões e marque as opções que tenham Read.
>O outro erro é de SSL "ssl connection error" e resolve:
>Acesse a aba Advanced/Avançada (dentro das conexões), no campo Others/Outros coloque:
```sh
useSSL=0
```