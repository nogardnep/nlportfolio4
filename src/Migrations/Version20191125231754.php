<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191125231754 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, system_name VARCHAR(255) NOT NULL, displayed_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_937AB0344FEFCDF0 (system_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speech (id INT AUTO_INCREMENT NOT NULL, speaker_id INT NOT NULL, system_name VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, context VARCHAR(255) DEFAULT NULL, fair TINYINT(1) NOT NULL, content LONGTEXT NOT NULL, created_at DATE NOT NULL, utterance_dates LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_8AFBE1F74FEFCDF0 (system_name), INDEX IDX_8AFBE1F7D04A0F27 (speaker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE speech ADD CONSTRAINT FK_8AFBE1F7D04A0F27 FOREIGN KEY (speaker_id) REFERENCES `character` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE speech DROP FOREIGN KEY FK_8AFBE1F7D04A0F27');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE speech');
    }
}
