<?php 

namespace controllers; 

use models\MatchCurriculoVagaModel;
use models\VagaModel;

class MatchCurriculosVagasController 
{ 
    public function matchs($vaga = null)
    {
        $matchCurriculoVagaModel = new MatchCurriculoVagaModel();
        $dados['matches'] = $matchCurriculoVagaModel->retornaTodos();

        $vagaModel = new VagaModel();
        $dados['vagas'] = $vagaModel->retornaTodos();
        
        $dados['titulo'] = 'Matches';
        
        view('matches/index', $dados);
    }

    public function curriculo($id_curriculo)
    {
        $matchCurriculoVagaModel = new MatchCurriculoVagaModel();
        $dados['curriculo'] = $matchCurriculoVagaModel->retornaCurriculo($id_curriculo);
               
        $dados['titulo'] = "Currículo do(a) " . $dados['curriculo']->nome_completo;
        
        view('matches/curriculo', $dados);
    }
}