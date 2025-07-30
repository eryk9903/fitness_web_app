<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250730163152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE meal (id SERIAL NOT NULL, created_by_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, calories INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9EF68E9CB03A8386 ON meal (created_by_id)');
        $this->addSql('CREATE TABLE meal_log (id SERIAL NOT NULL, meal_id INT DEFAULT NULL, time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8B38E1D1639666D6 ON meal_log (meal_id)');
        $this->addSql('ALTER TABLE meal ADD CONSTRAINT FK_9EF68E9CB03A8386 FOREIGN KEY (created_by_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE meal_log ADD CONSTRAINT FK_8B38E1D1639666D6 FOREIGN KEY (meal_id) REFERENCES meal (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE meal DROP CONSTRAINT FK_9EF68E9CB03A8386');
        $this->addSql('ALTER TABLE meal_log DROP CONSTRAINT FK_8B38E1D1639666D6');
        $this->addSql('DROP TABLE meal');
        $this->addSql('DROP TABLE meal_log');
    }
}
