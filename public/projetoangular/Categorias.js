/* 
 *  Definindo módulo
    Primeiro parâmetro: Nome do módulo
    Segundo parâmetro: Dependências do módulo
        ngRoute > é uma biblioteca externa (angular-route.min.js)
 */
var categorias = angular.module('Categorias', ['ngRoute', 'nrResource']);

// $routeProvider > Quem gerencia a rota
categorias.config(['$routeProvider', 
    function ($routeProvider) {
        $routeProvider.when('/', {
           templateUrl: 'projetoangular/templates/categorias.html'
        });
    }
]);