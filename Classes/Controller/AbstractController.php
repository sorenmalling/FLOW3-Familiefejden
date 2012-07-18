<?php
namespace Familiefejden\Controller;

use TYPO3\FLOW3\Annotations as FLOW3;

abstract class AbstractController extends \TYPO3\FLOW3\Mvc\Controller\ActionController {

	/**
	 * Security context
	 *
	 * @var \TYPO3\FLOW3\Security\Context
	 * @FLOW3\Inject
	 */
	protected $securityContext;

	/**
	 * Initialize actions
	 *
	 * @return void
	 */
	protected function initializeView(\TYPO3\FLOW3\Mvc\View\ViewInterface $view) {
		if($this->securityContext->getParty() !== NULL) {
			$view->assign('party', $this->securityContext->getParty());
		}
	}

}


?>