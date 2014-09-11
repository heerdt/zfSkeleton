<?php

class Default_Form_CadastrarEstabelecimentoMatriz extends Zend_Form 
{
	
	public function init()
	{		
			$this->setName('cadastrar_estabelecimento_matriz');
			$this->setAttrib('enctype', 'multipart/form-data');

			$nome = new Zend_Form_Element_Text('nome');
			$nome->setLabel('Nome')
			->setRequired(true)
			->addValidator('NotEmpty');

			$codigo = new Zend_Form_Element_Text('codigo');
			$codigo->setLabel('Codigo')
			->setRequired(true)
			->addValidator('NotEmpty');

			$submit = new Zend_Form_Element_Submit('submit');
			$submit->setLabel('Cadastrar');

			$this->addElements(array($nome, $codigo, $submit));
	}
	
}