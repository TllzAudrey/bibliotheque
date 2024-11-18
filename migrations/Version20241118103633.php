<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241118103633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre ADD emprupt_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9971AFC677 FOREIGN KEY (emprupt_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AC634F9971AFC677 ON livre (emprupt_id)');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(100) NOT NULL, ADD prenom VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9971AFC677');
        $this->addSql('DROP INDEX UNIQ_AC634F9971AFC677 ON livre');
        $this->addSql('ALTER TABLE livre DROP emprupt_id');
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom');
    }
}
