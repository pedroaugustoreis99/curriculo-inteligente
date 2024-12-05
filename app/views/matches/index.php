<?php view('layouts/header', ['titulo' => 'Matches de Currículos']) ?>

<div class="matches-container">
    <h1 class="page-title">Matches de Currículos</h1>

    <div class="filter-section">
        <label for="vaga-select" class="filter-label"><i class="bi bi-funnel"></i> Filtrar por vaga:</label>
        <select id="vaga-select" class="form-select">
            <option value="todas">Todas as vagas</option>
            <?php foreach ($vagas as $vaga): ?>
                <option value="<?= $vaga->id ?>"><?= $vaga->titulo ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <table>
        <thead>
            <tr>
                <th>Vaga</th>
                <th>Nome do Candidato</th>
                <th>Percentual de Match</th>
                <th>Email</th>
                <th>Telefone</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="matches-tbody">
            <?php foreach ($matches as $match): ?>
                <tr data-vaga="<?= $match->id_vaga ?>">
                    <td><?= $match->titulo ?></td>
                    <td><?= $match->nome_completo ?></td>
                    <td><?= ($match->match_percentual * 100) ?>%</td>
                    <td><?= $match->email ?></td>
                    <td><?= $match->telefone ?></td>
                    <td><a href="/visualizar-curriculo?id_curriculo=<?= $match->id_curriculo ?>"><i class="bi bi-search"> Visualizar</i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    document.getElementById('vaga-select').addEventListener('change', function () {
        const selectedVaga = this.value;
        const rows = document.querySelectorAll('#matches-tbody tr');

        rows.forEach(row => {
            const vagaId = row.getAttribute('data-vaga');
            if (selectedVaga === 'todas' || vagaId === selectedVaga) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

<?php view('layouts/footer') ?>