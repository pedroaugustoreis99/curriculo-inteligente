<?php view('layouts/header', ['titulo' => $titulo]) ?>

<p class="confirm-text">Tem certeza que deseja excluir a vaga <?= $vaga->titulo ?>?</p> 
<div class="confirm-buttons">
    <a href="/vagas/exclusaoConfirmada?id=<?= $vaga->id ?>" class="btn-excluir">Sim</a>
    <a href="/vagas" class="btn-cancelar">Não</a>    
</div>

<?php view('layouts/footer') ?>