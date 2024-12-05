<?php view('layouts/header', ['titulo' => $titulo]) ?>

<div class="link-container">
    <p class="link-instruction">Envie o link abaixo para os candidatos que desejam enviar o currículo para a vaga <strong><?= $vaga->titulo ?></strong></p>
    <div class="link-box">
        <span class="link-text"><?= $url ?></span>
        <button class="btn-copy" onclick="copiarLink()">
            <i class="bi bi-copy"></i> Copiar
        </button>
    </div>
</div>

<script>
    function copiarLink() {
        const linkText = "<?= $url ?>";
        navigator.clipboard.writeText(linkText).then(() => {
            alert('Link copiado para a área de transferência!');
        }).catch(() => {
            alert('Falha ao copiar o link. Tente novamente.');
        });
    }
</script>

<?php view('layouts/footer') ?>