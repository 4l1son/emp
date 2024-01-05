
## Sobre o Projeto

Projeto Laravel 10: gerenciamento de unidades, colaboradores e cargos.

## Tabelas
- Unidades, Colaboradores, Cargos, Cargo_Colaborador.

## População
- Mínimo 100 registros (Unidades e Colaboradores), 10 registros (Cargos).

## Cadastro
- Unidades: Nome Fantasia, Razão Social, CNPJ.
- Colaboradores: Vinculação a Unidade, Cargo.
- Desempenho: Nota de 0 a 10.

## Relatórios
1. Colaboradores: Nome, CPF, E-mail, Unidade, Cargo.
2. Total por Unidade: Nome Fantasia, Razão Social, CNPJ, Colaboradores.
3. Ranking: Melhores Avaliados (Nota, Nome, CPF, E-mail, Unidade, Cargo).

## Laravel 10
- Estrutura robusta e eficiente.
- Modelagem a implementação: banco de dados, funcionalidades, relatórios.

O Laravel é escolhido como framework, proporcionando uma estrutura eficiente e robusta para o desenvolvimento do sistema, desde a modelagem do banco de dados até a implementação de funcionalidades e relatórios.

## Tecnologias utilizadas
<p align="center">
  <a href="https://laravel.com" target="_blank">
 <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain-wordmark.svg" width="100" align="center" />  </a>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-plain-wordmark.svg" width="100" align="center">
</p>

## Endpoints da api

![image](https://github.com/4l1son/emp/assets/111581261/75c30725-be25-4cd5-b7a4-125136b0766c)

![image](https://github.com/4l1son/emp/assets/111581261/db222bf8-c762-4e69-add2-0370f1ee4ffc)


## Como rodar o projeto

## 1. Criação de Tabelas

- Crie migrações para cada tabela.

  ```bash
  php artisan migrate --path=database/migrations/2023_12_27_204925_create_unidades_tables.php
  php artisan migrate --path=database/migrations/2023_12_27_205035_create_cargos_tables.php
  php artisan migrate --path=database/migrations/2023_12_27_204805_create_colaboradores_tables.php
  php artisan migrate --path=database/migrations/2023_12_27_205243_create_cargo_colaborador_table.php
  ```

- Defina os esquemas de tabela em cada migração e execute as migrações.

## 2. Execulte o seeder


  ```bash
php artisan db:seed
  ```


## 3. Demais comandos



Para gerar a doc dos endpoint siga os seguintes comandos
 
  ```bash
php artisan l5-swagger:generate
  ```

e em seguida


  ```bash
 php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
  ```

E por fim execulte a api com

```bash
php artisan serve
  ```

Caso seja a primeira vez que esteja rodando o projeto execulte o seguinte comando

```bash
composer install
  ```

# Regra de Negócios

## 1. Cadastro e Gerenciamento de Unidades:
   - O sistema permite o cadastro de unidades com informações como nome fantasia, razão social e CNPJ.
   - Atualizações e exclusões de unidades são permitidas.
   - As unidades podem ser visualizadas em uma lista.

## 2. Cadastro e Gerenciamento de Colaboradores:
   - Colaboradores podem ser cadastrados, vinculando-os a uma unidade específica e atribuindo um cargo.
   - Atualizações e exclusões de colaboradores são permitidas.
   - Lista de colaboradores disponível para visualização.

## 3. Cadastro e Atualização de Desempenho:
   - É possível cadastrar e atualizar a nota de desempenho (de 0 a 10) de um colaborador.
   - O sistema valida a faixa de notas permitidas.

## 4. Relatórios:
   - **Relatório de Colaboradores:**
     - Apresenta Nome, CPF, E-mail, Unidade, Cargo de todos os colaboradores.
   - **Total de Colaboradores por Unidade:**
     - Exibe Nome Fantasia, Razão Social, CNPJ e o total de colaboradores em cada unidade.
   - **Ranking de Colaboradores Melhores Avaliados:**
     - Mostra Nome, CPF, E-mail, Unidade, Cargo, Nota de Desempenho, ordenados da maior nota para a menor.

## 5. Validações:
   - O sistema valida informações inseridas, como CPF, CNPJ e notas de desempenho.
   - Garante consistência nos dados, evitando duplicações e inconsistências.

<h1>Comandos para testar requisição</h1>

### Cargos

**Listar Todos os Cargos:**
```bash
curl http://127.0.0.1:8000/api/cargos
```


**Obter um Cargo Específico por ID:**


```bash
curl http://127.0.0.1:8000/api/cargos/1
```
Criar um Novo Cargo:

```bash

curl -X POST http://127.0.0.1:8000/api/cargos \
-H "Content-Type: application/json" \
-d '{"cargo": "Cargo Novo"}'

```
Atualizar um Cargo Específico por ID:

```bash

curl -X PUT http://127.0.0.1:8000/api/cargos/3 -H "Content-Type: application/json" -d '{"cargo": "Novo Cargo Atualizado"}'
```

Excluir um Cargo Específico por ID:

```bash

curl -X DELETE http://127.0.0.1:8000/api/cargos/10
```

Cargo_Colaborador

Atualizar uma Associação Cargo_Colaborador Específica por ID:

```bash

curl -X PUT http://127.0.0.1:8000/api/cargo-colaborador/1 \
-H "Content-Type: application/json" \
-d '{"colaborador_id": 1, "cargo_id": 2, "nota_desempenho":2}'
```

Excluir uma Associação Cargo_Colaborador Específica por ID:

```bash

curl -X DELETE http://127.0.0.1:8000/api/cargo-colaborador/1
```

Listar unidades

Listar Todas as Unidades:

```bash

curl http://127.0.0.1:8000/api/unidades
```

Obter uma Unidade Específica por ID:

```bash

curl http://127.0.0.1:8000/api/unidades/1
```

Criar uma Nova Unidade:

```bash

curl -X POST http://127.0.0.1:8000/api/unidades \
-H "Content-Type: application/json" \
-d '{"nome_fantasia": "Minha Unidade", "razao_social": "Razao Social", "cnpj": "12345678901234"}'
```

Atualizar uma Unidade Específica por ID:

```bash

curl -X PUT http://127.0.0.1:8000/api/unidades/1 \
-H "Content-Type: application/json" \
-d '{"nome_fantasia": "Nova Fantasia", "razao_social": "Nova Razao Social", "cnpj": "98765432109876"}'
```
Excluir uma Unidade Específica por ID:

```bash

curl -X DELETE http://127.0.0.1:8000/api/unidades/1
```
Colaboradores

Listar Todos os Colaboradores:

```bash

curl http://127.0.0.1:8000/api/colaboradores
```
Obter um Colaborador Específico por ID:

```bash

curl http://127.0.0.1:8000/api/colaboradores/1
```
Criar um Novo Colaborador:

```bash

curl -X POST http://127.0.0.1:8000/api/colaboradores \
-H "Content-Type: application/json" \
-d '{"unidade_id": 1, "nome": "Nome Colaborador", "cpf": "12345678901", "email": "colaborador@example.com"}'
```
Atualizar um Colaborador Específico por ID:

```bash

curl -X PUT http://127.0.0.1:8000/api/colaboradores/4 -H "Content-Type: application/json" -d '{"unidade_id": 1, "nome": "Novo Nome Colaborador", "cpf": "98765432109", "email": "novo_colaborador@example.com", "nota_desempenho": 8}'

```
