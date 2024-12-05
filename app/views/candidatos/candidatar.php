<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body, h1, h2, p, label, input, select, textarea, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }

        /* Container principal */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #037ec6;
            margin-bottom: 20px;
        }

        .vaga-detalhes {
            margin-bottom: 30px;
        }

        .vaga-detalhes h2 {
            color: #005f9a;
            margin-bottom: 10px;
        }

        .vaga-detalhes p {
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .form-container {
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #037ec6;
            outline: none;
            box-shadow: 0 0 5px rgba(3, 126, 198, 0.5);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 20px;
            background-color: #037ec6;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #005f9a;
            transform: scale(1.05);
        }

        button:active {
            transform: scale(0.95);
        }

        .icon {
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="container">
        <div style="text-align: center;">
            <img src="/public/assets/logo2.png" height="150px">       
        </div>
        
        <h1>Currículo Inteligente</h1>
        <div class="vaga-detalhes">
            <h2>Detalhes da Vaga</h2>
            <p><strong><i class="bi bi-tag">Título:</i></strong> <?= $vaga->titulo ?></p>
            <p><strong><i class="bi bi-card-text"> Descrição:</i></strong> <?= $vaga->descricao ?></p>
            <p><strong><i class="bi bi-list-check"> Requisitos:</i></strong> <?= $vaga->requisitos ?></p>
            <p><strong><i class="bi bi-cash-stack"> Salário:</i></strong> R$<?= $vaga->salario ?></p>
            <p><strong><i class="bi bi-geo-alt"> Localização:</i></strong> <?= $vaga->localizacao ?></p>
        </div>

        <div class="form-container">
            <form action="/cadastrar-curriculo" method="post">
                <input type="hidden" name="vaga" value="<?= $vaga->id ?>">

                <label for="nome_completo">Nome completo</label>
                <input type="text" name="nome_completo" id="nome_completo">

                <label for="data_nascimento">Data de nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento">

                <label for="sexo">Gênero</label>
                <select name="sexo" id="sexo">
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>

                <label for="nacionalidade">Nacionalidade</label>
                <input type="text" name="nacionalidade" id="nacionalidade">

                <label for="email">Email</label>
                <input type="email" name="email" id="email">

                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone">

                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco">

                <label for="formacao_academica">Formação acadêmica</label>
                <textarea name="formacao_academica" id="formacao_academica"></textarea>

                <label for="experiencia_profissional">Experiência profissional</label>
                <textarea name="experiencia_profissional" id="experiencia_profissional"></textarea>

                <button type="submit">
                    <i class="bi bi-upload icon"></i> Enviar currículo
                </button>
            </form>
        </div>
    </div>

    <script>
        function gerarDados() {
            document.getElementById("nome_completo").value = "Rafael Augusto Lima";
            document.getElementById("data_nascimento").value = "1991-11-10";
            document.getElementById("sexo").value = "masculino";
            document.getElementById("nacionalidade").value = "Brasileiro";
            document.getElementById("email").value = "rafael.lima@example.com";
            document.getElementById("telefone").value = "(61) 98765-4321";
            document.getElementById("endereco").value = "Rua dos Jacarandás, 200, Brasília, DF";

            document.getElementById("formacao_academica").value = `Graduação: Redes de Computadores
        Instituição: Instituto Federal de Brasília (IFB)
        Ano de Conclusão: 2014

        Cursos Complementares:
        - Introdução à Segurança da Informação (Alura) - 2021
        - Fundamentos de Auditoria de Segurança (Coursera) - 2020`;

            document.getElementById("experiencia_profissional").value = `Analista de Infraestrutura Pleno
        Empresa: TechNet Solutions
        Período: Março de 2018 - Atual
        Responsabilidades:
        - Configuração e gerenciamento de redes e servidores, garantindo a proteção contra ataques cibernéticos.
        - Monitoramento de sistemas utilizando ferramentas IDS/IPS para detectar vulnerabilidades.
        - Implementação de políticas de controle de acesso e auditoria básica em sistemas internos.
        - Suporte na análise de logs para identificação de potenciais ameaças.

        Técnico em Suporte de TI
        Empresa: DataCorp
        Período: Janeiro de 2015 - Fevereiro de 2018
        Responsabilidades:
        - Instalação e manutenção de servidores e redes locais.
        - Auxílio na configuração de firewalls e VPNs para segurança corporativa.
        - Suporte técnico a usuários em questões relacionadas à segurança de sistemas.`;
        }
    </script>
</body>
</html>