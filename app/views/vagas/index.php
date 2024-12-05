<?php view('layouts/header', ['titulo' => $titulo]) ?>

<div class="btn-container">
    <a href="/vagas/criar" class="btn-cadastrar"><i class="bi bi-person-plus-fill"></i> Cadastrar nova vaga</a>
</div>


<table>
    <thead>
        <tr>
            <th>Título da vaga</th>
            <th>Descrição</th>
            <th>Localicação</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vagas as $vaga): ?>
            <tr>
                <td><?= $vaga->titulo ?></td>
                <td><?= $vaga->descricao ?></td>
                <td><?= $vaga->localizacao ?></td>
                <td><a href="/gerar-link?id=<?= $vaga->id ?>"><i class="bi bi-link"></i> gerar link</a></td>
                <td><a href="/vagas/editar?id=<?= $vaga->id ?>"><i class="bi bi-pencil-square"></i> editar</a></td>
                <td><a href="/vagas/excluir?id=<?= $vaga->id ?>" class="btn-excluir"><i class="bi bi-trash3-fill"></i> excluir</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php view('layouts/footer') ?>