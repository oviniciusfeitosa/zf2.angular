/* 
 * Categorias Controller
 */
categorias.controller('CategoriasCtrl', 
    ["$scope", "CategoriasSrv", function($scope, CategoriasSrv) {
            $scope.nome = "Vinícius";
            
            // criando um método
            $scope.load = function() {
                $scope.registros = CategoriasSrv.query();
            };
            
            //executando
            $scope.load();
    }]); 