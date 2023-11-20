<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231120013134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE portfolio_photos (id INT AUTO_INCREMENT NOT NULL, photo_category_id INT NOT NULL, portfolio_photo_name VARCHAR(255) NOT NULL, portfolio_alt VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E9D0DEC1CD1713E (photo_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE portfolio_photos ADD CONSTRAINT FK_E9D0DEC1CD1713E FOREIGN KEY (photo_category_id) REFERENCES photo_categories (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE portfolio_photos DROP FOREIGN KEY FK_E9D0DEC1CD1713E');
        $this->addSql('DROP TABLE portfolio_photos');
    }
}
