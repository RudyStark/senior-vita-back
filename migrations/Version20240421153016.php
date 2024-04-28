<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240421153016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE care_relationship (id INT AUTO_INCREMENT NOT NULL, elderly_id INT NOT NULL, caregiver_id INT NOT NULL, confirmed TINYINT(1) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME DEFAULT NULL, INDEX IDX_AD360BD37623DD43 (elderly_id), INDEX IDX_AD360BD341946261 (caregiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emergency_alert (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, alert_time DATETIME NOT NULL, location VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_97F35E3CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE health_record (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, record_date DATETIME NOT NULL, details LONGTEXT DEFAULT NULL, INDEX IDX_E0DE7714A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE health_report (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, generated_date DATETIME NOT NULL, report_details LONGTEXT DEFAULT NULL, INDEX IDX_BFC59F01A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_appointment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, appointment_time DATETIME NOT NULL, location VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_6CC137F6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, receiver_id INT NOT NULL, content LONGTEXT NOT NULL, timestamp DATETIME NOT NULL, INDEX IDX_B6BD307FF624B39D (sender_id), INDEX IDX_B6BD307FCD53EDB6 (receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, social_security_number VARCHAR(20) NOT NULL, date_of_birth DATE NOT NULL, phone_number VARCHAR(10) NOT NULL, address LONGTEXT NOT NULL, country VARCHAR(255) NOT NULL, INDEX IDX_8157AA0FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE care_relationship ADD CONSTRAINT FK_AD360BD37623DD43 FOREIGN KEY (elderly_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE care_relationship ADD CONSTRAINT FK_AD360BD341946261 FOREIGN KEY (caregiver_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE emergency_alert ADD CONSTRAINT FK_97F35E3CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE health_record ADD CONSTRAINT FK_E0DE7714A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE health_report ADD CONSTRAINT FK_BFC59F01A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE medical_appointment ADD CONSTRAINT FK_6CC137F6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FCD53EDB6 FOREIGN KEY (receiver_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE care_relationship DROP FOREIGN KEY FK_AD360BD37623DD43');
        $this->addSql('ALTER TABLE care_relationship DROP FOREIGN KEY FK_AD360BD341946261');
        $this->addSql('ALTER TABLE emergency_alert DROP FOREIGN KEY FK_97F35E3CA76ED395');
        $this->addSql('ALTER TABLE health_record DROP FOREIGN KEY FK_E0DE7714A76ED395');
        $this->addSql('ALTER TABLE health_report DROP FOREIGN KEY FK_BFC59F01A76ED395');
        $this->addSql('ALTER TABLE medical_appointment DROP FOREIGN KEY FK_6CC137F6A76ED395');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FCD53EDB6');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FA76ED395');
        $this->addSql('DROP TABLE care_relationship');
        $this->addSql('DROP TABLE emergency_alert');
        $this->addSql('DROP TABLE health_record');
        $this->addSql('DROP TABLE health_report');
        $this->addSql('DROP TABLE medical_appointment');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
