<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240112122357 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, code_raccourci VARCHAR(255) NOT NULL, nom_category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, nom_contact VARCHAR(255) NOT NULL, prenom_contact VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE educateurs (id INT AUTO_INCREMENT NOT NULL, licencier_id INT DEFAULT NULL, email_educateur VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, est_admin TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_CE18B2EE81002A8 (licencier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licenciers (id INT AUTO_INCREMENT NOT NULL, contact_id_id INT DEFAULT NULL, category_id INT DEFAULT NULL, numero_licencier INT NOT NULL, nom_licencier VARCHAR(255) NOT NULL, prenom_licencier VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6F20966A526E8E58 (contact_id_id), INDEX IDX_6F20966A12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_contacts (id INT AUTO_INCREMENT NOT NULL, date_denvoi DATETIME NOT NULL, objet VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_contacts_licenciers (mail_contacts_id INT NOT NULL, licenciers_id INT NOT NULL, INDEX IDX_69749DDDC540C953 (mail_contacts_id), INDEX IDX_69749DDD3F7486FD (licenciers_id), PRIMARY KEY(mail_contacts_id, licenciers_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mails_educateurs (id INT AUTO_INCREMENT NOT NULL, educateurs_id INT DEFAULT NULL, date_denvoi DATETIME NOT NULL, objet VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_4B7A932A26C38 (educateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mails_educateurs_educateurs (mails_educateurs_id INT NOT NULL, educateurs_id INT NOT NULL, INDEX IDX_205732FE6B6ED545 (mails_educateurs_id), INDEX IDX_205732FEA26C38 (educateurs_id), PRIMARY KEY(mails_educateurs_id, educateurs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE educateurs ADD CONSTRAINT FK_CE18B2EE81002A8 FOREIGN KEY (licencier_id) REFERENCES licenciers (id)');
        $this->addSql('ALTER TABLE licenciers ADD CONSTRAINT FK_6F20966A526E8E58 FOREIGN KEY (contact_id_id) REFERENCES contacts (id)');
        $this->addSql('ALTER TABLE licenciers ADD CONSTRAINT FK_6F20966A12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE mail_contacts_licenciers ADD CONSTRAINT FK_69749DDDC540C953 FOREIGN KEY (mail_contacts_id) REFERENCES mail_contacts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_contacts_licenciers ADD CONSTRAINT FK_69749DDD3F7486FD FOREIGN KEY (licenciers_id) REFERENCES licenciers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mails_educateurs ADD CONSTRAINT FK_4B7A932A26C38 FOREIGN KEY (educateurs_id) REFERENCES educateurs (id)');
        $this->addSql('ALTER TABLE mails_educateurs_educateurs ADD CONSTRAINT FK_205732FE6B6ED545 FOREIGN KEY (mails_educateurs_id) REFERENCES mails_educateurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mails_educateurs_educateurs ADD CONSTRAINT FK_205732FEA26C38 FOREIGN KEY (educateurs_id) REFERENCES educateurs (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE educateurs DROP FOREIGN KEY FK_CE18B2EE81002A8');
        $this->addSql('ALTER TABLE licenciers DROP FOREIGN KEY FK_6F20966A526E8E58');
        $this->addSql('ALTER TABLE licenciers DROP FOREIGN KEY FK_6F20966A12469DE2');
        $this->addSql('ALTER TABLE mail_contacts_licenciers DROP FOREIGN KEY FK_69749DDDC540C953');
        $this->addSql('ALTER TABLE mail_contacts_licenciers DROP FOREIGN KEY FK_69749DDD3F7486FD');
        $this->addSql('ALTER TABLE mails_educateurs DROP FOREIGN KEY FK_4B7A932A26C38');
        $this->addSql('ALTER TABLE mails_educateurs_educateurs DROP FOREIGN KEY FK_205732FE6B6ED545');
        $this->addSql('ALTER TABLE mails_educateurs_educateurs DROP FOREIGN KEY FK_205732FEA26C38');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('DROP TABLE educateurs');
        $this->addSql('DROP TABLE licenciers');
        $this->addSql('DROP TABLE mail_contacts');
        $this->addSql('DROP TABLE mail_contacts_licenciers');
        $this->addSql('DROP TABLE mails_educateurs');
        $this->addSql('DROP TABLE mails_educateurs_educateurs');
    }
}
