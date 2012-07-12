<?php
namespace Familiefejden\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "Familiefejden".              *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Team
 *
 * @FLOW3\Entity
 */
class Team extends \TYPO3\Party\Domain\Model\AbstractParty {

	/**
	 * Team name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * E-mail
	 *
	 * @var string
	 */
	protected $email;

	/**
	 * Picture
	 * @ORM\ManyToOne
	 * @var \TYPO3\FLOW3\Resource\Resource
	 */
	protected $picture;

	/**
	 * Set team name
	 *
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Get team name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param \TYPO3\FLOW3\Resource\Resource $picture
	 */
	public function setPicture(\TYPO3\FLOW3\Resource\Resource $picture) {
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