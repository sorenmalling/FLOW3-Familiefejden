<?php
namespace Familiefejden\Command;

/*                                                                        *
 * This script belongs to the FLOW3 package "Familiefejden".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Task command controller for the Familiefejden package
 *
 * @FLOW3\Scope("singleton")
 */
class TeamCommandController extends \TYPO3\FLOW3\Cli\CommandController {

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
	 * Create new team
	 *
	 * @param string $name Team name
	 * @param string $email Team e-mail
	 *
	 * @return void
	 */
	public function createCommand($name, $email) {
		$newTeam = new \Familiefejden\Domain\Model\Team();
		$newTeam->setName($name);
		$newTeam->setEmail($email);
		$account = $this->accountFactory->createAccountWithPassword($newTeam->getEmail(), 'password', array('Team'));
		$this->accountRepository->add($account);

		$newTeam->addAccount($account);
		$this->teamRepository->add($newTeam);

		$this->output(\TYPO3\FLOW3\var_dump($newTeam));
	}

}

?>