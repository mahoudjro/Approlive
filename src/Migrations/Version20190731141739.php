<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190731141739 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE details_transfert ADD produit_id INT NOT NULL, ADD transfert_id INT NOT NULL');
        $this->addSql('ALTER TABLE details_transfert ADD CONSTRAINT FK_644EA060F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE details_transfert ADD CONSTRAINT FK_644EA0603C9C4BAD FOREIGN KEY (transfert_id) REFERENCES transfert (id)');
        $this->addSql('CREATE INDEX IDX_644EA060F347EFB ON details_transfert (produit_id)');
        $this->addSql('CREATE INDEX IDX_644EA0603C9C4BAD ON details_transfert (transfert_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE details_transfert DROP FOREIGN KEY FK_644EA060F347EFB');
        $this->addSql('ALTER TABLE details_transfert DROP FOREIGN KEY FK_644EA0603C9C4BAD');
        $this->addSql('DROP INDEX IDX_644EA060F347EFB ON details_transfert');
        $this->addSql('DROP INDEX IDX_644EA0603C9C4BAD ON details_transfert');
        $this->addSql('ALTER TABLE details_transfert DROP produit_id, DROP transfert_id');
    }
}
