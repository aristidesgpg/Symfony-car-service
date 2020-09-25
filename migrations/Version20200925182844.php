<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200925182844 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order CHANGE primary_customer primary_customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE repair_order ADD CONSTRAINT FK_55F65734377AA372 FOREIGN KEY (primary_customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_55F65734377AA372 ON repair_order (primary_customer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order DROP FOREIGN KEY FK_55F65734377AA372');
        $this->addSql('DROP INDEX IDX_55F65734377AA372 ON repair_order');
        $this->addSql('ALTER TABLE repair_order CHANGE primary_customer_id primary_customer INT NOT NULL');
    }
}
