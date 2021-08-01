<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210801161110 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE aisle_sign (id INT AUTO_INCREMENT NOT NULL, shop_order_id INT NOT NULL, item_one_id INT NOT NULL, item_two_id INT DEFAULT NULL, item_three_id INT DEFAULT NULL, status_id INT NOT NULL, aisle SMALLINT NOT NULL, quantity SMALLINT NOT NULL, INDEX IDX_1FE60834562797AE (shop_order_id), INDEX IDX_1FE608347D63BBDC (item_one_id), INDEX IDX_1FE60834163F5C13 (item_two_id), INDEX IDX_1FE608341BACC5AE (item_three_id), INDEX IDX_1FE608346BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aisle_sign_item (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, label VARCHAR(100) NOT NULL, picto_image VARCHAR(100) NOT NULL, INDEX IDX_B31EC12012469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aisle_sign_item_category (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_shop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, code VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_shop_address (id INT AUTO_INCREMENT NOT NULL, customer_shop_id INT NOT NULL, address VARCHAR(255) NOT NULL, postal_code INT NOT NULL, city VARCHAR(100) NOT NULL, delivery_info LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_A5ECB251CB6063 (customer_shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, shop_id INT NOT NULL, status_id INT NOT NULL, customer_reference VARCHAR(20) DEFAULT NULL, creation_date DATETIME NOT NULL, delivery_date DATE DEFAULT NULL, INDEX IDX_F52993984D16C4DD (shop_id), INDEX IDX_F52993986BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_sign_status (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_status (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sector_sign (id INT AUTO_INCREMENT NOT NULL, shop_order_id INT NOT NULL, front_item_id INT NOT NULL, back_item_id INT NOT NULL, status_id INT NOT NULL, quantity SMALLINT NOT NULL, INDEX IDX_4910EE1F562797AE (shop_order_id), INDEX IDX_4910EE1FCB5BF4C4 (front_item_id), INDEX IDX_4910EE1FC905B140 (back_item_id), INDEX IDX_4910EE1F6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sector_sign_item (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, customer_shop_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D64951CB6063 (customer_shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aisle_sign ADD CONSTRAINT FK_1FE60834562797AE FOREIGN KEY (shop_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE aisle_sign ADD CONSTRAINT FK_1FE608347D63BBDC FOREIGN KEY (item_one_id) REFERENCES aisle_sign_item (id)');
        $this->addSql('ALTER TABLE aisle_sign ADD CONSTRAINT FK_1FE60834163F5C13 FOREIGN KEY (item_two_id) REFERENCES aisle_sign_item (id)');
        $this->addSql('ALTER TABLE aisle_sign ADD CONSTRAINT FK_1FE608341BACC5AE FOREIGN KEY (item_three_id) REFERENCES aisle_sign_item (id)');
        $this->addSql('ALTER TABLE aisle_sign ADD CONSTRAINT FK_1FE608346BF700BD FOREIGN KEY (status_id) REFERENCES order_sign_status (id)');
        $this->addSql('ALTER TABLE aisle_sign_item ADD CONSTRAINT FK_B31EC12012469DE2 FOREIGN KEY (category_id) REFERENCES aisle_sign_item_category (id)');
        $this->addSql('ALTER TABLE customer_shop_address ADD CONSTRAINT FK_A5ECB251CB6063 FOREIGN KEY (customer_shop_id) REFERENCES customer_shop (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993984D16C4DD FOREIGN KEY (shop_id) REFERENCES customer_shop (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993986BF700BD FOREIGN KEY (status_id) REFERENCES order_status (id)');
        $this->addSql('ALTER TABLE sector_sign ADD CONSTRAINT FK_4910EE1F562797AE FOREIGN KEY (shop_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE sector_sign ADD CONSTRAINT FK_4910EE1FCB5BF4C4 FOREIGN KEY (front_item_id) REFERENCES sector_sign_item (id)');
        $this->addSql('ALTER TABLE sector_sign ADD CONSTRAINT FK_4910EE1FC905B140 FOREIGN KEY (back_item_id) REFERENCES sector_sign_item (id)');
        $this->addSql('ALTER TABLE sector_sign ADD CONSTRAINT FK_4910EE1F6BF700BD FOREIGN KEY (status_id) REFERENCES order_sign_status (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64951CB6063 FOREIGN KEY (customer_shop_id) REFERENCES customer_shop (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aisle_sign DROP FOREIGN KEY FK_1FE608347D63BBDC');
        $this->addSql('ALTER TABLE aisle_sign DROP FOREIGN KEY FK_1FE60834163F5C13');
        $this->addSql('ALTER TABLE aisle_sign DROP FOREIGN KEY FK_1FE608341BACC5AE');
        $this->addSql('ALTER TABLE aisle_sign_item DROP FOREIGN KEY FK_B31EC12012469DE2');
        $this->addSql('ALTER TABLE customer_shop_address DROP FOREIGN KEY FK_A5ECB251CB6063');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984D16C4DD');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64951CB6063');
        $this->addSql('ALTER TABLE aisle_sign DROP FOREIGN KEY FK_1FE60834562797AE');
        $this->addSql('ALTER TABLE sector_sign DROP FOREIGN KEY FK_4910EE1F562797AE');
        $this->addSql('ALTER TABLE aisle_sign DROP FOREIGN KEY FK_1FE608346BF700BD');
        $this->addSql('ALTER TABLE sector_sign DROP FOREIGN KEY FK_4910EE1F6BF700BD');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993986BF700BD');
        $this->addSql('ALTER TABLE sector_sign DROP FOREIGN KEY FK_4910EE1FCB5BF4C4');
        $this->addSql('ALTER TABLE sector_sign DROP FOREIGN KEY FK_4910EE1FC905B140');
        $this->addSql('DROP TABLE aisle_sign');
        $this->addSql('DROP TABLE aisle_sign_item');
        $this->addSql('DROP TABLE aisle_sign_item_category');
        $this->addSql('DROP TABLE customer_shop');
        $this->addSql('DROP TABLE customer_shop_address');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_sign_status');
        $this->addSql('DROP TABLE order_status');
        $this->addSql('DROP TABLE sector_sign');
        $this->addSql('DROP TABLE sector_sign_item');
        $this->addSql('DROP TABLE user');
    }
}
