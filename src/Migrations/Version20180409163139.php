<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180409163139 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE order_item (id INT AUTO_INCREMENT NOT NULL, product VARCHAR(255) NOT NULL, quantity INT NOT NULL, price_product INT NOT NULL, price_all_product INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, date_creation DATE NOT NULL, status_id VARCHAR(255) NOT NULL, status_payment TINYINT(1) DEFAULT \'0\' NOT NULL, user_id VARCHAR(255) NOT NULL, order_price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products CHANGE is_top is_top TINYINT(1) DEFAULT \'0\' NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE order_item');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('ALTER TABLE products CHANGE is_top is_top TINYINT(1) DEFAULT NULL');
    }
}
