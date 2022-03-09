<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220217143013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ally_tip_champion (id INT AUTO_INCREMENT NOT NULL, ally_tip1 LONGTEXT NOT NULL, ally_tip2 LONGTEXT NOT NULL, ally_tip3 LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE champion (id INT AUTO_INCREMENT NOT NULL, version_id INT DEFAULT NULL, passive_id INT DEFAULT NULL, image_id INT DEFAULT NULL, stat_id INT DEFAULT NULL, info_id INT DEFAULT NULL, par_type_id INT DEFAULT NULL, enemy_tip_id INT DEFAULT NULL, ally_tip_id INT DEFAULT NULL, id_champion VARCHAR(70) NOT NULL, cle VARCHAR(15) NOT NULL, name VARCHAR(50) NOT NULL, title VARCHAR(255) NOT NULL, blurb LONGTEXT NOT NULL, lore LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_45437EB44BBC2705 (version_id), INDEX IDX_45437EB46D157422 (passive_id), INDEX IDX_45437EB43DA5256D (image_id), UNIQUE INDEX UNIQ_45437EB49502F0B (stat_id), UNIQUE INDEX UNIQ_45437EB45D8BC1F8 (info_id), INDEX IDX_45437EB4A1F3D585 (par_type_id), INDEX IDX_45437EB4C3483C3E (enemy_tip_id), INDEX IDX_45437EB41B7D9BEA (ally_tip_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE champion_spell (champion_id INT NOT NULL, spell_id INT NOT NULL, INDEX IDX_624E9624FA7FD7EB (champion_id), INDEX IDX_624E9624479EC90D (spell_id), PRIMARY KEY(champion_id, spell_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE champion_tag_champion (champion_id INT NOT NULL, tag_champion_id INT NOT NULL, INDEX IDX_B4C12488FA7FD7EB (champion_id), INDEX IDX_B4C12488E6B6AD0B (tag_champion_id), PRIMARY KEY(champion_id, tag_champion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE champion_skin_champion (champion_id INT NOT NULL, skin_champion_id INT NOT NULL, INDEX IDX_61EE930FA7FD7EB (champion_id), INDEX IDX_61EE9308F56AA5E (skin_champion_id), PRIMARY KEY(champion_id, skin_champion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enemy_tip_champion (id INT AUTO_INCREMENT NOT NULL, enemy_tip1 LONGTEXT NOT NULL, enemy_tip2 LONGTEXT NOT NULL, enemy_tip3 LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB44BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB46D157422 FOREIGN KEY (passive_id) REFERENCES passive_champion (id)');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB43DA5256D FOREIGN KEY (image_id) REFERENCES image_champion (id)');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB49502F0B FOREIGN KEY (stat_id) REFERENCES stat_champion (id)');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB45D8BC1F8 FOREIGN KEY (info_id) REFERENCES info_champion (id)');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB4A1F3D585 FOREIGN KEY (par_type_id) REFERENCES par_type_champion (id)');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB4C3483C3E FOREIGN KEY (enemy_tip_id) REFERENCES enemy_tip_champion (id)');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB41B7D9BEA FOREIGN KEY (ally_tip_id) REFERENCES ally_tip_champion (id)');
        $this->addSql('ALTER TABLE champion_spell ADD CONSTRAINT FK_624E9624FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_spell ADD CONSTRAINT FK_624E9624479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_tag_champion ADD CONSTRAINT FK_B4C12488FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_tag_champion ADD CONSTRAINT FK_B4C12488E6B6AD0B FOREIGN KEY (tag_champion_id) REFERENCES tag_champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_skin_champion ADD CONSTRAINT FK_61EE930FA7FD7EB FOREIGN KEY (champion_id) REFERENCES champion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE champion_skin_champion ADD CONSTRAINT FK_61EE9308F56AA5E FOREIGN KEY (skin_champion_id) REFERENCES skin_champion (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB41B7D9BEA');
        $this->addSql('ALTER TABLE champion_spell DROP FOREIGN KEY FK_624E9624FA7FD7EB');
        $this->addSql('ALTER TABLE champion_tag_champion DROP FOREIGN KEY FK_B4C12488FA7FD7EB');
        $this->addSql('ALTER TABLE champion_skin_champion DROP FOREIGN KEY FK_61EE930FA7FD7EB');
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB4C3483C3E');
        $this->addSql('DROP TABLE ally_tip_champion');
        $this->addSql('DROP TABLE champion');
        $this->addSql('DROP TABLE champion_spell');
        $this->addSql('DROP TABLE champion_tag_champion');
        $this->addSql('DROP TABLE champion_skin_champion');
        $this->addSql('DROP TABLE enemy_tip_champion');
        $this->addSql('ALTER TABLE division CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`');
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
