<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210117080702 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, deleted_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, url VARCHAR(1024) NOT NULL, date_created DATETIME NOT NULL, date_deleted DATETIME DEFAULT NULL, is_deleted TINYINT(1) NOT NULL, has_ssl TINYINT(1) NOT NULL, INDEX IDX_E19D9AD2B03A8386 (created_by_id), INDEX IDX_E19D9AD2C76F1F52 (deleted_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2B03A8386 FOREIGN KEY (created_by_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2C76F1F52 FOREIGN KEY (deleted_by_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE service');
    }
}
