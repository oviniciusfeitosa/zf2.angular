<?php

namespace SONRest\Service;

use Zend\Http\Response;

class ProcessJson {
    private $response;
    private $data;
    private $serializer;
    
    public function __construct(Response $response = NULL, $data = NULL, $serializer = NULL) {
        $this->response = $response;
        $this->data = $data;
        $this->serializer = $serializer;
    }
    
    public function process() {
         #serializando os dados > transformar os dados que estão como objetos p/ array.
        $serializer = $this->serializer;
        $result = $serializer->serialize($this->data, 'json');
        
        $this->response->setContent($result);
        
        $headers = $this->response->getHeaders();
        $headers->addHeaderLine("Content-type: application/json");
        $this->response->setHeaders($headers);
        
        return $this->response;
    }
    
    public function getResponse() {
        return $this->response;
    }

    public function setResponse($response) {
        $this->response = $response;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getSerializer() {
        return $this->serializer;
    }

    public function setSerializer($serializer) {
        $this->serializer = $serializer;
    }


}