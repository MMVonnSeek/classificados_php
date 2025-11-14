# Mini Classificados SENAI

![Material_do_Professor_Max](https://img.shields.io/badge/Material_do_Professor_Max-Oficial-4c1?logo=google-scholar&logoColor=white)

Sistema de classificados online desenvolvido em **PHP** e **MySQL**, com autenticação de usuários e gerenciamento de anúncios.
Este projeto foi elaborado por mim como atividade prática para meus alunos do curso de **Desenvolvimento Backend PHP** do SENAI, com o objetivo de aplicar conceitos de back-end, banco de dados e integração front-end.

---

## Funcionalidades

* Cadastro e login de usuários
* Criação, edição e exclusão de anúncios
* Visualização de anúncios por categoria ou por usuário
* Interface responsiva com **CSS personalizado**
* Controle de acesso às páginas protegidas via sessões

---

## Estrutura de Pastas

```
config/      -> Conexão e controle de acesso ao sistema
auth/        -> Cadastro, login e logout de usuários
anuncios/    -> CRUD de anúncios (criar, editar, excluir, listar)
assets/      -> Arquivos de estilo CSS e recursos visuais
header.php   -> Cabeçalho e menu de navegação
footer.php   -> Rodapé do sistema
index.php    -> Página inicial
```

---

## Tecnologias Utilizadas

* **PHP 8.x**
* **MySQL/MariaDB**
* **CSS**
* **Prepared Statements** (segurança nas consultas SQL)
* **Sessões PHP** (gerenciamento de usuários logados)

---

## Requisitos

* PHP >= 8.x
* MySQL ou MariaDB
* Servidor local (XAMPP, WAMP ou LAMP)
* Navegador moderno

---

## Como Executar

1. Clone este repositório:

   ```bash
   git clone https://github.com/seu-usuario/mini-classificados-senai.git
   ```

2. Crie o banco de dados `classificados_db`.

3. Importe as tabelas `usuarios`, `categorias` e `anuncios`.

4. Configure o arquivo `config/conexao.php` com seu usuário e senha do MySQL.

5. Inicie seu servidor local (Apache + MySQL).

6. Acesse o sistema no navegador via:

   ```
   http://localhost/mini-classificados-senai/index.php
   ```

---

## Objetivo Educacional

Este projeto foi desenvolvido como **atividade prática guiada**, permitindo que os alunos consolidem seus conhecimentos em:

* Estruturação de sistemas web com PHP
* Persistência de dados em MySQL
* Segurança básica com sessões e prepared statements
* Organização de projetos em pastas e módulos

---


---
