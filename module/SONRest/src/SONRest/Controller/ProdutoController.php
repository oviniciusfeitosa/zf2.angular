<?php

namespace SONRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class ProdutoController extends AbstractRestfulController {
    #GET
    public function getList() {
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $data = $em->getRepository("Application\Entity\Produto")->findAll();
        
        return $data;
    }
    
    #GET
    public function get($id) {
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $data = $em->getRepository("Application\Entity\Produto")->find($id);
        
        return $data;
    }
    
    #POST
    public function create($data) {
        $serviceProduto = $this->getServiceLocator()->get("Application\Service\Produto");
        $produto = $serviceProduto->insert($data);
        if($produto) {
            return $produto;
        }
        return array('success' => false);
    }
    
    #PUT - é um tipo de requisição HTTP, que geralmente não podem ser testadas via browser
    public function update($id, $data) {

        $serviceProduto = $this->getServiceLocator()->get("Application\Service\Produto");
        $produto = $serviceProduto->update($data);
        if($produto) {
            return $produto;
        }
        return array('success' => false);
    }
    
    #DELETE
    public function delete($id) {
        $serviceProduto = $this->getServiceLocator()->get("Application\Service\Produto");
        $result = $serviceProduto->delete($id);
        if($result) {
            return $result;
        }
    }
    
}