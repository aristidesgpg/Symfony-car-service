<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210409221209 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE repair_order_quote_log (id INT AUTO_INCREMENT NOT NULL, repair_order_quote_id INT NOT NULL, user_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, date DATETIME NOT NULL, data JSON DEFAULT NULL, INDEX IDX_C8B00D348293E9BE (repair_order_quote_id), INDEX IDX_C8B00D34A76ED395 (user_id), INDEX IDX_C8B00D349395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_order_quote_log ADD CONSTRAINT FK_C8B00D348293E9BE FOREIGN KEY (repair_order_quote_id) REFERENCES repair_order_quote (id)');
        $this->addSql('ALTER TABLE repair_order_quote_log ADD CONSTRAINT FK_C8B00D34A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repair_order_quote_log ADD CONSTRAINT FK_C8B00D349395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL, CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation ADD labor_hours DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE repair_order_quote_log');
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL, CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation DROP labor_hours');
    }
}
