<?php

class Default_Form_EnviarArquivo extends Zend_Form 
{
	
	public function init()
	{
		/*
		$this->setDecorators(array(
			array('Description', array('tag' => 'p', 'class' => 'description','escape' => false)),
			'formElements',
			'fieldset',
			array('form',array('class' => 'formdefault'))
		));
		$this->setElementDecorators(array(
			'ViewHelper',
			'Description',
			'Label',
			'Errors',
			array(array('tipo' => 'HtmlTag'), array('tag' => 'div'))
		));*/
		
		//$this->setAttrib('class','formdefault consumidorForm');
		//$this->setLegend('Enviar Arquivos');
			$this->setName('upload');
			$this->setAttrib('enctype', 'multipart/form-data');

			$description = new Zend_Form_Element_Text('description');
			$description->setLabel('Description')
			->setRequired(true)
			->addValidator('NotEmpty');

			$file = new Zend_Form_Element_File('arquivo');
			$file->setLabel('Selecione os arquivos EDI"s Zipados')
			->setDestination('temp/arquivos/zip')
			->setRequired(true)
			->addValidator('Extension', false, 'zip');;

			$submit = new Zend_Form_Element_Submit('submit');
			$submit->setLabel('Enviar');

			$this->addElements(array($file, $submit));

	}
	
}