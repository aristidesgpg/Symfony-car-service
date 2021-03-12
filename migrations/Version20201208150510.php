<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201208150510 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_quote_recommendation RENAME INDEX idx_c5f8b26c8293e9be TO IDX_A60557208293E9BE');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation RENAME INDEX idx_c5f8b26c841b7eda TO IDX_A6055720841B7EDA');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_quote_recommendation RENAME INDEX idx_a60557208293e9be TO IDX_C5F8B26C8293E9BE');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation RENAME INDEX idx_a6055720841b7eda TO IDX_C5F8B26C841B7EDA');
    }
}
