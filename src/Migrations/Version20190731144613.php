<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190731144613 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE type_structure ADD hrch_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_structure ADD CONSTRAINT FK_DBC776FADADFBF65 FOREIGN KEY (hrch_id) REFERENCES type_structure (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DBC776FADADFBF65 ON type_structure (hrch_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE type_structure DROP FOREIGN KEY FK_DBC776FADADFBF65');
        $this->addSql('DROP INDEX UNIQ_DBC776FADADFBF65 ON type_structure');
        $this->addSql('ALTER TABLE type_structure DROP hrch_id');
    }
}
