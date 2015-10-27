<?php

namespace Application\Form;

use Zend\Form\Form,
    Zend\Form\Element;

class registro extends Form {
    
    public function __construct($name = null)
     {
        parent::__construct($name);
      //  $this->setInputFilter(new \Application\Form\registroValidator());
        $this->setAttributes(array(
            //'action' => $this->url.'/modulo/recibirformulario',
            //'action'=>"/application/index/add",
            'action'=>"",
            'method' => 'post'
        ));
        
          $this->add(array(
            'name' => 'nombre',
            'options' => array(
                'label' => 'Nombre: ',

            ),

            'attributes' => array(

               'type' => 'text',

                'class' => 'input form-control',

                //'required'=>'required'

            )

        ));
          
          
          $this->add(array(
            'name' => 'apellido',
            'options' => array(
                'label' => 'Apellido: ',

            ),

            'attributes' => array(

               'type' => 'text',

                'class' => 'input form-control',

                //'required'=>'required'

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
