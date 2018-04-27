<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180427160139 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB0CFFE9AD6');
        $this->addSql('DROP INDEX IDX_62809DB0CFFE9AD6 ON order_items');
        $this->addSql('ALTER TABLE order_items ADD product_id INT DEFAULT NULL, ADD price NUMERIC(10, 2) DEFAULT \'0\' NOT NULL, ADD amount NUMERIC(10, 2) DEFAULT \'0\' NOT NULL, DROP product, DROP price_product, DROP price_all_product, CHANGE quantity quantity INT DEFAULT 0 NOT NULL, CHANGE orders_id order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB08D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB04584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_62809DB08D9F6D38 ON order_items (order_id)');
        $this->addSql('CREATE INDEX IDX_62809DB04584665A ON order_items (product_id)');
        $this->addSql('ALTER TABLE orders ADD created_at DATETIME NOT NULL, ADD status SMALLINT DEFAULT 0 NOT NULL, ADD amount NUMERIC(10, 2) DEFAULT \'0\' NOT NULL, DROP date_creation, DROP status_id, DROP order_price, CHANGE user_id user_id INT DEFAULT NULL, CHANGE status_payment is_paid TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEEA76ED395 ON orders (user_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB08D9F6D38');
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB04584665A');
        $this->addSql('DROP INDEX IDX_62809DB08D9F6D38 ON order_items');
        $this->addSql('DROP INDEX IDX_62809DB04584665A ON order_items');
        $this->addSql('ALTER TABLE order_items ADD orders_id INT DEFAULT NULL, ADD product VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD price_product INT NOT NULL, ADD price_all_product INT NOT NULL, DROP order_id, DROP product_id, DROP price, DROP amount, CHANGE quantity quantity INT NOT NULL');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB0CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('CREATE INDEX IDX_62809DB0CFFE9AD6 ON order_items (orders_id)');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA76ED395');
        $this->addSql('DROP INDEX IDX_E52FFDEEA76ED395 ON orders');
        $this->addSql('ALTER TABLE orders ADD date_creation DATE NOT NULL, ADD status_id VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD order_price INT NOT NULL, DROP created_at, DROP status, DROP amount, CHANGE user_id user_id VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE is_paid status_payment TINYINT(1) DEFAULT \'0\' NOT NULL');
    }
}
