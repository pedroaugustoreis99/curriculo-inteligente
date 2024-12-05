<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="/public/assets/estilo.css">
</head>

<body>
    <header>
        <div class="header-container">
            <img src="/public/assets/logo.png" alt="Logo da aplicação" class="logo">
            <h1 class="app-name"><?= NOME_APP ?></h1>
        </div>
        <nav>
            <ul class="menu">
                <li><a href="/recrutadores">recrutadores</a></li>
                <li><a href="/vagas">Vagas</a></li>
                <li><a href="/match-vagas">MATCHES</a></li>
            </ul>
        </nav>
    </header>