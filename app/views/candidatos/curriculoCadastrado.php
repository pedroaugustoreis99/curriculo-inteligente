<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Cadastrado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Reset básico */
        body, h1, p {
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
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #037ec6;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .success-icon {
            font-size: 50px;
            color: #28a745; /* Verde para indicar sucesso */
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .contact-info {
            margin-top: 20px;
        }

        .contact-info p {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px; /* Espaço entre ícone e texto */
            font-size: 20px;
            color: #555;
        }

        .contact-info i {
            font-size: 18px;
            color: #037ec6;
        }

        .btn-home {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #037ec6;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-home:hover {
            background-color: #005f9a;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <i class="bi bi-check-circle-fill success-icon"></i>
        <h1>Currículo Cadastrado com Sucesso!</h1>
        <p>Olá <strong><?= $nome ?></strong>, o seu currículo foi cadastrado com sucesso em nossa base de dados para a vaga <strong><?= $vaga ?></strong>!</p>
        <p>Fique de olho nos contatos abaixo para receber o feedback de nossos recrutadores:</p>
        <div class="contact-info">
            <p><i class="bi bi-telephone"></i> <strong><?= $telefone ?></strong></p>
            <p><i class="bi bi-envelope"></i> <strong><?= $email ?></strong></p>
        </div>
        <a href="/" class="btn-home"><i class="bi bi-house"></i> Voltar para Home</a>
    </div>
</body>
</html>
