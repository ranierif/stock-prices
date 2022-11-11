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
3. Na pasta do projeto rode o comando `/vendor/bin/sail up -d`;
4. Com isso o [Sail](https://laravel.com/docs/9.x/sail) (que roda o docker) vai instalar os containers da aplicação com os componentes necessários;
5. Após o docker estar rodando na sua máquina, você precisa aplicar as *migrations* no banco de dados através do comando `vendor/bin/sail artisan migrate`;
6. Com as *migrations* aplicadas, você poderá acessar a aplicação através do seu navegador pela url: [http://localhost](http://localhost);
7. Rode o comando `npm install & npm run dev`;

:warning: *Importante: Antes de rodar o docker, verifique se não esteja rodando outro projeto com o docker na sua máquina.* 

## :dart: Tarefas

- [x] Configuração do ambiente
- [x] Criação das migrations & models
    - [x] `App/Models/StockPrice`
- [x] Criação dos Repositories & Interfaces
    - [x] `App/Repositories/BaseRepository`
    - [x] `App/Interfaces/BaseInterface`
- [ ] Criação dos Services
    - [ ] `App/Models/StockPriceService`
- [ ] Criação dos Resources
    - [ ] `App/Http/Resources/Stock/StockPriceResource`
- [ ] Criação dos Controllers & Functions
    - [ ] `App/Http/Controllers/HomeController` (apenas index)
- [ ] Criação das Routes
    - [ ] raiz `/ `(name = home)
- [ ] Criação das Views
    - [ ] `resources/views/home.blade.php`
- [ ] Criação dos Requests
    - [ ] `App/Http/Requests/StockPriceRequest`
- [ ] Instalação e Configuração do Livewire
    - [ ] Component: `App/Http/Livewire/GetStockPrice`
    - [ ] Inserir o componente dentro da view `resources/views/home.blade.php`
- [ ] Configuração das chamadas da Api da [IEX](https://iexcloud.io)
    - [ ] `App/ExternalApis/Iex/IexExternalApi`
- [ ] Implementação do frontend
- [ ] Implementação do request e response da Api e registro no banco de dados junto com o retorno para o frontend o resultado buscado
