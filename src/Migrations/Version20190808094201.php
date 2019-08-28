<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190808094201 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE approvisionnement ADD fournisseur_id INT NOT NULL');
        $this->addSql('ALTER TABLE approvisionnement ADD CONSTRAINT FK_516C3FAA670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('CREATE INDEX IDX_516C3FAA670C757F ON approvisionnement (fournisseur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE approvisionnement DROP FOREIGN KEY FK_516C3FAA670C757F');
        $this->addSql('DROP INDEX IDX_516C3FAA670C757F ON approvisionnement');
        $this->addSql('ALTER TABLE approvisionnement DROP fournisseur_id');
    }
}
