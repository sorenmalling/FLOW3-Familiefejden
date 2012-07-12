<?php
namespace Familiefejden\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "Familiefejden".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Task
 *
 * @FLOW3\Entity
 */
class Task {

	/**
	 * Name
	 * @var string
	 */
	protected $name;

	/**
	 * Description
	 * @var string
	 */
	protected $description;

	/**
	 * Responses
	 * @ORM\OneToMany(mappedBy="task")
	 * @var \Doctrine\Common\Collections\Collection<\Familiefejden\Domain\Model\Answer>
	 */
	protected $answers;

	/**
	 * Date which this task is hidden before
	 * @var \DateTime
	 * @ORM\Column(nullable=true)
	 */
	protected $hiddenBefore;

	/**
	 * Date which this task is hidden after
	 * @var \DateTime
	 * @ORM\Column(nullable=true)
	 */
	protected $hiddenAfter;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->answers = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Add Answer
	 *
	 * @param \Familiefejden\Domain\Model\Answer $answer
	 */
	public function addAnswer(\Familiefejden\Domain\Model\Answer $answer) {
		$answer->setTask($this);
		$this->answers->add($answer);
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection<\Familiefejden\Domain\Model\Answer>
	 */
	public function getAnswers() {
		return $this->answers;
	}

	/**
	 * @return \DateTime
	 */
	public function getHiddenAfter() {
		return $this->hiddenAfter;
	}

	/**
	 * @param \DateTime $hiddenAfter
	 */
	public function setHiddenAfter($hiddenAfter) {
		$this->hiddenAfter = $hiddenAfter;
	}

	/**
	 * @return \DateTime
	 */
	public function getHiddenBefore() {
		return $this->hiddenBefore;
	}

	/**
	 * @param \DateTime $hiddenBefore
	 */
	public function setHiddenBefore($hiddenBefore) {
		$this->hiddenBefore = $hiddenBefore;
	}

}
?>