<?php view('layouts/header', ['titulo' => $titulo]) ?>

<h3 class="form-title">Cadastrar novo recrutador</h3>

<form action="/recrutadores/cadastrar" method="post" class="form-cadastrar">
    <div class="form-group">
        <label for="nome">Nome do recrutador</label>
        <input type="text" name="nome" id="nome" class="form-input">    
        <?php if (isset($erros_de_validacao['nome'])): ?>
            <span class="erro-validacao"><?= $erros_de_validacao['nome'] ?></span>
        <?php endif; ?>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn-submit">
            <i class="bi bi-person-plus-fill"></i> Cadastrar
        </button>
    </div>
  
</form>

<?php view('layouts/footer') ?>