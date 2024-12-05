<?php view('layouts/header', ['titulo' => $titulo]) ?>

<h3 class="form-title">Cadastrar nova vaga</h3>

<form action="/vagas/cadastrar" method="post" class="form-cadastrar">
    <div class="form-group">
        <label for="titulo">Título da vaga</label>
        <input type="text" name="titulo" id="titulo" class="form-input">    
        <?php if (isset($erros_de_validacao['titulo'])): ?>
            <span class="erro-validacao"><?= $erros_de_validacao['titulo'] ?></span>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao" class="form-textarea"></textarea>    
        <?php if (isset($erros_de_validacao['descricao'])): ?>
            <span class="erro-validacao"><?= $erros_de_validacao['descricao'] ?></span>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="requisitos">Requisitos</label>
        <textarea name="requisitos" id="requisitos" class="form-textarea"></textarea>    
        <?php if (isset($erros_de_validacao['requisitos'])): ?>
            <span class="erro-validacao"><?= $erros_de_validacao['requisitos'] ?></span>
        <?php endif; ?>
    </div>
    
    <div class="form-group">
        <label for="salario">Salário</label>
        <input type="number" name="salario" id="salario" class="form-input">    
        <?php if (isset($erros_de_validacao['salario'])): ?>
            <span class="erro-validacao"><?= $erros_de_validacao['salario'] ?></span>
        <?php endif; ?>
    </div>
    
    <div class="form-group">
        <label for="localizacao">Localização</label>
        <input type="text" name="localizacao" id="localizacao" class="form-input">    
        <?php if (isset($erros_de_validacao['localizacao'])): ?>
            <span class="erro-validacao"><?= $erros_de_validacao['localizacao'] ?></span>
        <?php endif; ?>
    </div>
    
    <div class="form-group">
        <label for="recrutador_id">Recrutador</label>
        <select name="recrutador_id" id="recrutador_id" class="form-select">
            <?php foreach ($recrutadores as $recrutador): ?>
                <option value="<?= $recrutador->id ?>"><?= $recrutador->nome ?></option>
            <?php endforeach; ?>
        </select>   
    </div>
    
    
    <div class="form-group">
        <button type="submit" class="btn-submit">
            <i class="bi bi-person-plus-fill"></i> Cadastrar
        </button>
    </div>
  
</form>

<?php view('layouts/footer') ?>