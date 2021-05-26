<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210505172211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL COMMENT \'(DC2Type:money)\', CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL COMMENT \'(DC2Type:money)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL, CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL');
    }
}
