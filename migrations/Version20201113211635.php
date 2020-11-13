<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201113211635 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mpi_item DROP FOREIGN KEY FK_694346A228655E49');
        $this->addSql('ALTER TABLE mpi_group DROP FOREIGN KEY FK_AF61E3012A582CD2');
        $this->addSql('DROP TABLE mpi_group');
        $this->addSql('DROP TABLE mpi_item');
        $this->addSql('DROP TABLE mpi_template');
        $this->addSql('DROP TABLE test');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mpi_group (id INT AUTO_INCREMENT NOT NULL, mpi_template_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, active TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_AF61E3012A582CD2 (mpi_template_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mpi_item (id INT AUTO_INCREMENT NOT NULL, mpi_group_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, has_range TINYINT(1) NOT NULL, range_maximum INT DEFAULT NULL, range_unit VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, deleted TINYINT(1) NOT NULL, INDEX IDX_694346A228655E49 (mpi_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mpi_template (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, active TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE mpi_group ADD CONSTRAINT FK_AF61E3012A582CD2 FOREIGN KEY (mpi_template_id) REFERENCES mpi_template (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mpi_item ADD CONSTRAINT FK_694346A228655E49 FOREIGN KEY (mpi_group_id) REFERENCES mpi_group (id) ON DELETE CASCADE');
    }
}
