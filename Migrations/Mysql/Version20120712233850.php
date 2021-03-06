<?php
namespace TYPO3\FLOW3\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120712233850 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
			// this up() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("CREATE TABLE familiefejden_domain_model_answer (flow3_persistence_identifier VARCHAR(40) NOT NULL, task VARCHAR(40) DEFAULT NULL, team VARCHAR(40) DEFAULT NULL, INDEX IDX_3C9C560E527EDB25 (task), UNIQUE INDEX UNIQ_3C9C560EC4E0A61F (team), PRIMARY KEY(flow3_persistence_identifier)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE familiefejden_domain_model_task (flow3_persistence_identifier VARCHAR(40) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, hiddenbefore DATETIME DEFAULT NULL, hiddenafter DATETIME DEFAULT NULL, PRIMARY KEY(flow3_persistence_identifier)) ENGINE = InnoDB");
		$this->addSql("CREATE TABLE familiefejden_domain_model_team (flow3_persistence_identifier VARCHAR(40) NOT NULL, picture VARCHAR(40) DEFAULT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_86DC50A916DB4F89 (picture), PRIMARY KEY(flow3_persistence_identifier)) ENGINE = InnoDB");
		$this->addSql("ALTER TABLE familiefejden_domain_model_answer ADD CONSTRAINT FK_3C9C560E527EDB25 FOREIGN KEY (task) REFERENCES familiefejden_domain_model_task (flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE familiefejden_domain_model_answer ADD CONSTRAINT FK_3C9C560EC4E0A61F FOREIGN KEY (team) REFERENCES familiefejden_domain_model_team (flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE familiefejden_domain_model_team ADD CONSTRAINT FK_86DC50A916DB4F89 FOREIGN KEY (picture) REFERENCES typo3_flow3_resource_resource (flow3_persistence_identifier)");
		$this->addSql("ALTER TABLE familiefejden_domain_model_team ADD CONSTRAINT FK_86DC50A921E3D446 FOREIGN KEY (flow3_persistence_identifier) REFERENCES typo3_party_domain_model_abstractparty (flow3_persistence_identifier) ON DELETE CASCADE");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
			// this down() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("ALTER TABLE familiefejden_domain_model_answer DROP FOREIGN KEY FK_3C9C560E527EDB25");
		$this->addSql("ALTER TABLE familiefejden_domain_model_answer DROP FOREIGN KEY FK_3C9C560EC4E0A61F");
		$this->addSql("DROP TABLE familiefejden_domain_model_answer");
		$this->addSql("DROP TABLE familiefejden_domain_model_task");
		$this->addSql("DROP TABLE familiefejden_domain_model_team");
	}
}

?>