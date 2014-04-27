/* 
 * Categorias Controller
 */
categorias.controller('CategoriasCtrl', 
    ["$scope", "CategoriasSrv", "$location",
        function($scope, CategoriasSrv, $location) {
            $scope.nome = "Vinícius";
            
            // criando um método
            $scope.load = function() {
                $scope.registros = CategoriasSrv.query();
            };
            //executando
            $scope.load();
            $scope.add = function(item) {
                $scope.result = CategoriasSrv.save(
                    {},
                    item, 
                    function(data, status, header, config) {
                        $location.path('/categorias/');
                    },
                    function(data, status, header, config) {
                        alert('Erro ao inserir registro: ' + data);
                    }
                );
            }
    }]); 