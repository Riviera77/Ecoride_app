<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250322193057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE covoiturage (id SERIAL NOT NULL, adresse_depart VARCHAR(255) NOT NULL, adresse_arrivee VARCHAR(255) NOT NULL, date_depart DATE NOT NULL, date_arrivee DATE NOT NULL, prix_personne DOUBLE PRECISION NOT NULL, heure_depart TIME(0) WITHOUT TIME ZONE NOT NULL, heure_arrivee TIME(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE covoiturage_user (covoiturage_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(covoiturage_id, user_id))');
        $this->addSql('CREATE INDEX IDX_F862CC4962671590 ON covoiturage_user (covoiturage_id)');
        $this->addSql('CREATE INDEX IDX_F862CC49A76ED395 ON covoiturage_user (user_id)');
        $this->addSql('CREATE TABLE credits (id SERIAL NOT NULL, users_id INT NOT NULL, solde INT NOT NULL, date_transaction TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4117D17E67B3B43D ON credits (users_id)');
        $this->addSql('CREATE TABLE role (id SERIAL NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE role_user (role_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(role_id, user_id))');
        $this->addSql('CREATE INDEX IDX_332CA4DDD60322AC ON role_user (role_id)');
        $this->addSql('CREATE INDEX IDX_332CA4DDA76ED395 ON role_user (user_id)');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, photo BYTEA DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
        $this->addSql('CREATE TABLE voiture (id SERIAL NOT NULL, users_id INT NOT NULL, immatriculation VARCHAR(50) NOT NULL, date_premiere_immatriculation VARCHAR(50) NOT NULL, modele VARCHAR(50) NOT NULL, couleur VARCHAR(50) NOT NULL, marque VARCHAR(50) NOT NULL, energie BOOLEAN NOT NULL, nb_place INT NOT NULL, preference VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E9E2810F67B3B43D ON voiture (users_id)');
        $this->addSql('ALTER TABLE covoiturage_user ADD CONSTRAINT FK_F862CC4962671590 FOREIGN KEY (covoiturage_id) REFERENCES covoiturage (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE covoiturage_user ADD CONSTRAINT FK_F862CC49A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE credits ADD CONSTRAINT FK_4117D17E67B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDD60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F67B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE covoiturage_user DROP CONSTRAINT FK_F862CC4962671590');
        $this->addSql('ALTER TABLE covoiturage_user DROP CONSTRAINT FK_F862CC49A76ED395');
        $this->addSql('ALTER TABLE credits DROP CONSTRAINT FK_4117D17E67B3B43D');
        $this->addSql('ALTER TABLE role_user DROP CONSTRAINT FK_332CA4DDD60322AC');
        $this->addSql('ALTER TABLE role_user DROP CONSTRAINT FK_332CA4DDA76ED395');
        $this->addSql('ALTER TABLE voiture DROP CONSTRAINT FK_E9E2810F67B3B43D');
        $this->addSql('DROP TABLE covoiturage');
        $this->addSql('DROP TABLE covoiturage_user');
        $this->addSql('DROP TABLE credits');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_user');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE voiture');
    }
}
