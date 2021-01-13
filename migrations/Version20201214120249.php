<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201214120249 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE internal_message (id INT AUTO_INCREMENT NOT NULL, from_id INT NOT NULL, to_id INT NOT NULL, message LONGTEXT NOT NULL, date DATETIME NOT NULL, is_read TINYINT(1) NOT NULL, INDEX IDX_AEA5714978CED90B (from_id), INDEX IDX_AEA5714930354A65 (to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE internal_message ADD CONSTRAINT FK_AEA5714978CED90B FOREIGN KEY (from_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE internal_message ADD CONSTRAINT FK_AEA5714930354A65 FOREIGN KEY (to_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE internal_message');
    }
}
