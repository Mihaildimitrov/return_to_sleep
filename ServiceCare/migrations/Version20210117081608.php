<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210117081608 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alert (id INT AUTO_INCREMENT NOT NULL, status_id_id INT NOT NULL, text VARCHAR(1024) NOT NULL, date DATETIME NOT NULL, is_seen TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_17FD46C1881ECFA7 (status_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_status (id INT AUTO_INCREMENT NOT NULL, date_checked DATETIME NOT NULL, http_code SMALLINT NOT NULL, request_timeout DOUBLE PRECISION NOT NULL, request_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alert ADD CONSTRAINT FK_17FD46C1881ECFA7 FOREIGN KEY (status_id_id) REFERENCES service_status (id)');
        $this->addSql('ALTER TABLE service ADD service_status_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD233663AF7 FOREIGN KEY (service_status_id) REFERENCES service_status (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD233663AF7 ON service (service_status_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alert DROP FOREIGN KEY FK_17FD46C1881ECFA7');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD233663AF7');
        $this->addSql('DROP TABLE alert');
        $this->addSql('DROP TABLE service_status');
        $this->addSql('DROP INDEX IDX_E19D9AD233663AF7 ON service');
        $this->addSql('ALTER TABLE service DROP service_status_id');
    }
}
