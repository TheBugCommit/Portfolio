<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218175309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'ManyToMany relationship `projects_categories`';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE projects_categories (project_id CHAR(36) NOT NULL, category_id CHAR(36) NOT NULL, PRIMARY KEY(project_id, category_id))');
        $this->addSql('CREATE INDEX IDX_8C4CD792166D1F9C ON projects_categories (project_id)');
        $this->addSql('CREATE INDEX IDX_8C4CD79212469DE2 ON projects_categories (category_id)');
        $this->addSql('ALTER TABLE projects_categories ADD CONSTRAINT FK_8C4CD792166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projects_categories ADD CONSTRAINT FK_8C4CD79212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE projects_categories DROP CONSTRAINT FK_8C4CD792166D1F9C');
        $this->addSql('ALTER TABLE projects_categories DROP CONSTRAINT FK_8C4CD79212469DE2');
        $this->addSql('DROP TABLE projects_categories');
    }
}
