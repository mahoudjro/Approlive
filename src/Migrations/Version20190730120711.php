<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190730120711 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stock_structure ADD structure_id INT NOT NULL, ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE stock_structure ADD CONSTRAINT FK_F79CD1022534008B FOREIGN KEY (structure_id) REFERENCES structure (id)');
        $this->addSql('ALTER TABLE stock_structure ADD CONSTRAINT FK_F79CD102F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_F79CD1022534008B ON stock_structure (structure_id)');
        $this->addSql('CREATE INDEX IDX_F79CD102F347EFB ON stock_structure (produit_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_Stock_Outil ON stock_structure (structure_id, produit_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stock_structure DROP FOREIGN KEY FK_F79CD1022534008B');
        $this->addSql('ALTER TABLE stock_structure DROP FOREIGN KEY FK_F79CD102F347EFB');
        $this->addSql('DROP INDEX IDX_F79CD1022534008B ON stock_structure');
        $this->addSql('DROP INDEX IDX_F79CD102F347EFB ON stock_structure');
        $this->addSql('DROP INDEX UNIQ_Stock_Outil ON stock_structure');
        $this->addSql('ALTER TABLE stock_structure DROP structure_id, DROP produit_id');
    }
}
