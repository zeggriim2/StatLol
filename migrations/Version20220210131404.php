<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220210131404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE champion (id INT AUTO_INCREMENT NOT NULL, info_champion_id INT DEFAULT NULL, version_id INT DEFAULT NULL, image_id INT DEFAULT NULL, part_type_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, `key` VARCHAR(150) NOT NULL, id_champion VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, blurb LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_45437EB42547FD14 (info_champion_id), INDEX IDX_45437EB44BBC2705 (version_id), UNIQUE INDEX UNIQ_45437EB43DA5256D (image_id), INDEX IDX_45437EB445107B98 (part_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE division (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, full VARCHAR(150) NOT NULL, sprite VARCHAR(150) NOT NULL, `group` VARCHAR(255) NOT NULL, pos_x INT NOT NULL, pos_y INT NOT NULL, pos_w INT NOT NULL, pos_h INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_champion (id INT AUTO_INCREMENT NOT NULL, attack INT NOT NULL, defense INT NOT NULL, magic INT NOT NULL, difficulty INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE league (id INT AUTO_INCREMENT NOT NULL, summoner_id INT DEFAULT NULL, queue_id INT DEFAULT NULL, tier_id INT DEFAULT NULL, division_id INT DEFAULT NULL, league_id VARCHAR(255) DEFAULT NULL, league_points INT NOT NULL, wins INT NOT NULL, losses INT NOT NULL, veteran TINYINT(1) NOT NULL, inactive TINYINT(1) NOT NULL, fresh_blood TINYINT(1) NOT NULL, hot_streak TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', update_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', active TINYINT(1) NOT NULL, INDEX IDX_3EB4C318BC01C675 (summoner_id), INDEX IDX_3EB4C318477B5BAE (queue_id), INDEX IDX_3EB4C318A354F9DC (tier_id), INDEX IDX_3EB4C31841859289 (division_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE queue (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE summoner (id INT AUTO_INCREMENT NOT NULL, summoner_id VARCHAR(150) NOT NULL, account_id VARCHAR(150) NOT NULL, puuid VARCHAR(255) NOT NULL, name VARCHAR(100) NOT NULL, profile_icon_id INT NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_ABE897635E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tier (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE version (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB42547FD14 FOREIGN KEY (info_champion_id) REFERENCES info_champion (id)');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB44BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB43DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE champion ADD CONSTRAINT FK_45437EB445107B98 FOREIGN KEY (part_type_id) REFERENCES part_type (id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318BC01C675 FOREIGN KEY (summoner_id) REFERENCES summoner (id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318477B5BAE FOREIGN KEY (queue_id) REFERENCES queue (id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318A354F9DC FOREIGN KEY (tier_id) REFERENCES tier (id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C31841859289 FOREIGN KEY (division_id) REFERENCES division (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C31841859289');
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB43DA5256D');
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB42547FD14');
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB445107B98');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318477B5BAE');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318BC01C675');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318A354F9DC');
        $this->addSql('ALTER TABLE champion DROP FOREIGN KEY FK_45437EB44BBC2705');
        $this->addSql('DROP TABLE champion');
        $this->addSql('DROP TABLE division');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE info_champion');
        $this->addSql('DROP TABLE league');
        $this->addSql('DROP TABLE part_type');
        $this->addSql('DROP TABLE queue');
        $this->addSql('DROP TABLE summoner');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tier');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE version');
    }
}
