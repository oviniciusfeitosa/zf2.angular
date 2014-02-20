<?php

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;

// Guardado apenas consultas. Nunca entram inserts
# ficam as consultas personalizadas
class CategoriaRepository extends EntityRepository {
    
    public function buscaPorNome($nome) {
        //método exemplo
    }
    
    
}