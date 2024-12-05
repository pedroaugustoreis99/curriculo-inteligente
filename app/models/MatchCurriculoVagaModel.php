<?php 

namespace models; 

use system\Database; 

class MatchCurriculoVagaModel extends Database 
{ 
    public function cadastrar($id_curriculo, $id_vaga, $match_percentual, $resposta_analise)
    {
        $sql = 'INSERT INTO match_curriculo_vaga(id_curriculo, id_vaga, match_percentual, resposta_analise) ';
        $sql .= 'VALUES (:id_curriculo, :id_vaga, :match_percentual, :resposta_analise)';
        
        $params = [
            ':id_curriculo' => $id_curriculo,
            ':id_vaga' => $id_vaga,
            ':match_percentual' => $match_percentual,
            ':resposta_analise' => $resposta_analise
        ];

        return $this->execute_non_query($sql, $params);
    }

    public function retornaTodos()
    {
        $sql = '
            SELECT 
                mcv.id_curriculo, mcv.id_vaga, mcv.match_percentual, 
                c.nome_completo, c.email, c.telefone,
                v.titulo
            FROM match_curriculo_vaga AS mcv
            INNER JOIN informacoes_curriculo AS c
                ON c.id = mcv.id_curriculo
            INNER JOIN vagas AS v
                ON v.id = mcv.id_vaga
            ORDER BY mcv.match_percentual DESC
        ';
        return $this->execute_query($sql)->results;
    }

    public function retornaCurriculo($id_curriculo)
    {
        $sql = '
            SELECT 
                mcv.id_curriculo, mcv.id_vaga, mcv.match_percentual, mcv.resposta_analise,
                c.nome_completo, c.data_nascimento, c.sexo, c.nacionalidade, c.email, 
                    c.telefone, c.endereco, c.formacao_academica, c.experiencia_profissional,
                v.titulo, v.descricao, v.requisitos, v.localizacao
            FROM match_curriculo_vaga AS mcv
            INNER JOIN informacoes_curriculo AS c
                ON c.id = mcv.id_curriculo
            INNER JOIN vagas AS v
                ON v.id = mcv.id_vaga
            WHERE mcv.id_curriculo = :id_curriculo
            ORDER BY mcv.match_percentual DESC
        ';
        $param = [':id_curriculo' => $id_curriculo];
        return $this->execute_query($sql, $param)->results[0];
    }
}