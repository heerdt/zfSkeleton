<?php

class Default_Form_Usuario extends Zend_Form 
{
	
	public function init()
	{
		
		$this->setAttrib('class','formdefault consumidorForm');
		$this->setLegend('Consumidor');
		
		$this->addElements(array(
			'id' => array(
				'hidden',array(
					'value' => ''
				)
			),
			'login' => array(
				'text',array(
					'label' => 'Login',
					'class' => '',
					'maxlength' => '50',
					'validators' => array(
						'NotEmpty',
						'UniqueUsuarioLogin'
					),
					'required' => true
				)
			),
			'password' => array(
				'text',array(
					'label' => 'Password',
					'class' => '',
					'maxlength' => '50',
					'validators' => array(
						'NotEmpty',
					),
					'required' => true
				)
			),
			'passwordConfirm' => array(
				'text',array(
					'label' => 'Confirmação do Password',
					'class' => '',
					'maxlength' => '50',
					'validators' => array(
						'NotEmpty',
						array('identical', true, array('password'))
					),
					'required' => true
				)
			),
			'btn_enviar' => array(
				'submit',array(
					'class' => 'left clear btn-enviar',
					'label' => 'Enviar' 
				)
			)
		));
	}
	
}