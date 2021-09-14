<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210914135741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ice_cream (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, illustration VARCHAR(255) NOT NULL, subtitle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_72A6762B12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ice_cream_option (ice_cream_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_8D2566A81489B4EE (ice_cream_id), INDEX IDX_8D2566A8A7C41D6F (option_id), PRIMARY KEY(ice_cream_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ice_cream ADD CONSTRAINT FK_72A6762B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE ice_cream_option ADD CONSTRAINT FK_8D2566A81489B4EE FOREIGN KEY (ice_cream_id) REFERENCES ice_cream (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ice_cream_option ADD CONSTRAINT FK_8D2566A8A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ice_cream_option DROP FOREIGN KEY FK_8D2566A81489B4EE');
        $this->addSql('DROP TABLE ice_cream');
        $this->addSql('DROP TABLE ice_cream_option');
    }
}
