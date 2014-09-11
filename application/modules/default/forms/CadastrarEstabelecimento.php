<?php

class Default_Form_CadastrarEstabelecimento extends Zend_Form 
{
	
	public function init()
	{		
			$this->setName('cadastrar_estabelecimento');
			$this->setAttrib('enctype', 'multipart/form-data');

			$nome = new Zend_Form_Element_Text('nome');
			$nome->setLabel('Nome')
			->setRequired(true)
			->addValidator('NotEmpty');

			$codigo = new Zend_Form_Element_Text('codigo');
			$codigo->setLabel('Codigo')
			->setRequired(true)
			->addValidator('NotEmpty');

			$list = new Zend_Form_Element_Select('estabelecimento_matriz_id');
			$list->setLabel('Estabelecimento Matriz')
			->setRequired(true)
			 ->addValidators(array(array('notEmpty',true, array('messages' => array('isEmpty' => 'Selecione um Estabelecimento Matriz')))))
			->addMultiOptions(Lepard_Db_Adapter::get()->fetchAll("Select id as 'key',nome as 'value' from estabelecimento_matriz"));

			$submit = new Zend_Form_Element_Submit('submit');
			$submit->setLabel('Cadastrar');

			$this->addElements(array($nome, $codigo, $list, $submit));

	}
	
}