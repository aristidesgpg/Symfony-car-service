<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201123043219 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coupon (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, added_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, mobile_confirmed TINYINT(1) NOT NULL, email VARCHAR(255) DEFAULT NULL, do_not_contact TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_81398E0955B127A4 (added_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forgot_password (id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, token VARCHAR(255) NOT NULL, expiration_date DATETIME NOT NULL, used TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mpi_group (id INT AUTO_INCREMENT NOT NULL, mpi_template_id INT NOT NULL, name VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_AF61E3012A582CD2 (mpi_template_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mpi_item (id INT AUTO_INCREMENT NOT NULL, mpi_group_id INT NOT NULL, name VARCHAR(255) NOT NULL, has_range TINYINT(1) NOT NULL, range_maximum INT DEFAULT NULL, range_unit VARCHAR(255) DEFAULT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_694346A228655E49 (mpi_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mpi_template (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone_lookup (phone_number VARCHAR(12) NOT NULL, carrier_name VARCHAR(255) DEFAULT NULL, carrier_type VARCHAR(8) DEFAULT NULL, created DATETIME NOT NULL, PRIMARY KEY(phone_number)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order (id INT AUTO_INCREMENT NOT NULL, primary_customer_id INT NOT NULL, primary_technician_id INT DEFAULT NULL, primary_advisor_id INT NOT NULL, number VARCHAR(255) NOT NULL, video_status VARCHAR(255) NOT NULL, mpi_status VARCHAR(255) NOT NULL, quote_status VARCHAR(255) NOT NULL, payment_status VARCHAR(255) NOT NULL, start_value DOUBLE PRECISION DEFAULT NULL, final_value DOUBLE PRECISION DEFAULT NULL, approved_value DOUBLE PRECISION DEFAULT NULL, date_created DATETIME NOT NULL, date_closed DATETIME DEFAULT NULL, waiter TINYINT(1) NOT NULL, pickup_date DATETIME DEFAULT NULL, link_hash VARCHAR(255) NOT NULL, year INT DEFAULT NULL, make VARCHAR(255) DEFAULT NULL, model VARCHAR(255) DEFAULT NULL, miles INT DEFAULT NULL, vin VARCHAR(255) DEFAULT NULL, internal TINYINT(1) NOT NULL, dms_key VARCHAR(255) DEFAULT NULL, waiver LONGTEXT DEFAULT NULL, waiver_verbiage LONGTEXT DEFAULT NULL, upgrade_que TINYINT(1) NOT NULL, note LONGTEXT DEFAULT NULL, deleted TINYINT(1) NOT NULL, archived TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_55F6573496901F54 (number), INDEX IDX_55F65734377AA372 (primary_customer_id), INDEX IDX_55F6573489EFB82B (primary_technician_id), INDEX IDX_55F6573458774111 (primary_advisor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order_mpi (id INT AUTO_INCREMENT NOT NULL, repair_order_id INT DEFAULT NULL, date_completed DATETIME NOT NULL, date_sent DATETIME DEFAULT NULL, results LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_A6298C12E4071493 (repair_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order_mpi_interaction (id INT AUTO_INCREMENT NOT NULL, repair_order_mpi_id INT NOT NULL, user_id INT NOT NULL, customer_id INT NOT NULL, type VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_D01E481EAC67FDA3 (repair_order_mpi_id), INDEX IDX_D01E481EA76ED395 (user_id), INDEX IDX_D01E481E9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE settings (setting_key VARCHAR(255) NOT NULL, setting_value LONGTEXT DEFAULT NULL, PRIMARY KEY(setting_key)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, extension VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, certification VARCHAR(255) DEFAULT NULL, experience VARCHAR(255) DEFAULT NULL, security_question VARCHAR(255) DEFAULT NULL, security_answer VARCHAR(255) DEFAULT NULL, preview_device_tokens LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', force_authentication TINYINT(1) NOT NULL, last_login DATETIME DEFAULT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E0955B127A4 FOREIGN KEY (added_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE mpi_group ADD CONSTRAINT FK_AF61E3012A582CD2 FOREIGN KEY (mpi_template_id) REFERENCES mpi_template (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mpi_item ADD CONSTRAINT FK_694346A228655E49 FOREIGN KEY (mpi_group_id) REFERENCES mpi_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE repair_order ADD CONSTRAINT FK_55F65734377AA372 FOREIGN KEY (primary_customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE repair_order ADD CONSTRAINT FK_55F6573489EFB82B FOREIGN KEY (primary_technician_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repair_order ADD CONSTRAINT FK_55F6573458774111 FOREIGN KEY (primary_advisor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repair_order_mpi ADD CONSTRAINT FK_A6298C12E4071493 FOREIGN KEY (repair_order_id) REFERENCES repair_order (id)');
        $this->addSql('ALTER TABLE repair_order_mpi_interaction ADD CONSTRAINT FK_D01E481EAC67FDA3 FOREIGN KEY (repair_order_mpi_id) REFERENCES repair_order_mpi (id)');
        $this->addSql('ALTER TABLE repair_order_mpi_interaction ADD CONSTRAINT FK_D01E481EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repair_order_mpi_interaction ADD CONSTRAINT FK_D01E481E9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order DROP FOREIGN KEY FK_55F65734377AA372');
        $this->addSql('ALTER TABLE repair_order_mpi_interaction DROP FOREIGN KEY FK_D01E481E9395C3F3');
        $this->addSql('ALTER TABLE mpi_item DROP FOREIGN KEY FK_694346A228655E49');
        $this->addSql('ALTER TABLE mpi_group DROP FOREIGN KEY FK_AF61E3012A582CD2');
        $this->addSql('ALTER TABLE repair_order_mpi DROP FOREIGN KEY FK_A6298C12E4071493');
        $this->addSql('ALTER TABLE repair_order_mpi_interaction DROP FOREIGN KEY FK_D01E481EAC67FDA3');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E0955B127A4');
        $this->addSql('ALTER TABLE repair_order DROP FOREIGN KEY FK_55F6573489EFB82B');
        $this->addSql('ALTER TABLE repair_order DROP FOREIGN KEY FK_55F6573458774111');
        $this->addSql('ALTER TABLE repair_order_mpi_interaction DROP FOREIGN KEY FK_D01E481EA76ED395');
        $this->addSql('DROP TABLE coupon');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE forgot_password');
        $this->addSql('DROP TABLE mpi_group');
        $this->addSql('DROP TABLE mpi_item');
        $this->addSql('DROP TABLE mpi_template');
        $this->addSql('DROP TABLE phone_lookup');
        $this->addSql('DROP TABLE repair_order');
        $this->addSql('DROP TABLE repair_order_mpi');
        $this->addSql('DROP TABLE repair_order_mpi_interaction');
        $this->addSql('DROP TABLE settings');
        $this->addSql('DROP TABLE user');
    }
}
