<?php 

namespace models; 

use system\Database; 

class RecrutadorModel extends Database 
{ 
    public function retornaTodos()
    {
        $sql = 'SELECT * FROM recrutadores';
        $recrutadores = $this->execute_query($sql);
        return $recrutadores->results;
    }

    public function jaExisteRecrutador($nome)
    {
        $sql = 'SELECT nome FROM recrutadores WHERE nome = :nome';
        $param = [':nome' => $nome];
        $recrutador = $this->execute_query($sql, $param);
        return $recrutador->affected_rows != 0;
    }

    public function cadastrar($nome)
    {
        $sql = '
            INSERT INTO recrutadores(nome, created_at)
            VALUES (:nome, NOW())
        ';
        $param = [':nome' => $nome];
        return $this->execute_non_query($sql, $param);
    }

    public function retornaPorId($id)
    {
        $sql = 'SELECT * FROM recrutadores WHERE id = :id';
        $param = [':id' => $id];
        $recrutador = $this->execute_query($sql, $param);
        return $recrutador->results[0];
    }

    public function jaExisteRecrutadorAtualizar($id, $nome)
    {
        $sql = 'SELECT nome FROM recrutadores WHERE id <> :id AND nome = :nome';
        $params = [
            ':id' => $id,
            ':nome' => $nome
        ];
        return $this->execute_query($sql, $params)->affected_rows != 0;
    }

    public function atualizar($id, $nome)
    {
        $sql = '
            UPDATE recrutadores
            SET nome = :nome, updated_at = NOW()
            WHERE id = :id            
        ';
        $params = [
            ':id' => $id,
            ':nome' => $nome
        ];
        return $this->execute_non_query($sql, $params);
    }

    public function excluir($id)
    {  
        $sql = 'DELETE FROM recrutadores WHERE id = :id';
        $param = [':id' => $id];
        return $this->execute_non_query($sql, $param);
    }
}