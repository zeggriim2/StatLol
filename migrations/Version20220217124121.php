<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220217124121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cool_down_spell (id INT AUTO_INCREMENT NOT NULL, level1 INT NOT NULL, level2 INT NOT NULL, level3 INT NOT NULL, level4 INT NOT NULL, level5 INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cost_spell (id INT AUTO_INCREMENT NOT NULL, level1 INT NOT NULL, level2 INT NOT NULL, level3 INT NOT NULL, level4 INT NOT NULL, level5 INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_spell (id INT AUTO_INCREMENT NOT NULL, full VARCHAR(50) NOT NULL, sprite VARCHAR(50) NOT NULL, groupement VARCHAR(50) NOT NULL, pos_x INT NOT NULL, pos_y INT NOT NULL, pos_w INT NOT NULL, pos_h INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level_tip_spell (id INT AUTO_INCREMENT NOT NULL, label JSON DEFAULT NULL, effect JSON DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE range_spell (id INT AUTO_INCREMENT NOT NULL, level1 INT NOT NULL, level2 INT NOT NULL, level3 INT NOT NULL, level4 INT NOT NULL, level5 INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spell (id INT AUTO_INCREMENT NOT NULL, cool_down_id INT DEFAULT NULL, level_tip_id INT DEFAULT NULL, cost_id INT DEFAULT NULL, range_spell_id INT DEFAULT NULL, image_id INT DEFAULT NULL, id_spell VARCHAR(25) NOT NULL, name VARCHAR(40) NOT NULL, description LONGTEXT NOT NULL, tooltip LONGTEXT NOT NULL, maxrank INT NOT NULL, cool_down_burn VARCHAR(20) NOT NULL, cost_burn VARCHAR(20) NOT NULL, effect JSON NOT NULL, effect_burn JSON NOT NULL, cost_type VARCHAR(50) NOT NULL, maxammo VARCHAR(5) NOT NULL, range_burn VARCHAR(10) NOT NULL, resource VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_D03FCD8D7ED8A3FA (cool_down_id), UNIQUE INDEX UNIQ_D03FCD8D3EDA2657 (level_tip_id), UNIQUE INDEX UNIQ_D03FCD8D1DBF857F (cost_id), UNIQUE INDEX UNIQ_D03FCD8D9CA66AE (range_spell_id), INDEX IDX_D03FCD8D3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D7ED8A3FA FOREIGN KEY (cool_down_id) REFERENCES cool_down_spell (id)');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D3EDA2657 FOREIGN KEY (level_tip_id) REFERENCES level_tip_spell (id)');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D1DBF857F FOREIGN KEY (cost_id) REFERENCES cost_spell (id)');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D9CA66AE FOREIGN KEY (range_spell_id) REFERENCES range_spell (id)');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D3DA5256D FOREIGN KEY (image_id) REFERENCES image_spell (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8D7ED8A3FA');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8D1DBF857F');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8D3DA5256D');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8D3EDA2657');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8D9CA66AE');
        $this->addSql('DROP TABLE cool_down_spell');
        $this->addSql('DROP TABLE cost_spell');
        $this->addSql('DROP TABLE image_spell');
        $this->addSql('DROP TABLE level_tip_spell');
        $this->addSql('DROP TABLE range_spell');
        $this->addSql('DROP TABLE spell');
        $this->addSql('ALTER TABLE division CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE image_champion CHANGE full full VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sprite sprite VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE groupement groupement VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE image_passive CHANGE full full VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sprite sprite VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE groupement groupement VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE league CHANGE league_id league_id VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE par_type_champion CHANGE name name VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE passive_champion CHANGE name name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE queue CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE skin_champion CHANGE name name VARCHAR(25) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE summoner CHANGE summoner_id summoner_id VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE account_id account_id VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE puuid puuid VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tag_champion CHANGE label label VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tier CHANGE name name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pseudo pseudo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE version CHANGE name name VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
