<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190731140124 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transfert ADD structure_depart_id INT NOT NULL, ADD structure_arrive_id INT NOT NULL');
        $this->addSql('ALTER TABLE transfert ADD CONSTRAINT FK_1E4EACBB385A5367 FOREIGN KEY (structure_depart_id) REFERENCES structure (id)');
        $this->addSql('ALTER TABLE transfert ADD CONSTRAINT FK_1E4EACBB625A2B64 FOREIGN KEY (structure_arrive_id) REFERENCES structure (id)');
        $this->addSql('CREATE INDEX IDX_1E4EACBB385A5367 ON transfert (structure_depart_id)');
        $this->addSql('CREATE INDEX IDX_1E4EACBB625A2B64 ON transfert (structure_arrive_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transfert DROP FOREIGN KEY FK_1E4EACBB385A5367');
        $this->addSql('ALTER TABLE transfert DROP FOREIGN KEY FK_1E4EACBB625A2B64');
        $this->addSql('DROP INDEX IDX_1E4EACBB385A5367 ON transfert');
        $this->addSql('DROP INDEX IDX_1E4EACBB625A2B64 ON transfert');
        $this->addSql('ALTER TABLE transfert DROP structure_depart_id, DROP structure_arrive_id');
    }
}
