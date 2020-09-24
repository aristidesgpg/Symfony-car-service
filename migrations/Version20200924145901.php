<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200924145901 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order CHANGE primary_technician primary_technician_id INT NOT NULL');
        $this->addSql('ALTER TABLE repair_order ADD CONSTRAINT FK_55F6573489EFB82B FOREIGN KEY (primary_technician_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_55F6573489EFB82B ON repair_order (primary_technician_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order DROP FOREIGN KEY FK_55F6573489EFB82B');
        $this->addSql('DROP INDEX IDX_55F6573489EFB82B ON repair_order');
        $this->addSql('ALTER TABLE repair_order CHANGE primary_technician_id primary_technician INT NOT NULL');
    }
}
