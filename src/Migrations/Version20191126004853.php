<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191126004853 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE personage (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speech (id INT AUTO_INCREMENT NOT NULL, personage_id INT DEFAULT NULL, subject_id INT DEFAULT NULL, INDEX IDX_8AFBE1F7EA8E3E4A (personage_id), INDEX IDX_8AFBE1F723EDC87 (subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE speech ADD CONSTRAINT FK_8AFBE1F7EA8E3E4A FOREIGN KEY (personage_id) REFERENCES personage (id)');
        $this->addSql('ALTER TABLE speech ADD CONSTRAINT FK_8AFBE1F723EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE speech DROP FOREIGN KEY FK_8AFBE1F7EA8E3E4A');
        $this->addSql('ALTER TABLE speech DROP FOREIGN KEY FK_8AFBE1F723EDC87');
        $this->addSql('DROP TABLE personage');
        $this->addSql('DROP TABLE speech');
        $this->addSql('DROP TABLE subject');
    }
}
