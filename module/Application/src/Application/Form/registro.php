<?php

namespace Application\Form;

use Zend\Form\Form,
    Zend\Form\Element;

class registro extends Form {
    
    public function __construct($name = null)
     {
        parent::__construct($name);
        $this->setInputFilter(new \Application\Form\AddUsuarioValidator());
        $this->setAttributes(array(
            //'action' => $this->url.'/modulo/recibirformulario',
            'action'=>"/application/index/index01",
            'method' => 'post'
        ));
        
//        $this->add(array(
//            'name' => 'email',
//            'options' => array(
//                'label' => 'Correo: ',
//            ),
//            'attributes' => array(
//                'type' => 'email',
//                'class' => 'input form-control',
//                'required'=>'required'
//            )
//        ));

         
//         $this->add(array(
//            'name' => 'password',
//            'options' => array(
//                'label' => 'Contraseña: ',
//            ),
//
//            'attributes' => array(
//                'type' => 'password',
//                'class' => 'input form-control',
//                'required'=>'required'
//            )
//        ));

          $this->add(array(
            'name' => 'nombre',
            'options' => array(
                'label' => 'Nombre: ',

            ),

            'attributes' => array(

               'type' => 'text',

                'class' => 'input form-control',

                'required'=>'required'

            )

        ));
          
          
          $this->add(array(
            'name' => 'direccion',
            'options' => array(
                'label' => 'Direccion: ',

            ),

            'attributes' => array(

               'type' => 'text',

                'class' => 'input form-control',

                'required'=>'required'

            )

        ));
          
          
          $this->add(array(
            'name' => 'telefono',
            'options' => array(
                'label' => 'Telefono: ',

            ),

            'attributes' => array(

               'type' => 'text',

                'class' => 'input form-control',

                'required'=>'required'

            )

        ));

         

//        $this->add(array(
//            'name' => 'apellido',
//            'options' => array(
//
//                'label' => 'Apellidos: ',
//
//            ),
//
//            'attributes' => array(
//
//                'type' => 'text',
//
//                'class' => 'input form-control',
//
//                'required'=>'required'
//
//            )
//
//        ));


        $this->add(array(

            'name' => 'submit',

            'attributes' => array(    

                'type' => 'submit',

                'value' => 'Enviar',

                'title' => 'Enviar',

                'class' => 'btn btn-success'

            ),

        ));

     }

}
