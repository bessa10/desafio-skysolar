# Instalação e configuração

O arquivo principal de configuração está na raiz de cada projeto

api/.env
cadastro/.env

Caso estiver usando virtual host no servidor, precisa alterar a base url

Arquivo do banco de dados está na pasta desafio-skysolar/sql/database.sql

As configurações de host, username, password e database estão no arquivo .env

Caso quiser testar a api usando o postman, estou deixando a collection na raiz


# Desafio Programador Sky Solar

Este desafio consiste no desenvolvimento de um pequeno sistema para demonstrar seus conhecimentos na linguagem PHP.

Realize um fork deste projeto em seu github e desenvolva o projeto utilizando o [Gitflow](https://www.atlassian.com/br/git/tutorials/comparing-workflows/gitflow-workflow) para estruturar seu projeto com branchs main, develop e features para organizar melhor o fluxo de desenvolvimento do sistema.

Requisitos:
- Será necessário desenvolver duas aplicações em linguagem PHP sendo um voltada ao frontend e outra ao backend.
- Utilizar um design básico nas telas de frontend com o bootstrap simples.
- Será verificado também o uso do git, tanto na montagem das branchs como nas descrições dos commits.
- Criar um arquivo de markdown (.md) descrevendo o processo de instalação e configuração das duas aplicações.

## Aplicação 01 - Backend

- A aplicação precisa ser estruturada como se fosse uma API recebendo as reguisições HTTP POST/GET/PUT/DELETE.
- Os dados recebidos e enviados desta API precisarão ser em formato JSON.  
- A aplicação precisará inserir os dados em uma tabela de pessoa no banco de dados MySql.
- Criar uma pasta com os scripts de criação do banco de dados.

Dados da Pessoa
- Nome completo
- RG, CPF
- Data de nascimento
- Endereço Completo
  - CEP
  - Logradouro completo
  - Bairro
  - Cidade
  - Estado

## Aplicação 02 - Frontend

A aplicação precisa fazer requisições na api desenvolvida de backend com as seguintes telas:
- Listagem de pessoas cadastradas com opção para alterar e remover a pessoa cadastrada
- Formulário de cadastro de pessoa
- Formulário de alteração de pessoa

Com relação aos frameworks, utilizar:
- [Bootstrap versão 4.6](https://getbootstrap.com/docs/4.6/getting-started/introduction/)
- [Jquery versão 3](https://jquery.com/download/)
