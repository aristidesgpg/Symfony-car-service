<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201002152543 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, mobile_confirmed TINYINT(1) NOT NULL, email VARCHAR(255) DEFAULT NULL, do_not_contact TINYINT(1) NOT NULL, added_by INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order (id INT AUTO_INCREMENT NOT NULL, primary_customer_id INT NOT NULL, primary_technician_id INT NOT NULL, primary_advisor INT NOT NULL, `number` VARCHAR(255) NOT NULL, video_status VARCHAR(255) NOT NULL, mpi_status VARCHAR(255) NOT NULL, quote_status VARCHAR(255) NOT NULL, payment_status VARCHAR(255) NOT NULL, start_value DOUBLE PRECISION DEFAULT NULL, final_value DOUBLE PRECISION DEFAULT NULL, approved_value DOUBLE PRECISION DEFAULT NULL, date_created DATETIME NOT NULL, date_closed DATETIME DEFAULT NULL, waiter TINYINT(1) NOT NULL, pickup_date DATETIME DEFAULT NULL, link_hash VARCHAR(255) NOT NULL, year INT DEFAULT NULL, make VARCHAR(255) DEFAULT NULL, model VARCHAR(255) DEFAULT NULL, miles INT DEFAULT NULL, vin VARCHAR(255) DEFAULT NULL, internal TINYINT(1) NOT NULL, dms_key VARCHAR(255) DEFAULT NULL, waiver LONGTEXT DEFAULT NULL, waiver_verbiage LONGTEXT DEFAULT NULL, upgrade_que TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_55F65734DB852B8B (`number`), INDEX IDX_55F65734377AA372 (primary_customer_id), INDEX IDX_55F6573489EFB82B (primary_technician_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, extension VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, roles JSON DEFAULT NULL, certification VARCHAR(255) DEFAULT NULL, experience VARCHAR(255) DEFAULT NULL, security_question VARCHAR(255) DEFAULT NULL, security_answer VARCHAR(255) DEFAULT NULL, preview_device_tokens LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', force_authentication TINYINT(1) NOT NULL, last_login DATETIME DEFAULT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_order ADD CONSTRAINT FK_55F65734377AA372 FOREIGN KEY (primary_customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE repair_order ADD CONSTRAINT FK_55F6573489EFB82B FOREIGN KEY (primary_technician_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order DROP FOREIGN KEY FK_55F65734377AA372');
        $this->addSql('ALTER TABLE repair_order DROP FOREIGN KEY FK_55F6573489EFB82B');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE repair_order');
        $this->addSql('DROP TABLE setting');
        $this->addSql('DROP TABLE user');
    }
}
