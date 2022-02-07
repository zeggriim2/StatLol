<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220207092448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE league ADD summoner_id INT DEFAULT NULL, ADD queue_id INT DEFAULT NULL, ADD tier_id INT DEFAULT NULL, ADD division_id INT DEFAULT NULL, ADD league_points INT NOT NULL, ADD wins INT NOT NULL, ADD losses INT NOT NULL, ADD veteran TINYINT(1) NOT NULL, ADD inactive TINYINT(1) NOT NULL, ADD fresh_blood TINYINT(1) NOT NULL, ADD hot_streak TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318BC01C675 FOREIGN KEY (summoner_id) REFERENCES summoner (id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318477B5BAE FOREIGN KEY (queue_id) REFERENCES queue (id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318A354F9DC FOREIGN KEY (tier_id) REFERENCES tier (id)');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C31841859289 FOREIGN KEY (division_id) REFERENCES division (id)');
        $this->addSql('CREATE INDEX IDX_3EB4C318BC01C675 ON league (summoner_id)');
        $this->addSql('CREATE INDEX IDX_3EB4C318477B5BAE ON league (queue_id)');
        $this->addSql('CREATE INDEX IDX_3EB4C318A354F9DC ON league (tier_id)');
        $this->addSql('CREATE INDEX IDX_3EB4C31841859289 ON league (division_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE division CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318BC01C675');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318477B5BAE');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318A354F9DC');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C31841859289');
        $this->addSql('DROP INDEX IDX_3EB4C318BC01C675 ON league');
        $this->addSql('DROP INDEX IDX_3EB4C318477B5BAE ON league');
        $this->addSql('DROP INDEX IDX_3EB4C318A354F9DC ON league');
        $this->addSql('DROP INDEX IDX_3EB4C31841859289 ON league');
        $this->addSql('ALTER TABLE league DROP summoner_id, DROP queue_id, DROP tier_id, DROP division_id, DROP league_points, DROP wins, DROP losses, DROP veteran, DROP inactive, DROP fresh_blood, DROP hot_streak, CHANGE league_id league_id VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE queue CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE summoner CHANGE summoner_id summoner_id VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE account_id account_id VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE puuid puuid VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tier CHANGE name name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pseudo pseudo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
