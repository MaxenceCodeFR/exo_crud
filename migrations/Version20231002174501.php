<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231002174501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cheveux_entity (id INT AUTO_INCREMENT NOT NULL, couleurs_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_4BA9E6B05ED47289 (couleurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE humain_entity (id INT AUTO_INCREMENT NOT NULL, cheveux VARCHAR(255) NOT NULL, yeux VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE yeux_entity (id INT AUTO_INCREMENT NOT NULL, couleurs_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_76D062845ED47289 (couleurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cheveux_entity ADD CONSTRAINT FK_4BA9E6B05ED47289 FOREIGN KEY (couleurs_id) REFERENCES humain_entity (id)');
        $this->addSql('ALTER TABLE yeux_entity ADD CONSTRAINT FK_76D062845ED47289 FOREIGN KEY (couleurs_id) REFERENCES humain_entity (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cheveux_entity DROP FOREIGN KEY FK_4BA9E6B05ED47289');
        $this->addSql('ALTER TABLE yeux_entity DROP FOREIGN KEY FK_76D062845ED47289');
        $this->addSql('DROP TABLE cheveux_entity');
        $this->addSql('DROP TABLE humain_entity');
        $this->addSql('DROP TABLE yeux_entity');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
