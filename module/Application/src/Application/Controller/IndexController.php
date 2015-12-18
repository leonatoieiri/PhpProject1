<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\UserForm;
use Application\Model\User;
use Application\Model\UserTable;

class IndexController extends AbstractActionController {

    protected $userTable;

    public function indexAction() {
        $this->getServiceLocator()->get('ViewHelperManager')->get('HeadTitle')->set('Encontre Barato: Tenha chances de ganhar um Iphone todo mês');

        $form = new UserForm();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost();
            $form->setData($data);
            if ($form->isValid()) {


                try {
                    $user = new User();
                    $user->exchangeArray($data);
                    $this->getUserTable()->saveUser($user);
                    return new ViewModel(['form' => $form, 'success' => 'Cadastro efetuado com sucesso']);
                } catch (Exception $ex) {
                    return new ViewModel(['form' => $form, 'error' => $ex->getMessage()]);
                }

            }
        }
        return new ViewModel(['form' => $form]);
    }

    public function getUserTable() {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('Application\Model\UserTable');
        }
        return $this->userTable;
    }

}
