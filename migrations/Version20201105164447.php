<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201105164447 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coupon (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, mobile_confirmed TINYINT(1) NOT NULL, email VARCHAR(255) DEFAULT NULL, do_not_contact TINYINT(1) NOT NULL, added_by INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mpi_group (id INT AUTO_INCREMENT NOT NULL, mpi_template_id INT NOT NULL, name VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_79EB0AE9B4CD962C (mpi_template_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mpi_item (id INT AUTO_INCREMENT NOT NULL, mpi_group_id INT NOT NULL, name VARCHAR(255) NOT NULL, has_range TINYINT(1) NOT NULL, range_maximum INT DEFAULT NULL, range_unit VARCHAR(255) DEFAULT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_D65210A4AA3D9B9A (mpi_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mpi_template (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order (id INT AUTO_INCREMENT NOT NULL, primary_customer_id INT NOT NULL, primary_technician_id INT NOT NULL, primary_advisor INT NOT NULL, `number` VARCHAR(255) NOT NULL, video_status VARCHAR(255) NOT NULL, mpi_status VARCHAR(255) NOT NULL, quote_status VARCHAR(255) NOT NULL, payment_status VARCHAR(255) NOT NULL, start_value DOUBLE PRECISION DEFAULT NULL, final_value DOUBLE PRECISION DEFAULT NULL, approved_value DOUBLE PRECISION DEFAULT NULL, date_created DATETIME NOT NULL, date_closed DATETIME DEFAULT NULL, waiter TINYINT(1) NOT NULL, pickup_date DATETIME DEFAULT NULL, link_hash VARCHAR(255) NOT NULL, year INT DEFAULT NULL, make VARCHAR(255) DEFAULT NULL, model VARCHAR(255) DEFAULT NULL, miles INT DEFAULT NULL, vin VARCHAR(255) DEFAULT NULL, internal TINYINT(1) NOT NULL, dms_key VARCHAR(255) DEFAULT NULL, waiver LONGTEXT DEFAULT NULL, waiver_verbiage LONGTEXT DEFAULT NULL, upgrade_que TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_55F65734DB852B8B (`number`), INDEX IDX_55F65734377AA372 (primary_customer_id), INDEX IDX_55F6573489EFB82B (primary_technician_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE settings (setting_key VARCHAR(255) NOT NULL, setting_value LONGTEXT DEFAULT NULL, PRIMARY KEY(setting_key)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, extension VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, certification VARCHAR(255) DEFAULT NULL, experience VARCHAR(255) DEFAULT NULL, security_question VARCHAR(255) DEFAULT NULL, security_answer VARCHAR(255) DEFAULT NULL, preview_device_tokens LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', force_authentication TINYINT(1) NOT NULL, last_login DATETIME DEFAULT NULL, pin VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mpi_group ADD CONSTRAINT FK_79EB0AE9B4CD962C FOREIGN KEY (mpi_template_id) REFERENCES mpi_template (id)');
        $this->addSql('ALTER TABLE mpi_item ADD CONSTRAINT FK_D65210A4AA3D9B9A FOREIGN KEY (mpi_group_id) REFERENCES mpi_group (id)');
        $this->addSql('ALTER TABLE repair_order ADD CONSTRAINT FK_55F65734377AA372 FOREIGN KEY (primary_customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE repair_order ADD CONSTRAINT FK_55F6573489EFB82B FOREIGN KEY (primary_technician_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order DROP FOREIGN KEY FK_55F65734377AA372');
        $this->addSql('ALTER TABLE mpi_item DROP FOREIGN KEY FK_D65210A4AA3D9B9A');
        $this->addSql('ALTER TABLE mpi_group DROP FOREIGN KEY FK_79EB0AE9B4CD962C');
        $this->addSql('ALTER TABLE repair_order DROP FOREIGN KEY FK_55F6573489EFB82B');
        $this->addSql('DROP TABLE coupon');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE mpi_group');
        $this->addSql('DROP TABLE mpi_item');
        $this->addSql('DROP TABLE mpi_template');
        $this->addSql('DROP TABLE repair_order');
        $this->addSql('DROP TABLE settings');
        $this->addSql('DROP TABLE user');
    }
}
