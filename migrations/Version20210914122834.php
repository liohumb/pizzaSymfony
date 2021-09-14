<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210914122834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE drink_size (drink_id INT NOT NULL, size_id INT NOT NULL, INDEX IDX_FF0AF7F236AA4BB4 (drink_id), INDEX IDX_FF0AF7F2498DA827 (size_id), PRIMARY KEY(drink_id, size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pizza_size (pizza_id INT NOT NULL, size_id INT NOT NULL, INDEX IDX_3FE4A7BFD41D1D42 (pizza_id), INDEX IDX_3FE4A7BF498DA827 (size_id), PRIMARY KEY(pizza_id, size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE drink_size ADD CONSTRAINT FK_FF0AF7F236AA4BB4 FOREIGN KEY (drink_id) REFERENCES drink (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE drink_size ADD CONSTRAINT FK_FF0AF7F2498DA827 FOREIGN KEY (size_id) REFERENCES size (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizza_size ADD CONSTRAINT FK_3FE4A7BFD41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizza_size ADD CONSTRAINT FK_3FE4A7BF498DA827 FOREIGN KEY (size_id) REFERENCES size (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE drink_size');
        $this->addSql('DROP TABLE pizza_size');
    }
}
