<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210130211203 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_mpi ADD date_viewed DATETIME DEFAULT NULL, ADD status VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE repair_order_mpi_interaction CHANGE user_id user_id INT DEFAULT NULL, CHANGE customer_id customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_video ADD date_uploaded DATETIME DEFAULT NULL, ADD date_sent DATETIME DEFAULT NULL, ADD date_viewed DATETIME DEFAULT NULL, DROP date_created');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_mpi DROP date_viewed, DROP status');
        $this->addSql('ALTER TABLE repair_order_mpi_interaction CHANGE user_id user_id INT NOT NULL, CHANGE customer_id customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE repair_order_video ADD date_created DATETIME NOT NULL, DROP date_uploaded, DROP date_sent, DROP date_viewed');
    }
}
