<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//use Application\Entity\Categoria;
use Application\Entity\Produto;

class IndexController extends AbstractActionController {

    public function indexAction() {

        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $repo = $em->getRepository("Application\Entity\Categoria");
//        
//        $categoria = new Categoria();
//        $categoria->setNome("Laptops");
//        
//        # a entidade é colocada em uma fila de persistência. 
//        # Prepara para gravar
//        $em->persist($categoria); 
//        # As querys geradas são concretizadas no banco de dados.
//        # grava no banco;
//        $em->flush();           
//        
//        persistir: dados que estão na memória e armazenar no banco de dados

###inserindo produto
        // $categoria = $repo->find(1);
        // $produto = new Produto();
        // $produto->setNome("Game A")
        //         ->setDescricao("Game A é legal")
        //         ->setCategoria($categoria);

        // $em->persist($produto);
        // $em->flush();
###fim inserindo produto

        // $categoriaService = $this->getServiceLocator()->get("Application\Service\Categoria");
        // $categoriaService->insert('Monitores2');

        // $categoriaService = $this->getServiceLocator()->get("Application\Service\Categoria");
        // $categoriaService->update(array('id' => 4, 'nome' => 'CPU'));        

        // $categoriaService = $this->getServiceLocator()->get("Application\Service\Categoria");
        // $categoriaService->delete(5);    


        // $produtoService = $this->getServiceLocator()->get('Application\Service\Produto');
        // $produtoService->insert(array('nome'=>'Gane B', 'categoriaId' => 1));
        // $produtoService->delete(3);

        $categorias = $repo->findAll();

        return new ViewModel(array(
            "categorias" => $categorias
        ));
    }

}
