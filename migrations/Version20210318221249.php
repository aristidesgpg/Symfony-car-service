<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318221249 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE repair_order_quote_interaction (id INT AUTO_INCREMENT NOT NULL, repair_order_quote_id INT NOT NULL, user_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_D8F7A8658293E9BE (repair_order_quote_id), INDEX IDX_D8F7A865A76ED395 (user_id), INDEX IDX_D8F7A8659395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_order_quote_interaction ADD CONSTRAINT FK_D8F7A8658293E9BE FOREIGN KEY (repair_order_quote_id) REFERENCES repair_order_quote (id)');
        $this->addSql('ALTER TABLE repair_order_quote_interaction ADD CONSTRAINT FK_D8F7A865A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repair_order_quote_interaction ADD CONSTRAINT FK_D8F7A8659395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE repair_order DROP archived');
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL, CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote ADD status VARCHAR(255) NOT NULL, CHANGE date_completed_viewed date_customer_confirmed DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE repair_order_quote_interaction');
        $this->addSql('ALTER TABLE repair_order ADD archived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL, CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote DROP status, CHANGE date_customer_confirmed date_completed_viewed DATETIME DEFAULT NULL');
    }
}
