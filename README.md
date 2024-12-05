# Currículo Inteligente

O **Currículo Inteligente** é uma aplicação inovadora que utiliza inteligência artificial para otimizar processos seletivos. Com ela, candidatos podem enviar seus currículos diretamente para uma vaga específica, enquanto o sistema analisa e classifica os dados utilizando a API da OpenAI, retornando um percentual de compatibilidade para ajudar os recrutadores na triagem.

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
