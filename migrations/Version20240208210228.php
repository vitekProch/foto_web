<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208210228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo_package_details (id INT AUTO_INCREMENT NOT NULL, photo_package_name_id INT DEFAULT NULL, photo_package_detail_title VARCHAR(255) NOT NULL, photo_package_detail_photo_amount INT NOT NULL, photo_package_detail_price INT NOT NULL, INDEX IDX_E8BF7039EB8EE765 (photo_package_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_package_names (id INT AUTO_INCREMENT NOT NULL, photo_package_title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo_package_details ADD CONSTRAINT FK_E8BF7039EB8EE765 FOREIGN KEY (photo_package_name_id) REFERENCES photo_package_names (id)');
        $this->addSql('ALTER TABLE photo_packages_details_photo_packages_names DROP FOREIGN KEY FK_F4D7ED3522504CEF');
        $this->addSql('ALTER TABLE photo_packages_details_photo_packages_names DROP FOREIGN KEY FK_F4D7ED35FB2EB430');
        $this->addSql('DROP TABLE photo_packages_details');
        $this->addSql('DROP TABLE photo_packages_details_photo_packages_names');
        $this->addSql('DROP TABLE photo_packages_names');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo_packages_details (id INT AUTO_INCREMENT NOT NULL, photo_package_subname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, number_of_photos INT NOT NULL, package_price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE photo_packages_details_photo_packages_names (photo_packages_details_id INT NOT NULL, photo_packages_names_id INT NOT NULL, INDEX IDX_F4D7ED3522504CEF (photo_packages_details_id), INDEX IDX_F4D7ED35FB2EB430 (photo_packages_names_id), PRIMARY KEY(photo_packages_details_id, photo_packages_names_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE photo_packages_names (id INT AUTO_INCREMENT NOT NULL, photo_package_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE photo_packages_details_photo_packages_names ADD CONSTRAINT FK_F4D7ED3522504CEF FOREIGN KEY (photo_packages_details_id) REFERENCES photo_packages_details (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo_packages_details_photo_packages_names ADD CONSTRAINT FK_F4D7ED35FB2EB430 FOREIGN KEY (photo_packages_names_id) REFERENCES photo_packages_names (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo_package_details DROP FOREIGN KEY FK_E8BF7039EB8EE765');
        $this->addSql('DROP TABLE photo_package_details');
        $this->addSql('DROP TABLE photo_package_names');
    }
}
