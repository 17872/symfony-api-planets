<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191031122736 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planets_and_residents CHANGE rotation_period rotation_period DOUBLE PRECISION DEFAULT NULL, CHANGE orbital_period orbital_period DOUBLE PRECISION DEFAULT NULL, CHANGE diameter diameter DOUBLE PRECISION DEFAULT NULL, CHANGE surface_water surface_water DOUBLE PRECISION DEFAULT NULL, CHANGE population population DOUBLE PRECISION DEFAULT NULL, CHANGE count_residents count_residents DOUBLE PRECISION NOT NULL, CHANGE created created DATETIME DEFAULT NULL, CHANGE edited edited DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE residents_and_planets CHANGE height height DOUBLE PRECISION DEFAULT NULL, CHANGE mass mass DOUBLE PRECISION DEFAULT NULL, CHANGE created created DATETIME DEFAULT NULL, CHANGE edited edited DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE planets_and_residents CHANGE rotation_period rotation_period INT DEFAULT NULL, CHANGE orbital_period orbital_period INT DEFAULT NULL, CHANGE diameter diameter INT DEFAULT NULL, CHANGE surface_water surface_water INT DEFAULT NULL, CHANGE population population INT DEFAULT NULL, CHANGE count_residents count_residents INT NOT NULL, CHANGE created created DATETIME DEFAULT NULL, CHANGE edited edited DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE residents_and_planets CHANGE height height INT DEFAULT NULL, CHANGE mass mass INT DEFAULT NULL, CHANGE created created DATETIME DEFAULT NULL, CHANGE edited edited DATETIME DEFAULT NULL');
    }
}
