<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241203000740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservas (id INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(255) NOT NULL, fecha DATE NOT NULL, estado VARCHAR(30) NOT NULL, hora_inicio TIME NOT NULL, hora_final TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservas_usuariouni (reservas_id INT NOT NULL, usuariouni_id INT NOT NULL, INDEX IDX_4A6DEA2E4976A656 (reservas_id), INDEX IDX_4A6DEA2E84E7D6D4 (usuariouni_id), PRIMARY KEY(reservas_id, usuariouni_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservas_medios (reservas_id INT NOT NULL, medios_id INT NOT NULL, INDEX IDX_1A6825474976A656 (reservas_id), INDEX IDX_1A68254778C4192A (medios_id), PRIMARY KEY(reservas_id, medios_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservas_aulas (reservas_id INT NOT NULL, aulas_id INT NOT NULL, INDEX IDX_FAB977204976A656 (reservas_id), INDEX IDX_FAB97720FCDD024C (aulas_id), PRIMARY KEY(reservas_id, aulas_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservas_usuariouni ADD CONSTRAINT FK_4A6DEA2E4976A656 FOREIGN KEY (reservas_id) REFERENCES reservas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservas_usuariouni ADD CONSTRAINT FK_4A6DEA2E84E7D6D4 FOREIGN KEY (usuariouni_id) REFERENCES usuariouni (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservas_medios ADD CONSTRAINT FK_1A6825474976A656 FOREIGN KEY (reservas_id) REFERENCES reservas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservas_medios ADD CONSTRAINT FK_1A68254778C4192A FOREIGN KEY (medios_id) REFERENCES medios (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservas_aulas ADD CONSTRAINT FK_FAB977204976A656 FOREIGN KEY (reservas_id) REFERENCES reservas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservas_aulas ADD CONSTRAINT FK_FAB97720FCDD024C FOREIGN KEY (aulas_id) REFERENCES aulas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuariouni CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservas_usuariouni DROP FOREIGN KEY FK_4A6DEA2E4976A656');
        $this->addSql('ALTER TABLE reservas_usuariouni DROP FOREIGN KEY FK_4A6DEA2E84E7D6D4');
        $this->addSql('ALTER TABLE reservas_medios DROP FOREIGN KEY FK_1A6825474976A656');
        $this->addSql('ALTER TABLE reservas_medios DROP FOREIGN KEY FK_1A68254778C4192A');
        $this->addSql('ALTER TABLE reservas_aulas DROP FOREIGN KEY FK_FAB977204976A656');
        $this->addSql('ALTER TABLE reservas_aulas DROP FOREIGN KEY FK_FAB97720FCDD024C');
        $this->addSql('DROP TABLE reservas');
        $this->addSql('DROP TABLE reservas_usuariouni');
        $this->addSql('DROP TABLE reservas_medios');
        $this->addSql('DROP TABLE reservas_aulas');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE usuariouni CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
