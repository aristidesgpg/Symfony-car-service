<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201118152745 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE repair_order_mpi (id INT AUTO_INCREMENT NOT NULL, repair_order_id INT DEFAULT NULL, date_completed DATETIME NOT NULL, date_sent DATETIME DEFAULT NULL, results TEXT DEFAULT NULL, UNIQUE INDEX UNIQ_A6298C12E4071493 (repair_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair_order_mpi_interaction (id INT AUTO_INCREMENT NOT NULL, repair_order_mpi_id INT NOT NULL, user_id INT NOT NULL, customer_id INT NOT NULL, type VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_D01E481EAC67FDA3 (repair_order_mpi_id), INDEX IDX_D01E481EA76ED395 (user_id), INDEX IDX_D01E481E9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repair_order_mpi ADD CONSTRAINT FK_A6298C12E4071493 FOREIGN KEY (repair_order_id) REFERENCES repair_order (id)');
        $this->addSql('ALTER TABLE repair_order_mpi_interaction ADD CONSTRAINT FK_D01E481EAC67FDA3 FOREIGN KEY (repair_order_mpi_id) REFERENCES repair_order_mpi (id)');
        $this->addSql('ALTER TABLE repair_order_mpi_interaction ADD CONSTRAINT FK_D01E481EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE repair_order_mpi_interaction ADD CONSTRAINT FK_D01E481E9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE mpi_group DROP FOREIGN KEY FK_79EB0AE9B4CD962C');
        $this->addSql('ALTER TABLE mpi_group ADD CONSTRAINT FK_AF61E3012A582CD2 FOREIGN KEY (mpi_template_id) REFERENCES mpi_template (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mpi_group RENAME INDEX idx_79eb0ae9b4cd962c TO IDX_AF61E3012A582CD2');
        $this->addSql('ALTER TABLE mpi_item DROP FOREIGN KEY FK_D65210A4AA3D9B9A');
        $this->addSql('ALTER TABLE mpi_item ADD CONSTRAINT FK_694346A228655E49 FOREIGN KEY (mpi_group_id) REFERENCES mpi_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mpi_item RENAME INDEX idx_d65210a4aa3d9b9a TO IDX_694346A228655E49');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order_mpi_interaction DROP FOREIGN KEY FK_D01E481EAC67FDA3');
        $this->addSql('DROP TABLE repair_order_mpi');
        $this->addSql('DROP TABLE repair_order_mpi_interaction');
        $this->addSql('ALTER TABLE mpi_group DROP FOREIGN KEY FK_AF61E3012A582CD2');
        $this->addSql('ALTER TABLE mpi_group ADD CONSTRAINT FK_79EB0AE9B4CD962C FOREIGN KEY (mpi_template_id) REFERENCES mpi_template (id)');
        $this->addSql('ALTER TABLE mpi_group RENAME INDEX idx_af61e3012a582cd2 TO IDX_79EB0AE9B4CD962C');
        $this->addSql('ALTER TABLE mpi_item DROP FOREIGN KEY FK_694346A228655E49');
        $this->addSql('ALTER TABLE mpi_item ADD CONSTRAINT FK_D65210A4AA3D9B9A FOREIGN KEY (mpi_group_id) REFERENCES mpi_group (id)');
        $this->addSql('ALTER TABLE mpi_item RENAME INDEX idx_694346a228655e49 TO IDX_D65210A4AA3D9B9A');
    }
}
