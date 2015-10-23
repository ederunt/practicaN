<?php

namespace StickyNotes\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StickyNotesController extends AbstractActionController{
    
    public function indexAction(){
        $parametro = "Hola Mundo mi primer modulo";
        return new ViewMode(array('msg'=>$parametro));
    }
   
    public function addAction(){
        
    }
    
    public function removeAction(){
        
    }
    
    public function updateAction(){
        
    }
}

