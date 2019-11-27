<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191126143746 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE merlin_speech (id INT AUTO_INCREMENT NOT NULL, subject_id INT DEFAULT NULL, fair TINYINT(1) NOT NULL, content LONGTEXT NOT NULL, created_at DATE NOT NULL, INDEX IDX_40CAB40A23EDC87 (subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personage (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personage_speech (id INT AUTO_INCREMENT NOT NULL, subject_id INT DEFAULT NULL, personage_id INT DEFAULT NULL, fair TINYINT(1) NOT NULL, content LONGTEXT NOT NULL, created_at DATE NOT NULL, context VARCHAR(255) DEFAULT NULL, INDEX IDX_66B7DE3723EDC87 (subject_id), INDEX IDX_66B7DE37EA8E3E4A (personage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE merlin_speech ADD CONSTRAINT FK_40CAB40A23EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE personage_speech ADD CONSTRAINT FK_66B7DE3723EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE personage_speech ADD CONSTRAINT FK_66B7DE37EA8E3E4A FOREIGN KEY (personage_id) REFERENCES personage (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE personage_speech DROP FOREIGN KEY FK_66B7DE37EA8E3E4A');
        $this->addSql('ALTER TABLE merlin_speech DROP FOREIGN KEY FK_40CAB40A23EDC87');
        $this->addSql('ALTER TABLE personage_speech DROP FOREIGN KEY FK_66B7DE3723EDC87');
        $this->addSql('DROP TABLE merlin_speech');
        $this->addSql('DROP TABLE personage');
        $this->addSql('DROP TABLE personage_speech');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE user');
    }
}
