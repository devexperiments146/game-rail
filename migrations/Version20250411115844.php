<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250411115844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE linked_cities (id INT AUTO_INCREMENT NOT NULL, city1_id INT NOT NULL, city2_id INT NOT NULL, INDEX IDX_FA34D23B908E3F88 (city1_id), INDEX IDX_FA34D23B823B9066 (city2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, city1_id INT NOT NULL, city2_id INT NOT NULL, points INT NOT NULL, INDEX IDX_9067F23C908E3F88 (city1_id), INDEX IDX_9067F23C823B9066 (city2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE party (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_mission (id INT AUTO_INCREMENT NOT NULL, player_id INT NOT NULL, mission_id INT NOT NULL, party_id INT NOT NULL, successfull TINYINT(1) NOT NULL, INDEX IDX_F1930D7999E6F5DF (player_id), INDEX IDX_F1930D79BE6CAE90 (mission_id), INDEX IDX_F1930D79213C1059 (party_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_party (id INT AUTO_INCREMENT NOT NULL, player_id INT NOT NULL, party_id INT NOT NULL, color LONGTEXT NOT NULL, INDEX IDX_36E735A699E6F5DF (player_id), INDEX IDX_36E735A6213C1059 (party_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_result (id INT AUTO_INCREMENT NOT NULL, player_id INT NOT NULL, party_id INT NOT NULL, railway_points INT NOT NULL, longest_railway TINYINT(1) NOT NULL, station_points INT NOT NULL, mission_points INT NOT NULL, INDEX IDX_8C6A57CD99E6F5DF (player_id), INDEX IDX_8C6A57CD213C1059 (party_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE linked_cities ADD CONSTRAINT FK_FA34D23B908E3F88 FOREIGN KEY (city1_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE linked_cities ADD CONSTRAINT FK_FA34D23B823B9066 FOREIGN KEY (city2_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C908E3F88 FOREIGN KEY (city1_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C823B9066 FOREIGN KEY (city2_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE player_mission ADD CONSTRAINT FK_F1930D7999E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE player_mission ADD CONSTRAINT FK_F1930D79BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE player_mission ADD CONSTRAINT FK_F1930D79213C1059 FOREIGN KEY (party_id) REFERENCES party (id)');
        $this->addSql('ALTER TABLE player_party ADD CONSTRAINT FK_36E735A699E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE player_party ADD CONSTRAINT FK_36E735A6213C1059 FOREIGN KEY (party_id) REFERENCES party (id)');
        $this->addSql('ALTER TABLE player_result ADD CONSTRAINT FK_8C6A57CD99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE player_result ADD CONSTRAINT FK_8C6A57CD213C1059 FOREIGN KEY (party_id) REFERENCES party (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE linked_cities DROP FOREIGN KEY FK_FA34D23B908E3F88');
        $this->addSql('ALTER TABLE linked_cities DROP FOREIGN KEY FK_FA34D23B823B9066');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C908E3F88');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C823B9066');
        $this->addSql('ALTER TABLE player_mission DROP FOREIGN KEY FK_F1930D7999E6F5DF');
        $this->addSql('ALTER TABLE player_mission DROP FOREIGN KEY FK_F1930D79BE6CAE90');
        $this->addSql('ALTER TABLE player_mission DROP FOREIGN KEY FK_F1930D79213C1059');
        $this->addSql('ALTER TABLE player_party DROP FOREIGN KEY FK_36E735A699E6F5DF');
        $this->addSql('ALTER TABLE player_party DROP FOREIGN KEY FK_36E735A6213C1059');
        $this->addSql('ALTER TABLE player_result DROP FOREIGN KEY FK_8C6A57CD99E6F5DF');
        $this->addSql('ALTER TABLE player_result DROP FOREIGN KEY FK_8C6A57CD213C1059');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE linked_cities');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE party');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE player_mission');
        $this->addSql('DROP TABLE player_party');
        $this->addSql('DROP TABLE player_result');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
