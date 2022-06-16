<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615115634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE list_salary DROP FOREIGN KEY FK_DC3795FCC50E86B');
        $this->addSql('DROP INDEX UNIQ_DC3795FCC50E86B ON list_salary');
        $this->addSql('ALTER TABLE list_salary DROP id_log_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE list_salary ADD id_log_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE list_salary ADD CONSTRAINT FK_DC3795FCC50E86B FOREIGN KEY (id_log_id) REFERENCES user_controller (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DC3795FCC50E86B ON list_salary (id_log_id)');
    }
}
