<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209010138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wedding_photo_package_items (id INT AUTO_INCREMENT NOT NULL, wedding_photo_packages_id INT DEFAULT NULL, wedding_photo_package_item_name VARCHAR(255) NOT NULL, INDEX IDX_D36F49E5FC40AA5A (wedding_photo_packages_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wedding_photo_package_type (id INT AUTO_INCREMENT NOT NULL, wedding_photo_package_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wedding_photo_packages (id INT AUTO_INCREMENT NOT NULL, wedding_photo_package_type_id INT DEFAULT NULL, wedding_photo_package_name VARCHAR(255) NOT NULL, wedding_photo_package_price INT NOT NULL, INDEX IDX_C1439CE175442BEB (wedding_photo_package_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wedding_photo_package_items ADD CONSTRAINT FK_D36F49E5FC40AA5A FOREIGN KEY (wedding_photo_packages_id) REFERENCES wedding_photo_packages (id)');
        $this->addSql('ALTER TABLE wedding_photo_packages ADD CONSTRAINT FK_C1439CE175442BEB FOREIGN KEY (wedding_photo_package_type_id) REFERENCES wedding_photo_package_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wedding_photo_package_items DROP FOREIGN KEY FK_D36F49E5FC40AA5A');
        $this->addSql('ALTER TABLE wedding_photo_packages DROP FOREIGN KEY FK_C1439CE175442BEB');
        $this->addSql('DROP TABLE wedding_photo_package_items');
        $this->addSql('DROP TABLE wedding_photo_package_type');
        $this->addSql('DROP TABLE wedding_photo_packages');
    }
}
