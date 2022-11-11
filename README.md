## Sistema de consulta de preço de ações

Sistema desenvolvido para realizar consulta no preço de ações do mercado financeiro com base na Api da [IEX](https://iexcloud.io).

## :computer: Tecnologias

- Linguagem: **[PHP](https://www.php.net/releases/8.1/en.php)**
- Banco de Dados: **[MySQL]()**
- Framework **[Laravel 9](https://laravel.com/)**
- Pacotes:
    - **[Sail](https://laravel.com/docs/9.x/sail)**
    - **[Livewire](https://laravel-livewire.com/)**
    - **[guzzlehttp](https://github.com/guzzle/guzzle)**


## :space_invader: Instalação

Para a instalação e rodar o projeto podemos fazer de dois jeitos:

1. Faça o clone do projeto na sua máquina;
2. Rode o comando `cp .env.example .env`;
3. No arquivo `.env` informe o Token da API da [IEX](https://iexcloud.io) no campo `IEX_API_TOKEN`

### Com Docker

1. Na pasta do projeto rode o comando `vendor/bin/sail up -d`;
2. Com isso o [Sail](https://laravel.com/docs/9.x/sail) (que roda o docker) vai instalar os containers da aplicação com os componentes necessários;
3. Após o docker estar rodando na sua máquina, você precisa aplicar as *migrations* no banco de dados através do comando `vendor/bin/sail artisan migrate`;
4. Rode o comando `npm install & npm run dev`;
5. Agora você pode acessar a aplicação através do seu navegador pela url: [http://localhost](http://localhost);
### Sem Docker

1. Na pasta do projeto rode o comando `composer install`;
2. Após o composer instalado, você precisa aplicar as *migrations* no banco de dados através do comando `php artisan migrate`;
3. Rode o comando `npm install & npm run dev`;
4. Rode o comando `php artisan serve`, pronto agora você pode acessar a aplicação através do seu navegador pela url: [http://localhost:8000](http://localhost:8000);

:warning: *Importante: Antes de rodar o docker, verifique se não esteja rodando outro projeto com o docker na sua máquina.* 

## :battery: Testes

Para rodar os testes da aplicação, siga os passos:

### Com Docker
1. Rode o comando `vendor/bin/sail artisan test`

### Sem Docker
1. Rode o comando `php artisan test`

## :dart: Tarefas

- [x] Configuração do ambiente
- [x] Criação das migrations & models
    - [x] `App/Models/StockPrice`
- [x] Criação dos Repositories & Interfaces
    - [x] `App/Repositories/BaseRepository`
    - [x] `App/Interfaces/BaseInterface`
    - [x] `App/Repositories/StockPriceRepository`
- [x] Criação dos Services
    - [x] `App/Models/StockPriceService`
- [x] Criação dos Resources
    - [x] `App/Http/Resources/StockPriceResource`
- [x] Criação dos Controllers & Functions
    - [x] `App/Http/Controllers/HomeController` (apenas index)
- [x] Criação das Routes
    - [x] raiz `/ `(name = home)
- [x] Criação das Views
    - [x] `resources/views/home.blade.php`
- [x] Criação dos Requests
    - [x] `App/Http/Requests/StockPriceRequest`
- [x] Instalação e Configuração do Livewire
    - [x] Component: `App/Http/Livewire/ShowStockPrice`
    - [x] Inserir o componente dentro da view `resources/views/home.blade.php`
- [x] Configuração das chamadas da Api da [IEX](https://iexcloud.io)
    - [x] `App/ExternalApis/Iex/IexExternalApi`
- [x] Implementação do frontend
- [x] Implementação do request e response da Api e registro no banco de dados junto com o retorno para o frontend o resultado buscado
- [x] Criação dos testes unitários
