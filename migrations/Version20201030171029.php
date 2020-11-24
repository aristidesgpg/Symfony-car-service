<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201030171029 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE operation_code (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, labor_hours DOUBLE PRECISION NOT NULL, labor_taxable TINYINT(1) NOT NULL, parts_price DOUBLE PRECISION NOT NULL, parts_taxable TINYINT(1) NOT NULL, supplies_price DOUBLE PRECISION NOT NULL, supplies_taxable TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_58656D0977153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE operation_code');
    }
}
