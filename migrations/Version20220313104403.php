<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220313104403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE intervenant (id INT AUTO_INCREMENT NOT NULL, cat_astreinte_id INT DEFAULT NULL, id_responsable_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, trigramme VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, salaire INT NOT NULL, INDEX IDX_73D0145C27F7CCA (cat_astreinte_id), INDEX IDX_73D0145C6EA32074 (id_responsable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE intervenant ADD CONSTRAINT FK_73D0145C27F7CCA FOREIGN KEY (cat_astreinte_id) REFERENCES astreinte (id)');
        $this->addSql('ALTER TABLE intervenant ADD CONSTRAINT FK_73D0145C6EA32074 FOREIGN KEY (id_responsable_id) REFERENCES intervenant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145C6EA32074');
        $this->addSql('DROP TABLE intervenant');
        $this->addSql('ALTER TABLE astreinte CHANGE categorie categorie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client CHANGE societe societe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal code_postal VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact contact VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail_client mail_client VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE rh CHANGE nom_rh nom_rh VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom_rh prenom_rh VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail_rh mail_rh VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
