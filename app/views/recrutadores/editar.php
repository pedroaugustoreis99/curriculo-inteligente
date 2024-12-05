<?php view('layouts/header', ['titulo' => $titulo]) ?>

<h3 class="form-title">Atualizar dados de um recrutador</h3>

<form action="/recrutadores/atualizar" method="post" class="form-cadastrar">
    <input type="hidden" name="id" value="<?= $recrutador->id ?>">

    <div class="form-group">
        <label for="nome">Nome do recrutador</label>
        <input type="text" name="nome" id="nome" class="form-input" value="<?= $recrutador->nome ?>">    
        <?php if (isset($erros_de_validacao['nome'])): ?>
            <span class="erro-validacao"><?= $erros_de_validacao['nome'] ?></span>
        <?php endif; ?>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn-submit">
            <i class="bi bi-pencil-square"></i> Atualizar
        </button>
    </div>
  
</form>

<?php view('layouts/footer') ?>