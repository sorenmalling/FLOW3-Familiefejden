<?php
namespace Familiefejden\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "Familiefejden".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Task controller for the Familiefejden package 
 *
 * @FLOW3\Scope("singleton")
 */
class TaskController extends \TYPO3\FLOW3\Mvc\Controller\ActionController {


	/**
	 * Inject task repository
	 *
	 * @var \Familiefejden\Domain\Repository\TaskRepository
	 * @FLOW3\Inject
	 */
	protected $taskRepository;

	/**
	 * List action
	 *
	 * @return void
	 */
	public function listAction() {
		$this->view->assign('tasks', $this->taskRepository->findAll());
	}

	/**
	 * Show action
	 *
	 * @param \Familiefejden\Domain\Model\Task $task
	 * @return void
	 */
	public function showAction(\Familiefejden\Domain\Model\Task $task) {
		$this->view->assign('task', $task);
		$answer = new \Familiefejden\Domain\Model\Answer();
		$task->addAnswer($answer);
		$this->taskRepository->update($task);
	}

}

?>