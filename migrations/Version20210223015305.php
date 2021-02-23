<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210223015305 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aviones (id INT AUTO_INCREMENT NOT NULL, baseavion_id INT DEFAULT NULL, tipo VARCHAR(255) NOT NULL, disponible TINYINT(1) NOT NULL, INDEX IDX_97EDDD4C0F5E058 (baseavion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bases (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE funciones (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personal (id INT AUTO_INCREMENT NOT NULL, funcion_id INT DEFAULT NULL, basepersonal_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, INDEX IDX_F18A6D848C185C36 (funcion_id), INDEX IDX_F18A6D84ADB22A3D (basepersonal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aviones ADD CONSTRAINT FK_97EDDD4C0F5E058 FOREIGN KEY (baseavion_id) REFERENCES bases (id)');
        $this->addSql('ALTER TABLE personal ADD CONSTRAINT FK_F18A6D848C185C36 FOREIGN KEY (funcion_id) REFERENCES funciones (id)');
        $this->addSql('ALTER TABLE personal ADD CONSTRAINT FK_F18A6D84ADB22A3D FOREIGN KEY (basepersonal_id) REFERENCES bases (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aviones DROP FOREIGN KEY FK_97EDDD4C0F5E058');
        $this->addSql('ALTER TABLE personal DROP FOREIGN KEY FK_F18A6D84ADB22A3D');
        $this->addSql('ALTER TABLE personal DROP FOREIGN KEY FK_F18A6D848C185C36');
        $this->addSql('DROP TABLE aviones');
        $this->addSql('DROP TABLE bases');
        $this->addSql('DROP TABLE funciones');
        $this->addSql('DROP TABLE personal');
    }
}
