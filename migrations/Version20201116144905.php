<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201116144905 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order DROP FOREIGN KEY FK_55F6573458774111');
        $this->addSql('DROP INDEX IDX_55F6573458774111 ON repair_order');
        $this->addSql('ALTER TABLE repair_order DROP note, DROP archived, CHANGE primary_technician_id primary_technician_id INT NOT NULL, CHANGE primary_advisor_id primary_advisor INT NOT NULL');
        $this->addSql('ALTER TABLE repair_order RENAME INDEX uniq_55f6573496901f54 TO UNIQ_55F65734DB852B8B');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repair_order ADD note LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD archived TINYINT(1) NOT NULL, CHANGE primary_technician_id primary_technician_id INT DEFAULT NULL, CHANGE primary_advisor primary_advisor_id INT NOT NULL');
        $this->addSql('ALTER TABLE repair_order ADD CONSTRAINT FK_55F6573458774111 FOREIGN KEY (primary_advisor_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_55F6573458774111 ON repair_order (primary_advisor_id)');
        $this->addSql('ALTER TABLE repair_order RENAME INDEX uniq_55f65734db852b8b TO UNIQ_55F6573496901F54');
    }
}
