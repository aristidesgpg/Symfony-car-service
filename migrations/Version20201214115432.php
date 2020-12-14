<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201214115432 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE internal_message (id INT AUTO_INCREMENT NOT NULL, from_id_id INT NOT NULL, to_id_id INT NOT NULL, message LONGTEXT NOT NULL, date DATETIME NOT NULL, is_read TINYINT(1) NOT NULL, INDEX IDX_AEA571494632BB48 (from_id_id), INDEX IDX_AEA571497478AF67 (to_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE internal_message ADD CONSTRAINT FK_AEA571494632BB48 FOREIGN KEY (from_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE internal_message ADD CONSTRAINT FK_AEA571497478AF67 FOREIGN KEY (to_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE internal_message');
    }
}
