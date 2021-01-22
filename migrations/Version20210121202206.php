<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210121202206 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE repair_order_note (id INT AUTO_INCREMENT NOT NULL, repair_order_id INT NOT NULL, note LONGTEXT DEFAULT NULL, date_created DATETIME NOT NULL, INDEX IDX_E6660521E4071493 (repair_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_order_note ADD CONSTRAINT FK_E6660521E4071493 FOREIGN KEY (repair_order_id) REFERENCES repair_order (id)');
        $this->addSql('ALTER TABLE customer CHANGE phone phone VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order DROP note');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE repair_order_note');
        $this->addSql('ALTER TABLE customer CHANGE phone phone VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE repair_order ADD note LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
