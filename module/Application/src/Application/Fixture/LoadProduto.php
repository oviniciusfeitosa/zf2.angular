<?php
namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Produto;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadProduto extends AbstractFixture implements OrderedFixtureInterface {
    
    /**
     * @param ObjectManager
     */
    public function load(ObjectManager $manager) {
        
        $categoriaLivros = $this->getReference('categoria-livros');
        $categoriaComputadores = $this->getReference('categoria-computadores');
        
        $produto = new Produto();
        $produto->setNome("Orientação a Objetos")
                ->setCategoria($categoriaLivros)
                ->setDescricao("Descrição do livro Orientação a Objetos");
        $manager->persist($produto);
        
        $produto2 = new Produto();
        $produto2->setNome("MacBook")
                ->setCategoria($categoriaComputadores)
                ->setDescricao("Descrição do Computador");
        $manager->persist($produto2);
        
        $manager->flush();
        
    }

    /**
     * @return Integer
     */
    public function getOrder() {
        return 20;
    }
}