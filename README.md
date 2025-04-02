# CRUD de Barcos em PHP com MySQL e Bootstrap

## 📌 Sobre o Projeto
Este projeto é um CRUD (Create, Read, Update, Delete) desenvolvido em **PHP** com **MySQL** para gerenciar registros de barcos, ele foi feito para fins de estudo. A aplicação conta com uma interface estilizada com **Bootstrap** e possui as seguintes funcionalidades:

- Adicionar um novo barco
- Listar todos os barcos cadastrados
- Pesquisar barcos
- Editar informações de um barco
- Excluir barcos

## 🚀 Tecnologias Utilizadas
- **PHP** (Manipulação de dados e lógica backend)
- **MySQL** (Banco de dados relacional para armazenar os barcos)
- **Bootstrap** (Estilização e responsividade)
- **PDO** (Interface de acesso ao banco de dados)

## ⚙️ Estrutura do Projeto
```
📂 crud-barcos-php
│── index.php            # Página inicial com opções para acessar as funções do CRUD
│── adicionar_barco.php  # Formulário para adicionar um novo barco
│── listar_barcos.php    # Página para listar e pesquisar barcos
│── editar_barco.php     # Página para editar um barco
│── excluir_barco.php    # Script para excluir um barco
│── Database.php         # Classe de conexão e manipulação do banco de dados
│── README.md            # Documentação do projeto
```

## 📌 Como Executar o Projeto
### 🔹 Pré-requisitos
Antes de rodar a aplicação, você precisa ter instalado:
- **PHP** (versão 7.4 ou superior)
- **MySQL** (ou MariaDB)
- **Servidor local** (XAMPP (utilizei esse), WAMP, ou similar)

### 🔹 Passo a passo
1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/crud-barcos-php.git
   ```
2. Importe o banco de dados (**provap1**) utilizando o arquivo **banco.sql**
3. Configure a conexão no arquivo `Database.php` caso necessário

## 📌 Funcionalidades
### 🔹 1. Adicionar Barco
- Preencha um formulário com **modelo, fabricante, opcionais e cor**.
- Clique em "Adicionar" para salvar no banco de dados.

### 🔹 2. Listar Barcos
- Exibe todos os barcos cadastrados.
- Possui uma **barra de pesquisa** para localizar barcos específicos.

### 🔹 3. Editar Barco
- Clique em "Editar" para modificar os dados de um barco.

### 🔹 4. Excluir Barco
- Clique em "Excluir" para remover permanentemente um barco.

## 📌 Contato
📧 Email: vitorhugobsimao@gmail.com  
🔗 GitHub: [github.com/VitorHugoBelorio](https://github.com/VitorHugoBelorio)

