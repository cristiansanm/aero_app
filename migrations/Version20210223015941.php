<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210223015941 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ciudades (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vuelos (id INT AUTO_INCREMENT NOT NULL, origen_id INT DEFAULT NULL, destino_id INT DEFAULT NULL, avion_id INT DEFAULT NULL, fecha DATE NOT NULL, hora TIME NOT NULL, INDEX IDX_3BD7425B93529ECD (origen_id), INDEX IDX_3BD7425BE4360615 (destino_id), INDEX IDX_3BD7425B80BBB841 (avion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vuelos ADD CONSTRAINT FK_3BD7425B93529ECD FOREIGN KEY (origen_id) REFERENCES ciudades (id)');
        $this->addSql('ALTER TABLE vuelos ADD CONSTRAINT FK_3BD7425BE4360615 FOREIGN KEY (destino_id) REFERENCES ciudades (id)');
        $this->addSql('ALTER TABLE vuelos ADD CONSTRAINT FK_3BD7425B80BBB841 FOREIGN KEY (avion_id) REFERENCES aviones (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vuelos DROP FOREIGN KEY FK_3BD7425B93529ECD');
        $this->addSql('ALTER TABLE vuelos DROP FOREIGN KEY FK_3BD7425BE4360615');
        $this->addSql('DROP TABLE ciudades');
        $this->addSql('DROP TABLE vuelos');
    }
}
