/* 
 * Categorias Controller
 * #agora é utilizado o controllers.js
 * 
categorias.controller('CategoriasCtrl', 
    //dependências
    ["$scope", "CategoriasSrv", "$location", '$routeParams',
        function($scope, CategoriasSrv, $location, $routeParams) {
            $scope.nome = "Vinícius";
            
            // criando um método
            $scope.load = function() {
                $scope.registros = CategoriasSrv.query();
            };
            
            $scope.get = function() {
                $scope.item = CategoriasSrv.get({id: $routeParams.id});
            };
            
            $scope.add = function(item) {
                $scope.result = CategoriasSrv.save(
                    {},
                    item, 
                    function(data, status, header, config) {
                        $location.path('/categorias/');
                    },
                    function(data, status, header, config) {
                        alert('Erro ao inserir registro: ' + data.messages[0]);
                    }
                );
            };
            
            $scope.editar = function(item) {
                $scope.result = CategoriasSrv.update(
                    {id: $routeParams.id},
                    item,
                    function(data, status, header, config) {
                        $location.path('/categorias/');
                    },
                    function(data, status, header, config) {
                        alert('Erro ao inserir registro: ' + data.messages[0]);
                    }
                );
            };
            
            $scope.delete = function(id) {
                if(confirm('Deseja realmente excluir esse registro?')) {
                    CategoriasSrv.remove(
                        {id: id},
                        {},
                        function(data, status, header, config) {
                            $location.path('/categorias/');
                        },
                        function(data, status, header, config) {
                            alert('Erro ao inserir registro: ' + data.messages[0]);
                        }
                    );
                }
            };
    }]); 
*/