<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220216140656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image_champion (id INT AUTO_INCREMENT NOT NULL, full VARCHAR(50) NOT NULL, sprite VARCHAR(50) NOT NULL, groupement VARCHAR(50) NOT NULL, pos_x INT NOT NULL, pos_y INT NOT NULL, pos_w INT NOT NULL, pos_h INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_champion (id INT AUTO_INCREMENT NOT NULL, attack INT NOT NULL, defense INT NOT NULL, magic INT NOT NULL, difficulty INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stat_champion (id INT AUTO_INCREMENT NOT NULL, hp DOUBLE PRECISION NOT NULL, hp_per_level INT NOT NULL, mp DOUBLE PRECISION NOT NULL, mp_per_level DOUBLE PRECISION NOT NULL, move_speed INT NOT NULL, armor INT NOT NULL, armor_per_level DOUBLE PRECISION NOT NULL, spell_block DOUBLE PRECISION NOT NULL, spell_block_per_level DOUBLE PRECISION NOT NULL, attack_range INT NOT NULL, hp_regen DOUBLE PRECISION NOT NULL, hp_regen_per_level DOUBLE PRECISION NOT NULL, mp_regen DOUBLE PRECISION NOT NULL, mp_regen_per_level DOUBLE PRECISION NOT NULL, crit INT NOT NULL, crit_per_level INT NOT NULL, attack_damage DOUBLE PRECISION NOT NULL, attack_damage_per_level DOUBLE PRECISION NOT NULL, attack_speed DOUBLE PRECISION NOT NULL, attack_speed_perlevel DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_champion (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(60) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE image_champion');
        $this->addSql('DROP TABLE info_champion');
        $this->addSql('DROP TABLE stat_champion');
        $this->addSql('DROP TABLE tag_champion');
        $this->addSql('ALTER TABLE division CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE league CHANGE league_id league_id VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE queue CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE summoner CHANGE summoner_id summoner_id VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE account_id account_id VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE puuid puuid VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tier CHANGE name name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pseudo pseudo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE version CHANGE name name VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
