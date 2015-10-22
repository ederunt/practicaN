<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//use Application\Form\demoForm;
//use Application\InputFilter\demosForm;
//use Zend\Db\Adapter\Adapter;
use Application\Model\PruebaModel;
use Application\Form\registro;
//use Application\InputFilter\registro;
//use Zend\Db\ResultSet\ResultSet;

class IndexController extends AbstractActionController {

    public function indexAction() {
//mod-enable/rewirte.log
        //echo 'ola';
        //exit;
//        echo 'vaaaa';
//        $form = new demoForm();
//        return new ViewModel(array('login' => $form,'flashMessages' => $this->flashMessenger()->getMessages()));
//        return new ViewModel();
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $usuarios=new PruebaModel($this->dbAdapter);
        $lista=$usuarios->getUsuarios();
        return new ViewModel(
                array(
                    "lista"=>$lista
                ));
    }
    
//    public function loginAction() {
//        
//        $form = new demoForm();
//        $inputFilter = new demosForm();
//        $data = $this->getRequest()->getPost();
//      
//        $form->setData($data);
//        $form->setInputFilter($inputFilter);
//        if ($form->isValid()) {
////            echo 'is valid';
////            exit();
//        } else {
////            var_dump($form->getMessages());
////            exit();
//            $this->flashMessenger()->addMessage(json_encode($form->getMessages()));
////            //f029a90471a4
//            return $this->redirect()->toUrl('/application/index');
//        }
//    }
        
    
    public function addAction(){
        
        //aqui mandamos el formulario a la vista 
        $form=new registro();
        //aqui instanciamos el metodo de carga del modelo
        if($this->getRequest()->isPost()){
             $form->setData($this->getRequest()->getPost());
            if($form->isValid()){
                
                $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
                $usuarios=new PruebaModel($this->dbAdapter);
                //obtener los datos del formulario
                $nombre=$this->request->getPost('nombre');
                $apellido=$this->request->getPost('apellido');
                $direccion=$this->request->getPost('direccion');
                $telefono=$this->request->getPost('telefono');
                $usuarios->addUsuario($nombre,$apellido,$direccion,$telefono);
            }
            
        }
        return new ViewModel(array('form'=>$form));
        
    }
    
    public function deleteAction(){
        $dato = "olaaaaaaaaa";
        return new ViewModel(array('datos'=>$dato));
    }
               
}
