<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180410160828 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09CFFE9AD6');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, date_creation DATE NOT NULL, status_id VARCHAR(255) NOT NULL, status_payment TINYINT(1) DEFAULT \'0\' NOT NULL, user_id VARCHAR(255) NOT NULL, order_price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_items (id INT AUTO_INCREMENT NOT NULL, orders_id INT DEFAULT NULL, product VARCHAR(255) NOT NULL, quantity INT NOT NULL, price_product INT NOT NULL, price_all_product INT NOT NULL, INDEX IDX_62809DB0CFFE9AD6 (orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB0CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_item');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB0CFFE9AD6');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, date_creation DATE NOT NULL, status_id VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, status_payment TINYINT(1) DEFAULT \'0\' NOT NULL, user_id VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, order_price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_item (id INT AUTO_INCREMENT NOT NULL, orders_id INT DEFAULT NULL, product VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, quantity INT NOT NULL, price_product INT NOT NULL, price_all_product INT NOT NULL, INDEX IDX_52EA1F09CFFE9AD6 (orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES `order` (id)');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE order_items');
    }
}
