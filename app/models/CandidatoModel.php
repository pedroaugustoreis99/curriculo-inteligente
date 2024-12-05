<?php 

namespace models; 

use system\Database; 

class CandidatoModel extends Database 
{ 
    public function cadastrar($nome_completo, $data_nascimento, $sexo, $nacionalidade, $email, $telefone, $endereco, $formacao_academica, $experiencia_profissional)
    {
        $sql = '
            INSERT INTO informacoes_curriculo 
                (nome_completo, data_nascimento, sexo, nacionalidade, email, telefone, endereco, formacao_academica, experiencia_profissional, created_at)
            VALUES             
                (:nome_completo, :data_nascimento, :sexo, :nacionalidade, :email, :telefone, :endereco, :formacao_academica, :experiencia_profissional, NOW())
        ';
        $params = [
            ':nome_completo' => $nome_completo,
            ':data_nascimento' => $data_nascimento,
            ':sexo' => $sexo,
            ':nacionalidade' => $nacionalidade,
            ':email' => $email,
            ':telefone' => $telefone,
            ':endereco' => $endereco,
            ':formacao_academica' => $formacao_academica,
            ':experiencia_profissional' => $experiencia_profissional
        ];
        return $this->execute_non_query($sql, $params);
    }
}