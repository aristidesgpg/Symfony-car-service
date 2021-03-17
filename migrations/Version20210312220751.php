<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210312220751 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL, CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation ADD labor_tax DOUBLE PRECISION DEFAULT NULL, ADD parts_tax DOUBLE PRECISION DEFAULT NULL, ADD supplies_tax DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL, CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation DROP labor_tax, DROP parts_tax, DROP supplies_tax');
    }
}
