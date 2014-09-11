<?php

class Default_Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setAction('');
        $this->setMethod('POST');
 
        $user_email = new Zend_Form_Element_Text('login');
        $user_email->setLabel('Login')
                   ->setRequired(true)
                   ->addValidator('NotEmpty');
 
        $user_password = new Zend_Form_Element_Password('password');
        $user_password->setLabel('Password')
                      ->setRequired(true)
                      ->addValidator('NotEmpty');
 
        $act = new Zend_Form_Element_Submit('submit');
        $act->setLabel('Entrar');
 
        $this->addElements(
            array(
                $user_email,
                $user_password,
                $act
            )
        );
    }
}