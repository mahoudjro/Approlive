<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190731141158 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE details_consommation ADD consommation_id INT NOT NULL, ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE details_consommation ADD CONSTRAINT FK_D4FA6505C1076F84 FOREIGN KEY (consommation_id) REFERENCES consommation (id)');
        $this->addSql('ALTER TABLE details_consommation ADD CONSTRAINT FK_D4FA6505F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_D4FA6505C1076F84 ON details_consommation (consommation_id)');
        $this->addSql('CREATE INDEX IDX_D4FA6505F347EFB ON details_consommation (produit_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE details_consommation DROP FOREIGN KEY FK_D4FA6505C1076F84');
        $this->addSql('ALTER TABLE details_consommation DROP FOREIGN KEY FK_D4FA6505F347EFB');
        $this->addSql('DROP INDEX IDX_D4FA6505C1076F84 ON details_consommation');
        $this->addSql('DROP INDEX IDX_D4FA6505F347EFB ON details_consommation');
        $this->addSql('ALTER TABLE details_consommation DROP consommation_id, DROP produit_id');
    }
}
