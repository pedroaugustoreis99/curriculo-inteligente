<?php view('layouts/header', ['titulo' => 'Matches de Currículos']) ?>

<div class="match-analysis-container">
    <div class="match-summary">
        <p>
            O(a) candidato(a) <strong><?= $curriculo->nome_completo ?></strong> teve um percentual de match de 
            <span class="match-percentual"><?= ($curriculo->match_percentual * 100) ?>%</span> 
            para a vaga 
            <span class="vaga-titulo"><?= $curriculo->titulo ?></span>.
        </p>
    </div>

    <div class="ai-analysis">
        <h2>Análise da Inteligência Artificial</h2>
        <p><?= $curriculo->resposta_analise ?></p>
    </div>

    <div class="curriculo-details">
        <table>
            <caption>Currículo</caption>
            <thead>
                <tr>
                    <th>Candidato</th>
                    <th>Data de nascimento</th>
                    <th>Gênero</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $curriculo->nome_completo ?></td>
                    <td><?= $curriculo->data_nascimento ?></td>
                    <td><?= $curriculo->sexo ?></td>
                    <td><?= $curriculo->email ?></td>
                    <td><?= $curriculo->telefone ?></td>
                    <td><?= $curriculo->endereco ?></td>
                </tr>
            </tbody>
        </table>    
    </div>

    <div class="academic-experience">
        <h2>Formação Acadêmica</h2>
        <p><?= $curriculo->formacao_academica ?></p>
    </div>

    <div class="professional-experience">
        <h2>Experiência Profissional</h2>
        <p><?= $curriculo->experiencia_profissional ?></p>
    </div>

    <div class="vaga-details">
        <h2>Dados da Vaga</h2>
        <p><strong>Descrição:</strong> <?= $curriculo->descricao ?></p>
        <p><strong>Requisitos:</strong> <?= $curriculo->requisitos ?></p>
        <p><strong>Localização:</strong> <?= $curriculo->localizacao ?></p>
    </div>
</div>

<?php view('layouts/footer') ?>
