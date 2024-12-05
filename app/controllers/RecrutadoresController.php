<?php 

namespace controllers;

use helpers\Log;
use models\RecrutadorModel;

class RecrutadoresController 
{ 
    public function index()
    {
        $dados['titulo'] = "Recrutadores";

        $recrutadorModel = new RecrutadorModel();
        $dados['recrutadores'] = $recrutadorModel->retornaTodos();

        view('recrutadores/index', $dados);
    }

    public function criar()
    {
        $dados['titulo'] = 'Cadastrar novo recrutador';

        if (isset($_SESSION['erros_de_validacao'])) {
            $dados['erros_de_validacao'] = $_SESSION['erros_de_validacao'];
            unset($_SESSION['erros_de_validacao']);
        }

        view('recrutadores/criar', $dados);
    }

    public function cadastrar()
    {
        extract($_POST);

        $recrutadorModel = new RecrutadorModel();

        $erros_de_validacao = array();
        if (empty($nome)) {
            $erros_de_validacao['nome'] = 'O nome do recrutador é um campo obrigatório';
        } else if (strlen($nome) < 5 OR strlen($nome) > 255) {
            $erros_de_validacao['nome'] = 'O nome do recrutador deve ter entre 5 e 255 caracteres';
        } else if ($recrutadorModel->jaExisteRecrutador($nome)) {
            $erros_de_validacao['nome'] = 'Já existe um recrutador cadastrado com esse nome';
        }

        if (!empty($erros_de_validacao)) {
            $_SESSION['erros_de_validacao'] = $erros_de_validacao;
            header('Location: /recrutadores/criar');
            exit;
        }

        $resultado = $recrutadorModel->cadastrar($nome);
        
        if ($resultado->status == 'success') {
            header('Location: /recrutadores');
        } else if ($resultado->status == 'error') {
            Log::error("Ocorreu um erro na action " . __METHOD__ . " com a seguinte mensagem -> " . $resultado->msg);
            view('sistema/erro-interno');
        }
    }

    public function editar($id)
    {
        $recrutadorModel = new RecrutadorModel();

        $dados['recrutador'] = $recrutadorModel->retornaPorId($id);
        $dados['titulo'] = 'Atualizar ' . $dados['recrutador']->nome;

        if (isset($_SESSION['erros_de_validacao'])) {
            $dados['erros_de_validacao'] = $_SESSION['erros_de_validacao'];
            unset($_SESSION['erros_de_validacao']);
        }
        
        view('recrutadores/editar', $dados);
    }

    public function atualizar()
    {
        extract($_POST);
        
        $recrutadorModel = new RecrutadorModel();

        $erros_de_validacao = array();
        if (empty($nome)) {
            $erros_de_validacao['nome'] = 'O nome do recrutador é um campo obrigatório';
        } else if (strlen($nome) < 5 OR strlen($nome) > 255) {
            $erros_de_validacao['nome'] = 'O nome do recrutador deve ter entre 5 e 255 caracteres';
        } else if ($recrutadorModel->jaExisteRecrutadorAtualizar($id, $nome)) {
            $erros_de_validacao['nome'] = 'Já existe outro recrutador cadastrado com esse nome';
        }

        if (!empty($erros_de_validacao)) {
            $_SESSION['erros_de_validacao'] = $erros_de_validacao;
            header('Location: /recrutadores/editar?id=' . $id);
            exit;
        }

        $resultado = $recrutadorModel->atualizar($id, $nome);
        
        if ($resultado->status == 'success') {
            header('Location: /recrutadores');
        } else if ($resultado->status == 'error') {
            Log::error("Ocorreu um erro na action " . __METHOD__ . " com a seguinte mensagem -> " . $resultado->msg);
            view('sistema/erro-interno');
        }
    }

    public function excluir($id)
    {
        $recrutadorModel = new RecrutadorModel();
        
        $dados['recrutador'] = $recrutadorModel->retornaPorId($id);
        $dados['titulo'] = 'Excluir ' . $dados['recrutador']->nome;
        
        view('recrutadores/excluir', $dados);
    }

    public function exclusaoConfirmada($id)
    {
        $recrutadorModel = new RecrutadorModel();

        $resultado = $recrutadorModel->excluir($id);

        if ($resultado->status == 'success') {
            header('Location: /recrutadores');
        } else if ($resultado->status == 'error') {
            Log::error("Ocorreu um erro na action " . __METHOD__ . " com a seguinte mensagem -> " . $resultado->msg);
            view('sistema/erro-interno');
        }
    }
}