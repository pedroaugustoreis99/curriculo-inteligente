<?php view('layouts/header', ['titulo' => $titulo]) ?>

<div class="btn-container">
    <a href="/recrutadores/criar" class="btn-cadastrar"><i class="bi bi-person-plus-fill"></i> Cadastrar novo recrutador</a>
</div>


<table>
    <thead>
        <tr>
            <th>Nome do recrutador</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recrutadores as $recrutador): ?>
            <tr>
                <td><?= $recrutador->nome ?></td>
                <td><a href="/recrutadores/editar?id=<?= $recrutador->id ?>"><i class="bi bi-pencil-square"></i> editar</a></td>
                <td><a href="/recrutadores/excluir?id=<?= $recrutador->id ?>" class="btn-excluir"><i class="bi bi-trash3-fill"></i> excluir</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php view('layouts/footer') ?>