<?php

class IndexController extends Zend_Controller_Action
{

 	public function init()
    {
    	
    	if (Zend_Controller_Front::getInstance()->getRequest()->getActionName()!="logout"&&Zend_Auth::getInstance()->hasIdentity()) {
    		$this->getHelper('Redirector')
			->setGotoUrl('/home');
    	}

    	$this->view->pagina_modulo = "Login";
    }

    public function indexAction()
    {
        // Redireciona para o login 
        $this->getHelper('Redirector')
			->setGotoUrl('/index/login');
    }

    public function loginAction()
    {
		$this->view->pagina_action = "Login";
		$this->view->pagina_descricao = "Informe seu usuário e senha para acessar o sistema.";
        // Instancia o formulário de login
        $objFormLogin = new Default_Form_Login();

 		if ($this->_request->isPost()) {

 			$data = $this->getRequest()->getPost();
 			if ($objFormLogin->isValid($data)) {

				$objAuth = Zend_Auth::getInstance();
		        $authAdapter = new Zend_Auth_Adapter_DbTable(
		                Lepard_Db_Adapter::get(),
		                'usuario',
		                'login',
		                'password'
		        );
				$authAdapter->setIdentity($data['login'])->setCredential($data['password']);
				//print_r($authAdapter);die;
				$result = $objAuth->authenticate($authAdapter);
				if ( $result->isValid() ) {
		            /**
		             * Pega os dados do usuário, omitindo a senha
		             * http://framework.zend.com/manual/en/zend.auth.adapter.dbtable.html
		             */
		            $authData = $authAdapter->getResultRowObject( null, 'password' );
		            // Armazena os dados do usuário
		            $objAuth->getStorage()->write( $authData );
		            echo 'Login efetuado com sucesso!';
		            $this->getHelper('Redirector')
						->setGotoUrl('/index');
		        } else { 
		            echo 'Os dados informados (login/senha) não são válidos.';
		        }
 			}

 		}

        $this->view->form = $objFormLogin;
    }
    public function logoutAction()
    {
        $objAuth = Zend_Auth::getInstance();
        // Limpa a autenticação
        $objAuth->clearIdentity();

		$this->getHelper('Redirector')
			->setGotoUrl('/index');
    }
	
}