
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
  php artisan make:migration create_unidades_table
  php artisan make:migration create_colaboradores_table
  php artisan make:migration create_cargos_table
  php artisan make:migration create_cargo_colaborador_table
  ```

- Defina os esquemas de tabela em cada migração e execute as migrações.

## 2. Criação de Seeders

  ```bash
php artisan make:seeder UnidadesTableSeeder
php artisan make:seeder ColaboradoresTableSeeder
php artisan make:seeder CargosTableSeeder
php artisan make:seeder CargoColaboradorTableSeeder
  ```

## Execulte o seeder


  ```bash
php artisan db:seed
  ```

E por fim execulte a api com

```bash
php artisan serve
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
