<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210223020432 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vuelos_personal (id INT AUTO_INCREMENT NOT NULL, vuelo_id_id INT DEFAULT NULL, piloto_id INT DEFAULT NULL, copiloto_id INT DEFAULT NULL, ingeniero_id INT DEFAULT NULL, axuiliar_id INT DEFAULT NULL, INDEX IDX_442CF87AC580F9FB (vuelo_id_id), INDEX IDX_442CF87A9AAD4A8D (piloto_id), INDEX IDX_442CF87AFEF9400B (copiloto_id), INDEX IDX_442CF87A13629BA4 (ingeniero_id), INDEX IDX_442CF87AF55A52B9 (axuiliar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vuelos_personal ADD CONSTRAINT FK_442CF87AC580F9FB FOREIGN KEY (vuelo_id_id) REFERENCES vuelos (id)');
        $this->addSql('ALTER TABLE vuelos_personal ADD CONSTRAINT FK_442CF87A9AAD4A8D FOREIGN KEY (piloto_id) REFERENCES personal (id)');
        $this->addSql('ALTER TABLE vuelos_personal ADD CONSTRAINT FK_442CF87AFEF9400B FOREIGN KEY (copiloto_id) REFERENCES personal (id)');
        $this->addSql('ALTER TABLE vuelos_personal ADD CONSTRAINT FK_442CF87A13629BA4 FOREIGN KEY (ingeniero_id) REFERENCES personal (id)');
        $this->addSql('ALTER TABLE vuelos_personal ADD CONSTRAINT FK_442CF87AF55A52B9 FOREIGN KEY (axuiliar_id) REFERENCES personal (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vuelos_personal');
    }
}
