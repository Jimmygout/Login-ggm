<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191230081703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ggm_contact ADD password_requested_at DATETIME DEFAULT NULL, ADD token VARCHAR(255) DEFAULT NULL, CHANGE fk_contact fk_contact BIGINT DEFAULT NULL, CHANGE email email VARCHAR(55) DEFAULT NULL, CHANGE nom nom VARCHAR(55) DEFAULT NULL, CHANGE prenom prenom VARCHAR(55) DEFAULT NULL, CHANGE societe societe VARCHAR(255) DEFAULT NULL, CHANGE type_societe type_societe VARCHAR(255) DEFAULT NULL, CHANGE fk_tiers fk_tiers VARCHAR(55) DEFAULT NULL, CHANGE fonction fonction VARCHAR(55) DEFAULT NULL, CHANGE siret siret VARCHAR(15) DEFAULT NULL, CHANGE telephone telephone VARCHAR(15) DEFAULT NULL, CHANGE gsm gsm VARCHAR(15) DEFAULT NULL, CHANGE rue1 rue1 VARCHAR(35) DEFAULT NULL, CHANGE rue2 rue2 VARCHAR(35) DEFAULT NULL, CHANGE rue3 rue3 VARCHAR(35) DEFAULT NULL, CHANGE cp cp VARCHAR(10) DEFAULT NULL, CHANGE ville ville VARCHAR(55) DEFAULT NULL, CHANGE taille taille VARCHAR(255) DEFAULT NULL, CHANGE fk_agence fk_agence VARCHAR(55) DEFAULT NULL, CHANGE pays pays VARCHAR(35) DEFAULT NULL, CHANGE profil profil VARCHAR(255) DEFAULT NULL, CHANGE pass pass VARCHAR(255) DEFAULT NULL, CHANGE newsletter newsletter VARCHAR(255) DEFAULT NULL, CHANGE import_crm import_crm VARCHAR(255) DEFAULT NULL, CHANGE valide valide TINYINT(1) DEFAULT NULL, CHANGE catalogue catalogue VARCHAR(255) DEFAULT NULL, CHANGE cata_type cata_type VARCHAR(255) DEFAULT NULL, CHANGE sub_date sub_date VARCHAR(55) DEFAULT NULL, CHANGE valide_par valide_par VARCHAR(255) DEFAULT NULL, CHANGE valide_le valide_le INT DEFAULT NULL, CHANGE charge_dev charge_dev VARCHAR(255) DEFAULT NULL, CHANGE last_log last_log INT DEFAULT NULL, CHANGE fk_crm_abo_news_ggm fk_crm_abo_news_ggm VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ggm_contact DROP password_requested_at, DROP token, CHANGE fk_contact fk_contact BIGINT DEFAULT NULL, CHANGE email email VARCHAR(55) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(55) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(55) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE societe societe VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE type_societe type_societe VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE fk_tiers fk_tiers VARCHAR(55) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE fonction fonction VARCHAR(55) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE siret siret VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE gsm gsm VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE rue1 rue1 VARCHAR(35) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE rue2 rue2 VARCHAR(35) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE rue3 rue3 VARCHAR(35) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cp cp VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(55) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE taille taille VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE fk_agence fk_agence VARCHAR(55) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE pays pays VARCHAR(35) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE profil profil VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE pass pass VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE newsletter newsletter VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE import_crm import_crm VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE valide valide CHAR(1) CHARACTER SET utf8mb4 DEFAULT \'\'\'O\'\'\' COLLATE `utf8mb4_unicode_ci`, CHANGE catalogue catalogue VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cata_type cata_type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE sub_date sub_date VARCHAR(55) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE valide_par valide_par VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE valide_le valide_le INT DEFAULT NULL, CHANGE charge_dev charge_dev VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_log last_log INT DEFAULT NULL, CHANGE fk_crm_abo_news_ggm fk_crm_abo_news_ggm VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
