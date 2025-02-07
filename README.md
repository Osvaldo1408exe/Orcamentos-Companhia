# Orcamentos-Companhia
O sistema tem como objetivo facilitar a administração dos orçamentos para os gestores de cada setor. Baseado em dados de planilhas de orçamentos, ele foi aprimorado com automatizações adicionais para otimizar o processo de gestão.

## Principais Funcionalidades
- Alteração da Situação do Orçamento: Permite alterar a situação atual do orçamento utilizando apenas o código do processo no Sistema Eletrônico de Informações (SEI).
- Verificação Automática da Situação: Caso o orçamento ainda não tenha sido entregue ao setor, ele será automaticamente marcado como **Atrasado**.
- Cálculo do Valor de Atraso: Soma o valor do desembolso mensal em um único campo, considerando a situação do orçamento e se ele está atrasado.
- Previsão de Desembolso no Ano: Calcula o total de valor a ser desembolsado no ano para cada orçamento, com base nos dados inseridos.
- Autenticação via LDAP: Implementa autenticação utilizando LDAP.
- Controle de Logs e Alterações: Registra todas as ações e alterações realizadas no sistema, garantindo a rastreabilidade e segurança das operações.

## Tecnologias
- HTML/CSS
- Javascript
- PHP
- Postgres

## Instalação e Configuração

### Rodar o Projeto

Clone o projeto

```bash
    git clone https://github.com/Osvaldo1408exe/Orcamentos-Companhia.git
```

Entre no diretório do projeto

```bash
    cd Orcamentos-Companhia
```

Inicie o servidor

```bash
    php -S localhost:3030
```
ou coloque em htdocs do seu servidor

#### Obs.: Inicie após configurar as variáveis

### Configurar as Variáveis

Para rodar esse projeto, é necessário configurar os arquivos `auth.php` e `database.php` em config.


##

![Logo](/public/imgs/logo.png)




