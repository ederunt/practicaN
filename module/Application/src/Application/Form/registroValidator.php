<?php

namespace Application\Form;
//use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
//use Zend\Validator;
use Zend\I18n\Validator as I18nValidator;


class registroValidator extends InputFilter {
    
     public function __construct(){

         
        $this->add(array(

            'name' => 'nombre',

            'required' => true,

            'filters' => array(

                array('name' => 'HtmlEntities'),

                array('name' => 'StripTags'),

                array('name' => 'StringTrim'),

            ),

            'validators' => array(

                 array(

                    'name' => 'Alpha',

                     'options' => array(

                        'allowWhiteSpace'=>false,

                        'messages' => array(

                            I18nValidator\Alpha::INVALID=>'El nombre solo puede estar formado por letras',

                            I18nValidator\Alpha::NOT_ALPHA=>'El nombre solo puede estar formado por letras',

                            I18nValidator\Alpha::STRING_EMPTY=>'El nombre no puede estar vacio',

                            //I18nValidator\Alpha::NOT_ALNUM=>'Tu nombre esta mal',

                        ),

                     ),

                 ),

        )));

         

        $this->add(array(

            'name' => 'apellido',

            'required' => true,

            'filters' => array(

                array('name' => 'HtmlEntities'),

                array('name' => 'StripTags'),

                array('name' => 'StringTrim'),

            ),

            'validators' => array(

                 array(

                    'name' => 'Alpha',

                     'options' => array(

                        'allowWhiteSpace'=>false,

                        'messages' => array(

                            I18nValidator\Alpha::INVALID=>'El apellido solo puede estar formado por letras',

                            I18nValidator\Alpha::NOT_ALPHA=>'El apellido solo puede estar formado por letras',

                            I18nValidator\Alpha::STRING_EMPTY=>'El apellido no puede estar vacio',

                            //I18nValidator\Alpha::NOT_ALNUM=>'Tu nombre esta mal',

                        ),

                     ),

                 ),

        )));
        
        
        $this->add(array(

            'name' => 'direccion',

            'required' => true,

            'filters' => array(

                array('name' => 'HtmlEntities'),

                array('name' => 'StripTags'),

                array('name' => 'StringTrim'),

            ),

            'validators' => array(

                 array(

                    'name' => 'Alpha',

                     'options' => array(

                        'allowWhiteSpace'=>true,

                        'messages' => array(

                            I18nValidator\Alpha::INVALID=>'Los direccion solo pueden estar formado por letras',

                            I18nValidator\Alpha::NOT_ALPHA=>'Los direccion solo pueden estar formado por letras y numeros',

                            I18nValidator\Alpha::STRING_EMPTY=>'Los direccion no pueden estar vacios',

                            //I18nValidator\Alpha::NOT_ALNUM=>'Tu nombre esta mal',

                        ),

                     ),

                 ),

        )));
        
        
        
        $this->add(array(

            'name' => 'telefono',

            'required' => true,

            'filters' => array(

                array('name' => 'HtmlEntities'),

                array('name' => 'StripTags'),

                array('name' => 'StringTrim'),

            ),

            'validators' => array(

                 array(

                    'name' => 'Alpha',

                     'options' => array(

                        'allowWhiteSpace'=>true,

                        'messages' => array(

                            I18nValidator\Alpha::INVALID=>'El telefono solo pueden estar formado por letras',

                            I18nValidator\Alpha::NOT_ALPHA=>'El telefono solo pueden estar formado por numeros',

                            I18nValidator\Alpha::STRING_EMPTY=>'El telefono no pueden estar vacios',

                            //I18nValidator\Alpha::NOT_ALNUM=>'Tu nombre esta mal',

                        ),

                     ),

                 ),

        )));
        
   

        }

}
