<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210108213957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE payment_response (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, code INT NOT NULL, response_text VARCHAR(255) NOT NULL, raw_response LONGTEXT NOT NULL, created DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order_payment (id INT AUTO_INCREMENT NOT NULL, repair_order_id INT DEFAULT NULL, amount NUMERIC(8, 2) NOT NULL, transaction_id VARCHAR(255) DEFAULT NULL, refunded_amount NUMERIC(8, 2) DEFAULT NULL, date_created DATETIME NOT NULL, date_sent DATETIME DEFAULT NULL, date_viewed DATETIME DEFAULT NULL, date_paid DATETIME DEFAULT NULL, date_paid_viewed DATETIME DEFAULT NULL, date_refunded DATETIME DEFAULT NULL, date_deleted DATETIME DEFAULT NULL, deleted TINYINT(1) NOT NULL, card_type INT DEFAULT NULL, card_number VARCHAR(4) DEFAULT NULL, INDEX IDX_CDAD5571E4071493 (repair_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order_payment_interaction (id INT AUTO_INCREMENT NOT NULL, repair_order_payment_id INT DEFAULT NULL, user_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_CA1896DA5CD9B1DE (repair_order_payment_id), INDEX IDX_CA1896DAA76ED395 (user_id), INDEX IDX_CA1896DA9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_order_payment ADD CONSTRAINT FK_CDAD5571E4071493 FOREIGN KEY (repair_order_id) REFERENCES repair_order (id)');
        $this->addSql('ALTER TABLE repair_order_payment_interaction ADD CONSTRAINT FK_CA1896DA5CD9B1DE FOREIGN KEY (repair_order_payment_id) REFERENCES repair_order_payment (id)');
        $this->addSql('ALTER TABLE repair_order_payment_interaction ADD CONSTRAINT FK_CA1896DAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repair_order_payment_interaction ADD CONSTRAINT FK_CA1896DA9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_payment_interaction DROP FOREIGN KEY FK_CA1896DA5CD9B1DE');
        $this->addSql('DROP TABLE payment_response');
        $this->addSql('DROP TABLE repair_order_payment');
        $this->addSql('DROP TABLE repair_order_payment_interaction');
    }
}
