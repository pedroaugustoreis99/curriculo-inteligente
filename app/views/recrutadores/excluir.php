<?php view('layouts/header', ['titulo' => $titulo]) ?>

<p class="confirm-text">Tem certeza que deseja excluir o <?= $recrutador->nome ?>?</p> 
<div class="confirm-buttons">
    <a href="/recrutadores/exclusaoConfirmada?id=<?= $recrutador->id ?>" class="btn-excluir">Sim</a>
    <a href="/recrutadores" class="btn-cancelar">Não</a>    
</div>

<?php view('layouts/footer') ?>