<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210129204638 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE repair_order_review (id INT AUTO_INCREMENT NOT NULL, repair_order_id INT NOT NULL, status VARCHAR(15) NOT NULL, date_sent DATETIME DEFAULT NULL, date_viewed DATETIME DEFAULT NULL, date_completed DATETIME DEFAULT NULL, rating VARCHAR(15) DEFAULT NULL, platform VARCHAR(15) DEFAULT NULL, UNIQUE INDEX UNIQ_F6708526E4071493 (repair_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order_review_interactions (id INT AUTO_INCREMENT NOT NULL, repair_order_review_id INT NOT NULL, user_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, type VARCHAR(15) DEFAULT NULL, INDEX IDX_15F34E14C70E2A6 (repair_order_review_id), INDEX IDX_15F34E1A76ED395 (user_id), INDEX IDX_15F34E19395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_order_review ADD CONSTRAINT FK_F6708526E4071493 FOREIGN KEY (repair_order_id) REFERENCES repair_order (id)');
        $this->addSql('ALTER TABLE repair_order_review_interactions ADD CONSTRAINT FK_15F34E14C70E2A6 FOREIGN KEY (repair_order_review_id) REFERENCES repair_order_review (id)');
        $this->addSql('ALTER TABLE repair_order_review_interactions ADD CONSTRAINT FK_15F34E1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repair_order_review_interactions ADD CONSTRAINT FK_15F34E19395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE user DROP external_authentication');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_review_interactions DROP FOREIGN KEY FK_15F34E14C70E2A6');
        $this->addSql('DROP TABLE repair_order_review');
        $this->addSql('DROP TABLE repair_order_review_interactions');
        $this->addSql('ALTER TABLE user ADD external_authentication TINYINT(1) NOT NULL');
    }
}
