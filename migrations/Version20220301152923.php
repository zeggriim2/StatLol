<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220301152923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB45D8BC1F8');
        $this->addSql('DROP INDEX IDX_45437EB45D8BC1F8 ON champion');
        $this->addSql('ALTER TABLE champion CHANGE info_id info_champion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB42547FD14 FOREIGN KEY (info_champion_id) REFERENCES info_champion (id)');
        $this->addSql('CREATE INDEX IDX_45437EB42547FD14 ON champion (info_champion_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ally_tip_champion CHANGE ally_tip1 ally_tip1 LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ally_tip2 ally_tip2 LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ally_tip3 ally_tip3 LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB42547FD14');
        $this->addSql('DROP INDEX IDX_45437EB42547FD14 ON champion');
        $this->addSql('ALTER TABLE champion CHANGE id_champion id_champion VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cle cle VARCHAR(15) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE blurb blurb LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lore lore LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE info_champion_id info_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB45D8BC1F8 FOREIGN KEY (info_id) REFERENCES info_champion (id)');
        $this->addSql('CREATE INDEX IDX_45437EB45D8BC1F8 ON champion (info_id)');
        $this->addSql('ALTER TABLE division CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE enemy_tip_champion CHANGE enemy_tip1 enemy_tip1 LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE enemy_tip2 enemy_tip2 LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE enemy_tip3 enemy_tip3 LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE image_champion CHANGE full full VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sprite sprite VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE groupement groupement VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE image_passive CHANGE full full VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sprite sprite VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE groupement groupement VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE image_spell CHANGE full full VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sprite sprite VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE groupement groupement VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE league CHANGE league_id league_id VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE par_type_champion CHANGE name name VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE passive_champion CHANGE name name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE queue CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE skin_champion CHANGE name name VARCHAR(25) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE spell CHANGE id_spell id_spell VARCHAR(25) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(40) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tooltip tooltip LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cool_down_burn cool_down_burn VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cost_burn cost_burn VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cost_type cost_type VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE maxammo maxammo VARCHAR(5) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE range_burn range_burn VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE resource resource VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE summoner CHANGE summoner_id summoner_id VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE account_id account_id VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE puuid puuid VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tag_champion CHANGE label label VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tier CHANGE name name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pseudo pseudo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE version CHANGE name name VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
