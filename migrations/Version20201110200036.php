<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201110200036 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mpiitem DROP FOREIGN KEY FK_D65210A4AA3D9B9A');
        $this->addSql('ALTER TABLE inspection_group DROP FOREIGN KEY FK_79EB0AE9B4CD962C');
        $this->addSql('DROP TABLE inspection_group');
        $this->addSql('DROP TABLE mpiitem');
        $this->addSql('DROP TABLE mpitemplate');
        $this->addSql('DROP TABLE phone_lookup');
        $this->addSql('DROP TABLE setting');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E0955B127A4');
        $this->addSql('DROP INDEX IDX_81398E0955B127A4 ON customer');
        $this->addSql('ALTER TABLE customer DROP deleted, CHANGE added_by_id added_by INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inspection_group (id INT AUTO_INCREMENT NOT NULL, mpi_template_id_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, active TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_79EB0AE9B4CD962C (mpi_template_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mpiitem (id INT AUTO_INCREMENT NOT NULL, mpi_inspection_group_id_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, has_range TINYINT(1) NOT NULL, range_maximum INT DEFAULT NULL, range_unit VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, deleted TINYINT(1) NOT NULL, INDEX IDX_D65210A4AA3D9B9A (mpi_inspection_group_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mpitemplate (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, active TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE phone_lookup (phone_number VARCHAR(12) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, carrier_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, carrier_type VARCHAR(8) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created DATETIME NOT NULL, PRIMARY KEY(phone_number)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE setting (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, value VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE inspection_group ADD CONSTRAINT FK_79EB0AE9B4CD962C FOREIGN KEY (mpi_template_id_id) REFERENCES mpitemplate (id)');
        $this->addSql('ALTER TABLE mpiitem ADD CONSTRAINT FK_D65210A4AA3D9B9A FOREIGN KEY (mpi_inspection_group_id_id) REFERENCES inspection_group (id)');
        $this->addSql('ALTER TABLE customer ADD deleted TINYINT(1) NOT NULL, CHANGE added_by added_by_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E0955B127A4 FOREIGN KEY (added_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_81398E0955B127A4 ON customer (added_by_id)');
    }
}
