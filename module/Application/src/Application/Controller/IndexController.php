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
use Application\Form\demoForm;
use Application\InputFilter\demosForm;
use Zend\Db\Adapter\Adapter;
use Application\Model\PruebaModel;
//use Zend\Db\ResultSet\ResultSet;

class IndexController extends AbstractActionController {

    public function indexAction() {

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
    
    public function loginAction() {
        
        $form = new demoForm();
        $inputFilter = new demosForm();
        $data = $this->getRequest()->getPost();
      
        $form->setData($data);
        $form->setInputFilter($inputFilter);
        if ($form->isValid()) {
//            echo 'is valid';
//            exit();
        } else {
//            var_dump($form->getMessages());
//            exit();
            $this->flashMessenger()->addMessage(json_encode($form->getMessages()));
//            //f029a90471a4
            return $this->redirect()->toUrl('/application/index');
        }
    }
    
    public function index01Action(){
        //$val = "olaaaa";
        //echo 'aquiiii';
//        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
//        $result = $this->dbAdapter->query('SELECT * FROM mod_usuario_rol',Adapter::QUERY_MODE_EXECUTE);
//        $returnArray = array();
//        foreach ($result as $list){
//            $returnArray[] = $list;
//        }
//        //print_r($list);
//        //exit;
//        //return array("valor"=>$val);
//        $resultado = $result->toArray();
        //$resultado = "aver";
        return new ViewModel(array('valor'=> $resultado));
        //return new ViewModel(array('valor'=> $result));
    }
    
    
    public function addAction(){

        $form=new AddUsuario("form");
        
        $vista=array("form"=>$form);
        
        if($this->getRequest()->isPost()) {
            
            $form->setData($this->getRequest()->getPost());
            if($form->isValid()){
                //Cargamos el modelo
                $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');

                $usuarios=new UsuariosModel($this->dbAdapter);

                //Recogemos los datos del formulario

                $email=$this->request->getPost("email");

                 

                /*
57
                Ciframos la contraseña
58
                para la maxima seguridad le aplicamos un salt
59
                y hacemos el hash del hash 5 veces
60
                (por defecto vienen mas de 10 pero es mas lento)
61
                */
                $bcrypt = new Bcrypt(array(

                                'salt' => 'aleatorio_salt_pruebas_victor',

                                'cost' => 5));

                $securePass = $bcrypt->create($this->request->getPost("password"));

                 

                $password=$securePass;

                $nombre=$this->request->getPost("nombre");

                $apellido=$this->request->getPost("apellido");

                 

                //Insertamos en la bd

                $insert=$usuarios->addUsuario($email, $password, $nombre, $apellido);

                 

                //Mensajes flash $this->flashMessenger()->addMenssage("mensaje");

                if($insert==true){

                    $this->flashMessenger()->setNamespace("add_correcto")->addMessage("Usuario añadido correctamente");

                    return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/crud/');

                }else{

                    $this->flashMessenger()->setNamespace("duplicado")->addMessage("Usuario duplicado mete otro");

                    return $this->redirect()->refresh();

                }

            }else{

                $err=$form->getMessages();

                $vista=array("form"=>$form,'url'=>$this->getRequest()->getBaseUrl(),"error"=>$err);

            }
        }
        return new ViewModel($vista);
    }

    
    

}
