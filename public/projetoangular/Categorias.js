/* 
 *  Definindo módulo
    Primeiro parâmetro: Nome do módulo
    Segundo parâmetro: Dependências do módulo
        ngRoute > é uma biblioteca externa (angular-route.min.js)
 */
var categorias = angular.module('Categorias', ['ngRoute', 'ngResource']);

// $routeProvider > Quem gerencia a rota
categorias.config(['$routeProvider', 
    function ($routeProvider) {
        $routeProvider
            .when('/categorias/', {
               templateUrl: 'projetoangular/templates/categorias.html'
            })
            .when('/categorias/novo/', {
               templateUrl: 'projetoangular/templates/categorias_novo.html'
            })
            .when('/categorias/editar/:id', {
               templateUrl: 'projetoangular/templates/categorias_editar.html'
            });
    }
]);