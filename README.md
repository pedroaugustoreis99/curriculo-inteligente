# Currículo Inteligente

O **Currículo Inteligente** é uma aplicação inovadora que utiliza inteligência artificial para otimizar processos seletivos. Com ela, candidatos podem enviar seus currículos diretamente para uma vaga específica, enquanto o sistema analisa e classifica os dados utilizando a API da OpenAI, retornando um percentual de compatibilidade para ajudar os recrutadores na triagem.

**Confira o vídeo de apresentação do projeto no Youtube:**

[![YouTube](https://img.shields.io/badge/YouTube-FF0000?style=for-the-badge&logo=youtube&logoColor=white)](https://youtu.be/DzCib6WRFjU)

<a href="https://youtu.be/DzCib6WRFjU" target="_blank">Sistema de Recrutamento com Inteligência Artificial: Como Funciona o Currículo Inteligente?</a>

---

## Requisitos

Certifique-se de que seu ambiente atenda aos seguintes requisitos mínimos:

- **PHP**: Versão 8.3.6 ou superior (desenvolvido e testado com esta versão).
- **Servidor Web**: Pode ser utilizado o servidor web embutido do PHP via CLI.
- **Banco de Dados**: MySQL (ou MariaDB).
- **Composer**: Gerenciador de dependências PHP (versão 2.7.6 utilizada no desenvolvimento).
- **Biblioteca cURL**: Necessária para chamadas à API da OpenAI.

---

## Instalação e Configuração do Ambiente

### 1. Banco de Dados

1. Crie um banco de dados no MySQL ou MariaDB.
2. Importe o arquivo `database.sql` localizado na raiz do projeto para criar a estrutura necessária:

```bash
mysql -u usuario -p nome_do_banco < database.sql
```

### 2. Configuração do Sistema

Edite o arquivo `app/config.php` e preencha as seguintes constantes com as informações do seu ambiente:

```php
<?php
// Configurações do banco de dados
define('DB_HOST', 'localhost'); // Host do banco de dados
define('DB_NAME', 'nome_do_banco'); // Nome do banco de dados
define('DB_USER', 'usuario'); // Usuário do banco de dados
define('DB_PASS', 'senha'); // Senha do banco de dados

// Chave da API da OpenAI
define('KEY_API_CHATGPT', 'sua-chave-api'); // Insira sua chave da API da OpenAI
?>
```

## Executando a Aplicação

Após configurar o ambiente, siga as etapas abaixo para executar o sistema:

1. Abra o terminal na raiz do projeto.
2. Execute o servidor embutido do PHP com o seguinte comando:

```bash
php -S localhost:8000
```

3. Acesse a aplicação no navegador utilizando o endereço:
**URL da aplicação:** `http://localhost:8000`
