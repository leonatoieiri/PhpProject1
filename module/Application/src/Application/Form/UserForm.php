<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Zend\Form\Form;

class UserForm extends Form implements \Zend\InputFilter\InputFilterProviderInterface{

    public function __construct() {
        parent::__construct('userForm');

        $this->add(array(
            'name' => 'user_name',
            'type' => 'Text',            
            'options' => array(
                'label' => 'Nome',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'id' => 'user_name',
                'class' => 'form-control input-sm',
                'required' => 'required'
            )
        ));
        $this->add(array(
            'name' => 'user_email',
            'type' => 'email',            
            'options' => array(
                'label' => 'Email',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'id' => 'user_email',
                'class' => 'form-control input-sm',
                'required' => 'required'
            )
        ));
        $this->add(array(
            'name' => 'user_birthday',
            'type' => 'Text',            
            'options' => array(
                'label' => 'Data de Nascimento',
                'label_attributes' => array(
                    'class' => 'control-label'
                )
            ),
            'attributes' => array(
                'id' => 'user_birthday',
                'class' => 'form-control input-sm',
                'required' => 'required'
            )
        ));
        
        $this->add(array(
            'name' => 'user_gender',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Gênero ',
                'label_attributes' =>  array(
                    'class' => 'control-label',
                ),
                'empty_option' => 'Selecione uma opção',
                'value_options' => array(
                    'f' => 'Feminino',
                    'm' => 'Masculino',
                ),
            ),
            'attributes' => array(
                'id' => 'user_gender',
                'class' => 'form-control input-sm',
                'required' => 'required'
            ),
        )); // sexo
    }

    public function getInputFilterSpecification() {
        return array(
            'user_name' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 4,
                            'max' => 255,
                        ),
                    ),
                ),
            ),
            'user_email' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                    array('name' => 'StringToLower'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 4,
                            'max' => 255,
                        ),
                    ),
                ),
            ),
            'user_birthday' => array(
                'required' => true  
            ),
            'user_gender' => array(
                'required' => true
            )
        );
    }

}
