<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616145525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE list_conge ADD id_salary_fk_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE list_conge ADD CONSTRAINT FK_F74B074B13518F02 FOREIGN KEY (id_salary_fk_id) REFERENCES list_salary (id)');
        $this->addSql('CREATE INDEX IDX_F74B074B13518F02 ON list_conge (id_salary_fk_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE list_conge DROP FOREIGN KEY FK_F74B074B13518F02');
        $this->addSql('DROP INDEX IDX_F74B074B13518F02 ON list_conge');
        $this->addSql('ALTER TABLE list_conge DROP id_salary_fk_id');
    }
}
