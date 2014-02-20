<?php

namespace SONRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class CategoriaController extends AbstractRestfulController{
    
    public function getList() {
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $data = $em->getRepository("Application\Entity\Categoria")->findAll();
        
        return $data;
    }
    
    public function get($id) {
        
    }
    
    public function create() {
        
    }
    
    public function update() {
        
    }
    
    public function delete() {
        
    }
    
}