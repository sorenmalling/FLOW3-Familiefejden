<?php
namespace Familiefejden\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "Familiefejden".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Respond
 *
 * @FLOW3\Entity
 */
class Answer {

	/**
	 * Task
	 *
	 * @ORM\ManyToOne(inversedBy="answers")
	 * @var \Familiefejden\Domain\Model\Task
	 */
	protected $task;

	/**
	 * Team
	 *
	 * @ORM\OneToOne
	 * @var \Familiefejden\Domain\Model\Team
	 */
	protected $team;

	/**
	 * Text, a written answer
	 *
	 * @ORM\Column(nullable=true)
	 * @var string
	 */
	protected $text;

	/**
	 * Picture
	 * @ORM\ManyToOne
	 * @var \TYPO3\FLOW3\Resource\Resource
	 */
	protected $picture;


	/**
	 * @param \Familiefejden\Domain\Model\Task  $task
	 */
	public function setTask($task) {
		$this->task = $task;
	}

	/**
	 * @return \Familiefejden\Domain\Model\Task
	 */
	public function getTask() {
		return $this->task;
	}

	/**
	 * @param $team \Familiefejden\Domain\Model\Team
	 */
	public function setTeam($team) {
		$this->team = $team;
	}

	/**
	 * @return \Familiefejden\Domain\Model\Team
	 */
	public function getTeam() {
		return $this->team;
	}

	/**
	 * @param string $text
	 */
	public function setText($text) {
		$this->text = $text;
	}

	/**
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * @param \TYPO3\FLOW3\Resource\Resource $picture
	 */
	public function setPicture($picture) {
		$this->picture = $picture;
	}

	/**
	 * @return \TYPO3\FLOW3\Resource\Resource
	 */
	public function getPicture() {
		return $this->picture;
	}
}
?>