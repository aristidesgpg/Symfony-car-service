<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210519004622 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order ADD mpi_status_timestamp DATETIME DEFAULT NULL, ADD video_status_timestamp DATETIME DEFAULT NULL, ADD quote_status_timestamp DATETIME DEFAULT NULL, ADD i_pay_status_timestamp DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order DROP mpi_status_timestamp, DROP video_status_timestamp, DROP quote_status_timestamp, DROP i_pay_status_timestamp');
    }
}
