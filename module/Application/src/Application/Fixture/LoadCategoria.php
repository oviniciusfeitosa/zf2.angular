<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Categoria;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadCategoria extends AbstractFixture implements OrderedFixtureInterface {
    
    /**
     * @param ObjectManager
     */
    public function load(ObjectManager $manager) {
        $categoria = new Categoria();
        $categoria->setNome("Livros");
        $this->addReference("categoria-livros", $categoria);
        $manager->persist($categoria);
        
        $categoria2 = new Categoria();
        $categoria2->setNome("Computadores");
        $this->addReference("categoria-computadores", $categoria2);
        $manager->persist($categoria2);
        
        $manager->flush();   
    }
    
    /**
     * @return Integer
     */
    public function getOrder() {
        return 10;
    }
}