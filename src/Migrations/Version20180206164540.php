<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180206164540 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE odj (id INT AUTO_INCREMENT NOT NULL, reunion_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, echanges LONGTEXT NOT NULL, cr_officiel LONGTEXT NOT NULL, INDEX IDX_103C73EA4E9B7368 (reunion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reunion (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, dates LONGTEXT NOT NULL COMMENT \'(DC2Type:object)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE odj ADD CONSTRAINT FK_103C73EA4E9B7368 FOREIGN KEY (reunion_id) REFERENCES reunion (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE odj DROP FOREIGN KEY FK_103C73EA4E9B7368');
        $this->addSql('DROP TABLE odj');
        $this->addSql('DROP TABLE reunion');
    }
}
