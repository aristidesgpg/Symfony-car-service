<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201201153648 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE repair_order_video (id INT AUTO_INCREMENT NOT NULL, repair_order_id INT NOT NULL, technician_id INT DEFAULT NULL, path VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, short_url VARCHAR(255) DEFAULT NULL, date_created DATETIME NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_2A5DC5F0E4071493 (repair_order_id), INDEX IDX_2A5DC5F0E6C5D496 (technician_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order_video_interaction (id INT AUTO_INCREMENT NOT NULL, repair_order_video_id INT DEFAULT NULL, user_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_A67624BA70D2B888 (repair_order_video_id), INDEX IDX_A67624BAA76ED395 (user_id), INDEX IDX_A67624BA9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_order_video ADD CONSTRAINT FK_2A5DC5F0E4071493 FOREIGN KEY (repair_order_id) REFERENCES repair_order (id)');
        $this->addSql('ALTER TABLE repair_order_video ADD CONSTRAINT FK_2A5DC5F0E6C5D496 FOREIGN KEY (technician_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repair_order_video_interaction ADD CONSTRAINT FK_A67624BA70D2B888 FOREIGN KEY (repair_order_video_id) REFERENCES repair_order_video (id)');
        $this->addSql('ALTER TABLE repair_order_video_interaction ADD CONSTRAINT FK_A67624BAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repair_order_video_interaction ADD CONSTRAINT FK_A67624BA9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_video_interaction DROP FOREIGN KEY FK_A67624BA70D2B888');
        $this->addSql('DROP TABLE repair_order_video');
        $this->addSql('DROP TABLE repair_order_video_interaction');
    }
}
