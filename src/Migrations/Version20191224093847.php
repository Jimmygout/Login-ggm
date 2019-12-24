<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191224093847 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql("CREATE TABLE ggm_contact (pk_ggm_contact INT AUTO_INCREMENT NOT NULL, fk_contact BIGINT DEFAULT NULL, email VARCHAR(55) DEFAULT NULL, nom VARCHAR(55) DEFAULT NULL, prenom VARCHAR(55) DEFAULT NULL, societe VARCHAR(255) DEFAULT NULL, type_societe VARCHAR(255) DEFAULT NULL, fk_tiers VARCHAR(55) DEFAULT NULL, interets TEXT DEFAULT NULL, fonction VARCHAR(55) DEFAULT NULL, siret VARCHAR(15) DEFAULT NULL, telephone VARCHAR(15) DEFAULT NULL, gsm VARCHAR(15) DEFAULT NULL, rue1 VARCHAR(35) DEFAULT NULL, rue2 VARCHAR(35) DEFAULT NULL, rue3 VARCHAR(35) DEFAULT NULL, cp VARCHAR(10) DEFAULT NULL, ville VARCHAR(55) DEFAULT NULL, taille VARCHAR(255) DEFAULT NULL, fk_agence VARCHAR(55) DEFAULT NULL, pays VARCHAR(35) DEFAULT NULL, profil VARCHAR(255) DEFAULT NULL, pass VARCHAR(255) DEFAULT NULL, newsletter VARCHAR(255) DEFAULT NULL, import_crm VARCHAR(255) DEFAULT NULL, valide CHAR(1) DEFAULT 'O' , catalogue VARCHAR(255) DEFAULT NULL, cata_type VARCHAR(255) DEFAULT NULL, lang VARCHAR(2) DEFAULT 'FR' , sub_date VARCHAR(55) DEFAULT NULL, valide_par VARCHAR(255) DEFAULT NULL, valide_le INT DEFAULT NULL, log_valid TEXT DEFAULT NULL, charge_dev VARCHAR(255) DEFAULT NULL, last_log INT DEFAULT NULL, fk_crm_abo_news_ggm VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, PRIMARY KEY(pk_ggm_contact)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB");
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE ggm_contact');
        $this->addSql('DROP TABLE user');
    }
}
