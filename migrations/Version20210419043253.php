<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210419043253 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL, CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote_log CHANGE data data LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation DROP FOREIGN KEY FK_C5F8B26C841B7EDA');
        $this->addSql('DROP INDEX IDX_A6055720841B7EDA ON repair_order_quote_recommendation');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation ADD operation_code VARCHAR(255) NOT NULL, DROP operation_code_id');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation_part DROP FOREIGN KEY FK_7DA7C1464CE34BEC');
        $this->addSql('DROP INDEX IDX_7DA7C1464CE34BEC ON repair_order_quote_recommendation_part');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation_part ADD bin VARCHAR(255) DEFAULT NULL, DROP part_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL, CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote_log CHANGE data data JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation ADD operation_code_id INT NOT NULL, DROP operation_code');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation ADD CONSTRAINT FK_C5F8B26C841B7EDA FOREIGN KEY (operation_code_id) REFERENCES operation_code (id)');
        $this->addSql('CREATE INDEX IDX_A6055720841B7EDA ON repair_order_quote_recommendation (operation_code_id)');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation_part ADD part_id INT NOT NULL, DROP bin');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation_part ADD CONSTRAINT FK_7DA7C1464CE34BEC FOREIGN KEY (part_id) REFERENCES part (id)');
        $this->addSql('CREATE INDEX IDX_7DA7C1464CE34BEC ON repair_order_quote_recommendation_part (part_id)');
    }
}
