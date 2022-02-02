<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202130556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bd_collection ADD relation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bd_collection ADD CONSTRAINT FK_BE0E5A463256915B FOREIGN KEY (relation_id) REFERENCES genre (id)');
        $this->addSql('CREATE INDEX IDX_BE0E5A463256915B ON bd_collection (relation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bd_collection DROP FOREIGN KEY FK_BE0E5A463256915B');
        $this->addSql('DROP INDEX IDX_BE0E5A463256915B ON bd_collection');
        $this->addSql('ALTER TABLE bd_collection DROP relation_id, CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE edition edition VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE genre CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
