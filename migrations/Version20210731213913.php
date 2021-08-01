<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210731213913 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE customer_shop (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(150) NOT NULL, code VARCHAR(10) DEFAULT NULL, UNIQUE INDEX UNIQ_F8FBE8D5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_shop_address (id INT AUTO_INCREMENT NOT NULL, customer_shop_id INT NOT NULL, address VARCHAR(255) NOT NULL, postal_code INT NOT NULL, city VARCHAR(100) NOT NULL, delivery_info LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_A5ECB251CB6063 (customer_shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer_shop ADD CONSTRAINT FK_F8FBE8D5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE customer_shop_address ADD CONSTRAINT FK_A5ECB251CB6063 FOREIGN KEY (customer_shop_id) REFERENCES customer_shop (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE customer_shop_address DROP FOREIGN KEY FK_A5ECB251CB6063');
        $this->addSql('ALTER TABLE customer_shop DROP FOREIGN KEY FK_F8FBE8D5A76ED395');
        $this->addSql('DROP TABLE customer_shop');
        $this->addSql('DROP TABLE customer_shop_address');
        $this->addSql('DROP TABLE user');
    }
}
