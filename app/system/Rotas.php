<?php

namespace system;

trait Rotas
{
    /*
     * Essa propriedade armazena as rotas existentes na aplicação.
     * As rotas estão organizadas por métodos HTTP ('GET', 'POST')
     * O array associativo mapeia cada rota para um controlador e uma ação específica
     */
    protected static $rotas = [
        'GET' => [
            /*
             * Define a rota raiz ('/'). Quando acessada vai executar o método 'index' do 'MainController'
             */
            '/' => 'MainController@index',

            '/recrutadores' => 'RecrutadoresController@index',
            '/recrutadores/criar' => 'RecrutadoresController@criar',
            '/recrutadores/editar' => 'RecrutadoresController@editar',
            '/recrutadores/excluir' => 'RecrutadoresController@excluir',
            '/recrutadores/exclusaoConfirmada' => 'RecrutadoresController@exclusaoConfirmada',

            '/vagas' => 'VagasController@index',
            '/vagas/criar' => 'VagasController@criar',
            '/vagas/editar' => 'VagasController@editar',
            '/vagas/excluir' => 'VagasController@excluir',
            '/vagas/exclusaoConfirmada' => 'VagasController@exclusaoConfirmada',
            '/gerar-link' => 'VagasController@gerarLink',

            '/candidatar' => 'CandidatosController@candidatar',

            '/match-vagas' => 'MatchCurriculosVagasController@matchs',
            '/visualizar-curriculo' => 'MatchCurriculosVagasController@curriculo',



            /*
             * Rotas relacionadas ao sistema de login do framework.
             */
            '/login' => 'LoginController@formulario_login',
            '/cadastrar-usuario' => 'LoginController@formulario_cadastro',

            /*
             * Rotas acessíveis apenas por usuários logados.
             */
            '/home' => 'HomeController@home',
            '/logout' => 'LoginController@logout',

            '/editar-perfil' => 'LoginController@editar',
            '/excluir-perfil' => 'LoginController@excluir',
            
        ],
        'POST' => [

            '/recrutadores/cadastrar' => 'RecrutadoresController@cadastrar',
            '/recrutadores/atualizar' => 'RecrutadoresController@atualizar',

            '/vagas/cadastrar' => 'VagasController@cadastrar',
            '/vagas/atualizar' => 'VagasController@atualizar',

            '/cadastrar-curriculo' => 'CandidatosController@cadastrarCurriculo',

            
            /*
             * Rotas relacionadas ao sistema de login do framework
             */
            '/login-submit' => 'LoginController@login',
            '/cadastrar-usuario-submit' => 'LoginController@cadastrar',
            '/atualizar-perfil' => 'LoginController@atualizar',
            '/exclusao-confirmada' => 'LoginController@exclusao_confirmada'
        ]
    ];

    /*
     * Verifica se um método HTTP e uma rota específica existem no array de rotas.
     * 
     * @param string $metodo - O método HTTP (por exemplo, 'GET' ou 'POST').
     * @param string $rota - A rota específica que está sendo verificada.
     * @return bool - Retorna true se o método e a rota existem, caso contrário, retorna false.
     */
    protected static function rotaEMetodoExiste($metodo, $rota)
    {
        /*
         * Verifica se o método e a rota existem no array de rotas
         */
        if (key_exists($metodo, self::$rotas) AND key_exists($rota, self::$rotas[$metodo])) {
            return true;
        } else {
            return false;
        }
    }
}