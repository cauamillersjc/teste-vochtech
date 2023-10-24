
# Teste VochTech

Teste técnico para desenvolvedor júnior Laravel.

## Requisitos (Utilizando Laravel 7/8)

1. Crie as seguintes tabelas:

    Unidades – id, nome_fantasia, razao_social, cnpj

    Colaboradores – id, unidade_id, nome, cpf, email

    Cargos – id, cargo

    Cargo_Colaborador – id, cargo_id, colaborador_id, nota_desempenho (nota_desempenho de 0 a 10)

2. Popule as tabelas acima com no mínimo 100 registros cada, exceto a tabela Cargos que deve conter no mínimo 10 registros.

3. Desenvolva um cadastro de Unidades.

4. Desenvolva um cadastro de Colaboradores, vinculando o cargo e unidade a ele.

5. Desenvolva um cadastro/update de desempenho do colaborador.

6. Desenvolva os seguintes relatórios:

    Relatório de Colaboradores: Nome, CPF, E-mail, Unidade, Cargo

    Total de Colaboradores por Unidade: Nome Fantasia, Razão Social, CNPJ, Total de Colaboradores
    
    Ranking de Colaboradores melhores avaliados (da maior nota a menor): Nome, CPF, Email, Unidade, Cargo, Nota de Desempenho


## Diagrama do Banco
![Diagrama Banco](https://i.ibb.co/HDhNtnq/Teste-Voch-Tech.png)


## Requisitos para executar o projeto

PHP 8.2.11

Composer 2.6.5

MySQL
## Rodando o projeto

Baixe o projeto e instale as dependências com o Composer
```
git clone https://github.com/cauamillersjc/teste-vochtech.git
cd teste-vochtech
composer install
cp .env.example .env
php artisan key:generate
```

Crie o banco de dados no seu MySQL de acordo com o seu .env

Em seguida rode as migrations e depois os seeders.
```
  php artisan migrate

  php artisan db:seed --class=UnidadeSeeder
  php artisan db:seed --class=CargoSeeder
  php artisan db:seed --class=ColaboradorSeeder
  php artisan db:seed --class=CargoColaboradorSeeder
```

Agora é só executar o projeto.

`php artisan serve`


