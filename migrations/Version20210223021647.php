<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210223021647 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vuelos_personal DROP FOREIGN KEY FK_442CF87AF55A52B9');
        $this->addSql('DROP INDEX IDX_442CF87AF55A52B9 ON vuelos_personal');
        $this->addSql('ALTER TABLE vuelos_personal CHANGE axuiliar_id auxiliar_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vuelos_personal ADD CONSTRAINT FK_442CF87AF1EB3E5E FOREIGN KEY (auxiliar_id) REFERENCES personal (id)');
        $this->addSql('CREATE INDEX IDX_442CF87AF1EB3E5E ON vuelos_personal (auxiliar_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vuelos_personal DROP FOREIGN KEY FK_442CF87AF1EB3E5E');
        $this->addSql('DROP INDEX IDX_442CF87AF1EB3E5E ON vuelos_personal');
        $this->addSql('ALTER TABLE vuelos_personal CHANGE auxiliar_id axuiliar_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vuelos_personal ADD CONSTRAINT FK_442CF87AF55A52B9 FOREIGN KEY (axuiliar_id) REFERENCES personal (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_442CF87AF55A52B9 ON vuelos_personal (axuiliar_id)');
    }
}
