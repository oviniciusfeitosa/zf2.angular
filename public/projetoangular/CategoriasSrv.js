/* 
 * Responsável pelos serviços. Onde faz as comunicação com o framework
 */
categorias.factory('CategoriasSrv', ["$resource", 
    function($resource) {
        return $resource(
            '/api/categoria/:id', {
                id: '@id'
            }
        );
    }
]);