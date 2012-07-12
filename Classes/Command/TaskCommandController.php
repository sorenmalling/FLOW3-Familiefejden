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
class TaskCommandController extends \TYPO3\FLOW3\Cli\CommandController {

	/**
	 * Inject task repository
	 *
	 * @var \Familiefejden\Domain\Repository\TaskRepository
	 * @FLOW3\Inject
	 */
	protected $taskRepository;

	/**
	 * Create dummy tasks
	 *
	 * @param string $number How many tasks to create
	 * @return void
	 */
	public function dummyCommand($number = 10) {
		for($i = 0; $i <= $number;$i++) {
			$task = new \Familiefejden\Domain\Model\Task();
			$task->setName('Dummy task ' . uniqid('task_'));
			$task->setDescription('Description of dummy task ' . uniqid('task_'));
			$this->taskRepository->add($task);
		}
	}

}

?>