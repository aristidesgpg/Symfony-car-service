<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124171701 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE operation_code (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, labor_hours DOUBLE PRECISION NOT NULL, labor_taxable TINYINT(1) NOT NULL, parts_price DOUBLE PRECISION NOT NULL, parts_taxable TINYINT(1) NOT NULL, supplies_price DOUBLE PRECISION NOT NULL, supplies_taxable TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_58656D0977153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order_quote (id INT AUTO_INCREMENT NOT NULL, repair_order_id INT NOT NULL, date_created DATETIME NOT NULL, date_sent DATETIME DEFAULT NULL, date_customer_viewed DATETIME DEFAULT NULL, date_customer_completed DATETIME DEFAULT NULL, date_completed_viewed DATETIME DEFAULT NULL, deleted TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_3DEBD428E4071493 (repair_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order_quote_recommendation (id INT AUTO_INCREMENT NOT NULL, repair_order_quote_id INT NOT NULL, operation_code_id INT NOT NULL, description VARCHAR(255) DEFAULT NULL, pre_approved TINYINT(1) DEFAULT NULL, approved TINYINT(1) DEFAULT NULL, parts_price DOUBLE PRECISION DEFAULT NULL, supplies_price DOUBLE PRECISION DEFAULT NULL, labor_price DOUBLE PRECISION DEFAULT NULL, notes VARCHAR(255) DEFAULT NULL, INDEX IDX_C5F8B26C8293E9BE (repair_order_quote_id), INDEX IDX_C5F8B26C841B7EDA (operation_code_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_order_quote ADD CONSTRAINT FK_3DEBD428E4071493 FOREIGN KEY (repair_order_id) REFERENCES repair_order (id)');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation ADD CONSTRAINT FK_C5F8B26C8293E9BE FOREIGN KEY (repair_order_quote_id) REFERENCES repair_order_quote (id)');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation ADD CONSTRAINT FK_C5F8B26C841B7EDA FOREIGN KEY (operation_code_id) REFERENCES operation_code (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_quote_recommendation DROP FOREIGN KEY FK_C5F8B26C841B7EDA');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation DROP FOREIGN KEY FK_C5F8B26C8293E9BE');
        $this->addSql('DROP TABLE operation_code');
        $this->addSql('DROP TABLE repair_order_quote');
        $this->addSql('DROP TABLE repair_order_quote_recommendation');
    }
}
