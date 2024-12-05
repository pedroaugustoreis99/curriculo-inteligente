<?php 

namespace models; 

use system\Database; 

class VagaModel extends Database 
{ 
    public function retornaTodos()
    {
        $sql = 'SELECT * FROM vagas';
        $vagas = $this->execute_query($sql);
        return $vagas->results;
    }

    public function cadastrar($titulo, $descricao, $requisitos, $salario, $localizacao, $recrutador_id)
    {
        $sql = '
            INSERT INTO vagas (titulo, descricao, requisitos, salario, localizacao, id_recrutador, created_at)
            VALUES (:titulo, :descricao, :requisitos, :salario, :localizacao, :id_recrutador, NOW())
        ';
        $params = [
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':requisitos' => $requisitos,
            ':salario' => $salario,
            ':localizacao' => $localizacao,
            ':id_recrutador' => $recrutador_id
        ];
        return $this->execute_non_query($sql, $params);
    }

    public function buscarPorId($id)
    {
        $sql = 'SELECT * FROM vagas WHERE id = :id';
        $param = [':id' => $id];
        return $this->execute_query($sql, $param)->results[0];
    }

    public function atualizar($id, $titulo, $descricao, $requisitos, $salario, $localizacao, $recrutador_id)
    {
        $sql = '
            UPDATE vagas SET
                titulo = :titulo,
                descricao = :descricao,
                requisitos = :requisitos,
                salario = :salario,
                localizacao = :localizacao,
                id_recrutador = :recrutador_id,
                updated_at = NOW()
            WHERE id = :id
        ';
        $params = [
            ':id' => $id,
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':requisitos' => $requisitos,
            ':salario' => $salario,
            ':localizacao' => $localizacao,
            ':recrutador_id' => $recrutador_id
        ];
        return $this->execute_non_query($sql, $params);
    }

    public function excluir($id)
    {
        $sql = 'DELETE FROM vagas WHERE id = :id';
        $param = [':id' => $id];
        return $this->execute_non_query($sql, $param);
    }
}