<?php 

namespace controllers;

use models\RecrutadorModel;
use models\VagaModel;
use helpers\Log;

class VagasController 
{ 
    public function index()
    {
        $dados['titulo'] = 'Vagas';

        $vagaModel = new VagaModel();
        $dados['vagas'] = $vagaModel->retornaTodos();
        
        view('vagas/index', $dados);
    }

    public function criar()
    {
        $dados['titulo'] = 'Cadastrar vaga';

        $recrutadorModel = new RecrutadorModel();
        $dados['recrutadores'] = $recrutadorModel->retornaTodos();

        if (isset($_SESSION['erros_de_validacao'])) {
            $dados['erros_de_validacao'] = $_SESSION['erros_de_validacao'];
            unset($_SESSION['erros_de_validacao']);
        }

        view('vagas/criar', $dados);
    }

    public function cadastrar()
    {
        extract($_POST);

        $erros_de_validacao = array();

        if (empty($titulo)) {
            $erros_de_validacao['titulo'] = 'O título é um campo obrigatório';
        } else if (strlen($titulo) < 5 OR strlen($titulo) > 255) {
            $erros_de_validacao['titulo'] = 'O título deve ter entre 5 e 255 caracteres';
        }

        if (empty($descricao)) {
            $erros_de_validacao['descricao'] = 'A descrição é um campo obrigatório';
        } else if (strlen($descricao) < 5 OR strlen($descricao) > 3000) {
            $erros_de_validacao['descricao'] = 'A descrição deve ter entre 5 e 3000 caracteres';
        }

        if (empty($requisitos)) {
            $erros_de_validacao['requisitos'] = 'Os requisitos é um campo obrigatório';
        } else if (strlen($requisitos) < 5 OR strlen($requisitos) > 3000) {
            $erros_de_validacao['requisitos'] = 'Os requisitos deve ter entre 5 e 3000 caracteres';
        }

        if (empty($localizacao)) {
            $erros_de_validacao['localizacao'] = 'A localizacao é um campo obrigatório';
        } else if (strlen($localizacao) < 5 OR strlen($localizacao) > 255) {
            $erros_de_validacao['localizacao'] = 'A localização deve ter entre 5 e 255 caracteres';
        }

        if (!empty($erros_de_validacao)) {
            $_SESSION['erros_de_validacao'] = $erros_de_validacao;
            header('Location: /vagas/criar');
            exit;
        }

        $vagaModel = new VagaModel();
        $resultado = $vagaModel->cadastrar($titulo, $descricao, $requisitos, $salario, $localizacao, $recrutador_id);
        if ($resultado->status == 'success') {
            header('Location: /vagas');
        } else if ($resultado->status == 'error') {
            Log::error("Ocorreu um erro na action " . __METHOD__ . " com a seguinte mensagem -> " . $resultado->msg);
            view('sistema/erro-interno');
        }
    }

    public function editar($id)
    {
        $vagaModel = new VagaModel();
        $dados['vaga'] = $vagaModel->buscarPorId($id);
        
        $dados['titulo'] = 'Atualizar vaga ' . $dados['vaga']->titulo;

        $recrutadorModel = new RecrutadorModel();
        $dados['recrutadores'] = $recrutadorModel->retornaTodos();
        
        view('vagas/editar', $dados);
    }

    public function atualizar()
    {
        extract($_POST);

        $vagaModel = new VagaModel();
        $resultado = $vagaModel->atualizar($id, $titulo, $descricao, $requisitos, $salario, $localizacao, $recrutador_id);
        if ($resultado->status == 'success') {
            header('Location: /vagas');
        } else if ($resultado->status == 'error') {
            Log::error("Ocorreu um erro na action " . __METHOD__ . " com a seguinte mensagem -> " . $resultado->msg);
            view('sistema/erro-interno');
        }
    }

    public function excluir($id)
    {
        $vagaModel = new VagaModel();
        $dados['vaga'] = $vagaModel->buscarPorId($id);
        
        $dados['titulo'] = 'Excluir ' . $dados['vaga']->titulo;

        view('vagas/excluir', $dados);
    }

    public function exclusaoConfirmada($id)
    {
        $vagaModel = new VagaModel();
        $resultado = $vagaModel->excluir($id);
        if ($resultado->status == 'success') {
            header('Location: /vagas');
        } else if ($resultado->status == 'error') {
            Log::error("Ocorreu um erro na action " . __METHOD__ . " com a seguinte mensagem -> " . $resultado->msg);
            view('sistema/erro-interno');
        }
    }

    public function gerarLink($id)
    {
        $vagaModel = new VagaModel();
        $dados['vaga'] = $vagaModel->buscarPorId($id);

        $dados['url'] = 'http://localhost:8000/candidatar?vaga=' . $id;

        $dados['titulo'] = 'Gerar link para ' . $dados['vaga']->titulo;

        view('vagas/gerarLink', $dados);
    }
}