<?php
namespace Familiefejden\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "Familiefejden".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Login controller for the Familiefejden package 
 *
 * @FLOW3\Scope("singleton")
 */
class LoginController extends \TYPO3\FLOW3\Security\Authentication\Controller\AuthenticationController {

	/**
	 * Authenticate action
	 *
	 * @return void
	 */
	public function authenticateAction() {
		parent::authenticateAction();
		$this->redirect('index', 'Standard');
	}

	/**
	 * Logout action
	 *
	 * @return void
	 */
	public function logoutAction() {
		parent::logoutAction();
		$this->redirect('index', 'Standard');
	}

}

?>