<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220214152819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE division (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE league (id INT AUTO_INCREMENT NOT NULL, summoner_id INT DEFAULT NULL, queue_id INT DEFAULT NULL, tier_id INT DEFAULT NULL, division_id INT DEFAULT NULL, league_id VARCHAR(255) DEFAULT NULL, league_points INT NOT NULL, wins INT NOT NULL, losses INT NOT NULL, veteran TINYINT(1) NOT NULL, inactive TINYINT(1) NOT NULL, fresh_blood TINYINT(1) NOT NULL, hot_streak TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', update_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', active TINYINT(1) NOT NULL, INDEX IDX_3EB4C318BC01C675 (summoner_id), INDEX IDX_3EB4C318477B5BAE (queue_id), INDEX IDX_3EB4C318A354F9DC (tier_id), INDEX IDX_3EB4C31841859289 (division_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE queue (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE summoner (id INT AUTO_INCREMENT NOT NULL, summoner_id VARCHAR(150) NOT NULL, account_id VARCHAR(150) NOT NULL, puuid VARCHAR(255) NOT NULL, name VARCHAR(100) NOT NULL, profile_icon_id INT NOT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_ABE897635E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tier (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE version (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318BC01C675 FOREIGN KEY (summoner_id) REFERENCES summoner (id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318477B5BAE FOREIGN KEY (queue_id) REFERENCES queue (id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318A354F9DC FOREIGN KEY (tier_id) REFERENCES tier (id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C31841859289 FOREIGN KEY (division_id) REFERENCES division (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C31841859289');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318477B5BAE');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318BC01C675');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318A354F9DC');
        $this->addSql('DROP TABLE division');
        $this->addSql('DROP TABLE league');
        $this->addSql('DROP TABLE queue');
        $this->addSql('DROP TABLE summoner');
        $this->addSql('DROP TABLE tier');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE version');
    }
}
