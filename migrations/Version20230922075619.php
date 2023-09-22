<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230922075619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE auto ADD id_umfassende_klasse INT NOT NULL');
        $this->addSql('ALTER TABLE einrad ADD id_umfassende_klasse INT NOT NULL');
        $this->addSql('ALTER TABLE fahrrad ADD id_umfassende_klasse INT NOT NULL');
        $this->addSql('ALTER TABLE roller ADD id_umfassende_klasse INT NOT NULL');
        $this->addSql('ALTER TABLE tretauto ADD id_umfassende_klasse INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tretauto DROP id_umfassende_klasse');
        $this->addSql('ALTER TABLE einrad DROP id_umfassende_klasse');
        $this->addSql('ALTER TABLE fahrrad DROP id_umfassende_klasse');
        $this->addSql('ALTER TABLE roller DROP id_umfassende_klasse');
        $this->addSql('ALTER TABLE auto DROP id_umfassende_klasse');
    }
}
