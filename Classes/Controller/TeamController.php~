<?php
namespace Familiefejden\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "Familiefejden".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Team controller for the Familiefejden package 
 *
 * @FLOW3\Scope("singleton")
 */
class TeamController extends \TYPO3\FLOW3\Mvc\Controller\ActionController {
	/**
	 * Team repository
	 *
	 * @var \Familiefejden\Domain\Repository\TeamRepository
	 * @FLOW3\Inject
	 */
	protected $teamRepository;

	/**
	 * Account factory
	 *
	 * @var \TYPO3\FLOW3\Security\AccountFactory
	 * @FLOW3\Inject
	 */
	protected $accountFactory;

	/**
	 * Account repository
	 *
	 * @var \TYPO3\FLOW3\Security\AccountRepository
	 * @FLOW3\Inject
	 */
	protected $accountRepository;

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('foos', array(
			'bar', 'baz'
		));
	}

	/**
	 * Create new team
	 *
	 * @param \Familiefejden\Domain\Model\Team $newTeam
	 * @return void
	 */
	public function createAction(\Familiefejden\Domain\Model\Team $newTeam) {
		$account = $this->accountFactory->createAccountWithPassword($newTeam->getEmail(), 'password', array('Team'));
		$this->accountRepository->add($account);

		$this->teamRepository->add($newTeam);
		$this->flashMessageContainer->addMessage(new \TYPO3\FLOW3\Error\Message('Team created'));
		$this->redirect('list');
	}

	/**
	 * List teams
	 *
	 * @return void
	 */
	public function listAction() {
		$this->view->assign('teams', $this->teamRepository->findAll());
	}

}

?>