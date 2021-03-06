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
class TeamController extends AbstractController {
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
	 * New team
	 *
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * Create new team
	 *
	 * @param \Familiefejden\Domain\Model\Team $newTeam
	 * @return void
	 */
	public function createAction(\Familiefejden\Domain\Model\Team $newTeam) {
		$this->teamRepository->add($newTeam);

		$account = $this->accountFactory->createAccountWithPassword($newTeam->getEmail(), 'password', array('Team'));
		$account->setParty($newTeam);
		$this->accountRepository->add($account);

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