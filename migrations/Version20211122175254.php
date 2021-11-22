<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122175254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles ADD auteurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168AE784107 FOREIGN KEY (auteurs_id) REFERENCES auteurs (id)');
        $this->addSql('CREATE INDEX IDX_BFDD3168AE784107 ON articles (auteurs_id)');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C460BB6FE6');
        $this->addSql('DROP INDEX IDX_D9BEC0C460BB6FE6 ON commentaires');
        $this->addSql('ALTER TABLE commentaires ADD auteur VARCHAR(255) NOT NULL, DROP auteur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168AE784107');
        $this->addSql('DROP INDEX IDX_BFDD3168AE784107 ON articles');
        $this->addSql('ALTER TABLE articles DROP auteurs_id');
        $this->addSql('ALTER TABLE commentaires ADD auteur_id INT DEFAULT NULL, DROP auteur');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C460BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteurs (id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C460BB6FE6 ON commentaires (auteur_id)');
    }
}
