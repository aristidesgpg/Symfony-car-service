<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210401202512 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE repair_order_quote_recommendation_part (id INT AUTO_INCREMENT NOT NULL, repair_order_recommendation_id INT NOT NULL, part_id INT NOT NULL, number VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, quantity DOUBLE PRECISION DEFAULT NULL, total_price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_7DA7C146620AFCB7 (repair_order_recommendation_id), INDEX IDX_7DA7C1464CE34BEC (part_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation_part ADD CONSTRAINT FK_7DA7C146620AFCB7 FOREIGN KEY (repair_order_recommendation_id) REFERENCES repair_order_quote_recommendation (id)');
        $this->addSql('ALTER TABLE repair_order_quote_recommendation_part ADD CONSTRAINT FK_7DA7C1464CE34BEC FOREIGN KEY (part_id) REFERENCES part (id)');
        $this->addSql('ALTER TABLE part ADD price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL, CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote ADD completed_user_id INT DEFAULT NULL, ADD date_completed DATETIME DEFAULT NULL, ADD date_confirmed DATETIME DEFAULT NULL, ADD subtotal DOUBLE PRECISION DEFAULT NULL, ADD tax DOUBLE PRECISION DEFAULT NULL, ADD total DOUBLE PRECISION DEFAULT NULL, DROP date_customer_completed, DROP date_customer_confirmed');
        $this->addSql('ALTER TABLE repair_order_quote ADD CONSTRAINT FK_3DEBD428E06238F1 FOREIGN KEY (completed_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3DEBD428E06238F1 ON repair_order_quote (completed_user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE repair_order_quote_recommendation_part');
        $this->addSql('ALTER TABLE part DROP price');
        $this->addSql('ALTER TABLE repair_order_payment CHANGE amount amount NUMERIC(8, 2) NOT NULL, CHANGE refunded_amount refunded_amount NUMERIC(8, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE repair_order_quote DROP FOREIGN KEY FK_3DEBD428E06238F1');
        $this->addSql('DROP INDEX IDX_3DEBD428E06238F1 ON repair_order_quote');
        $this->addSql('ALTER TABLE repair_order_quote ADD date_customer_completed DATETIME DEFAULT NULL, ADD date_customer_confirmed DATETIME DEFAULT NULL, DROP completed_user_id, DROP date_completed, DROP date_confirmed, DROP subtotal, DROP tax, DROP total');
    }
}
