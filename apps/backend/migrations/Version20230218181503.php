<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218181503 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE projects_dev_technologies (project_id CHAR(36) NOT NULL, dev_technology_id CHAR(36) NOT NULL, PRIMARY KEY(project_id, dev_technology_id))');
        $this->addSql('CREATE INDEX IDX_A796BE4C166D1F9C ON projects_dev_technologies (project_id)');
        $this->addSql('CREATE INDEX IDX_A796BE4C92623239 ON projects_dev_technologies (dev_technology_id)');
        $this->addSql('ALTER TABLE projects_dev_technologies ADD CONSTRAINT FK_A796BE4C166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projects_dev_technologies ADD CONSTRAINT FK_A796BE4C92623239 FOREIGN KEY (dev_technology_id) REFERENCES dev_technology (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE projects_dev_technologies DROP CONSTRAINT FK_A796BE4C166D1F9C');
        $this->addSql('ALTER TABLE projects_dev_technologies DROP CONSTRAINT FK_A796BE4C92623239');
        $this->addSql('DROP TABLE projects_dev_technologies');
    }
}
