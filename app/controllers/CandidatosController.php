<?php 

namespace controllers;

use models\CandidatoModel;
use models\VagaModel;
use models\MatchCurriculoVagaModel;
use helpers\Log;

class CandidatosController 
{ 
    public function candidatar($vaga)
    {
        $vagaModel = new VagaModel();
        $dados['vaga'] = $vagaModel->buscarPorId($vaga);

        $dados['titulo'] = 'Envie seu currículo para ' . $dados['vaga']->titulo;

        view('candidatos/candidatar', $dados);
    }

    public function cadastrarCurriculo()
    {
        extract($_POST);

        $candidatoModel = new CandidatoModel();
        $resultado = $candidatoModel->cadastrar($nome_completo, $data_nascimento, $sexo, $nacionalidade, $email, $telefone, $endereco, $formacao_academica, $experiencia_profissional);
        if ($resultado->status == 'error') {
            Log::error("Ocorreu um erro na action " . __METHOD__ . " com a seguinte mensagem -> " . $resultado->msg);
            view('sistema/erro-interno');
            exit;
        }
        $id_curriculo = $resultado->last_id;

        $dados_candidato = 'Nome: ' . $nome_completo . '. ';
        $dados_candidato .= 'data de nascimento: ' . $data_nascimento . '. ';
        $dados_candidato .= 'sexo: ' . $sexo . '. ';
        $dados_candidato .= 'nacionalidade: ' . $nacionalidade . '. ';
        $dados_candidato .= 'email: ' . $email . '. ';
        $dados_candidato .= 'telefone: ' . $telefone . '. ';
        $dados_candidato .= 'endereco: ' . $endereco . '. ';
        $dados_candidato .= 'formação acadêmica: ' . $formacao_academica . '. ';
        $dados_candidato .= 'experiência profissional: ' . $experiencia_profissional . '. ';

        $vaga_model = new VagaModel();
        $vaga = $vaga_model->buscarPorId($vaga);
        
        $dados_vaga = 'titulo da vaga: ' . $vaga->titulo . '. ';
        $dados_vaga .= 'descrição: ' . $vaga->descricao . '. ';
        $dados_vaga .= 'requisitos: ' . $vaga->requisitos . '. ';
        $dados_vaga .= 'salário: ' . $vaga->salario . '. ';
        $dados_vaga .= 'localização: ' . $vaga->localizacao . '. ';

        $apiUrl = "https://api.openai.com/v1/chat/completions";
        $apiKey = KEY_API_CHATGPT;

        $data = [
            'model' => 'gpt-4o',
            'messages' => [
                ['role' => 'system', 'content' => 'Você é um assistente de recrutamento especializado em comparar currículos com descrições de vagas.'],
                ['role' => 'user', 'content' => 'Aqui está o conteúdo de um currículo : ' . $dados_candidato . '. E aqui está a descrição da vaga: ' . $dados_vaga . '. Compare o currículo com a vaga e retorne um array PHP estruturado da seguinte forma: $arrayResposta = ["percentual" => [percentual de compatibilidade como número decimal], "analise" => [explicação detalhada dos critérios utilizados para calcular essa compatibilidade, deve ser uma string]]. Não quero que você utilize ```php e ```']
            ]
        ];

        $headers = [
            "Authorization: Bearer $apiKey",
            'Content-Type: application/json',
        ];

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        /*
         * Decodifica a resposta JSON para um array PHP
         */
        $decodedResponse = json_decode($response, true);
        // dd($decodedResponse);

        if (isset($decodedResponse['choices'][0]['message']['content'])) {
            $conteudoResposta = $decodedResponse['choices'][0]['message']['content'];
            // dd($conteudoResposta);

            /*
             * Avalia o conteúdo retornado como código PHP para transformar a string em um array PHP real
             */
            eval($conteudoResposta);
            // dd($arrayResposta);

            /*
             * Verifica se o array foi corretamente criado e se contém os índices esperados
             */
            if (is_array($arrayResposta) && isset($arrayResposta['percentual']) && isset($arrayResposta['analise'])) {
                $matchPercentual = (float)$arrayResposta['percentual']; // Convertendo para float
                $analiseDetalhada = $arrayResposta['analise']; // Capturando a análise
                
                $match_curriculo_vaga_model = new MatchCurriculoVagaModel();
                $resultado = $match_curriculo_vaga_model->cadastrar($id_curriculo, $vaga->id, $matchPercentual, $analiseDetalhada);
                if ($resultado->status == 'error') {
                    Log::error("Ocorreu um erro na action " . __METHOD__ . " com a seguinte mensagem -> " . $resultado->msg);
                    view('sistema/erro-interno');
                    exit;
                }
                view('candidatos/curriculoCadastrado', [
                    'nome' => $nome_completo,
                    'telefone' => $telefone,
                    'email' => $email,
                    'vaga' => $vaga->titulo
                ]);
            } else {
                echo "Erro ao interpretar a resposta da API. Verifique o formato retornado.";
            }
        } else {
            echo "Erro ao obter resposta da API. Verifique o log de erros para mais detalhes.";
        }
    }
}