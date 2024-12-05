<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241203040743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservaciones (id INT AUTO_INCREMENT NOT NULL, usuario_id_id INT NOT NULL, medios_id_id INT NOT NULL, aulas_id_id INT NOT NULL, descripcion VARCHAR(255) NOT NULL, fecha DATE NOT NULL, estado VARCHAR(30) NOT NULL, hora_inicio TIME NOT NULL, hora_final TIME NOT NULL, INDEX IDX_46408D55629AF449 (usuario_id_id), INDEX IDX_46408D555492A9CF (medios_id_id), INDEX IDX_46408D55D5957D83 (aulas_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservaciones ADD CONSTRAINT FK_46408D55629AF449 FOREIGN KEY (usuario_id_id) REFERENCES usuariouni (id)');
        $this->addSql('ALTER TABLE reservaciones ADD CONSTRAINT FK_46408D555492A9CF FOREIGN KEY (medios_id_id) REFERENCES medios (id)');
        $this->addSql('ALTER TABLE reservaciones ADD CONSTRAINT FK_46408D55D5957D83 FOREIGN KEY (aulas_id_id) REFERENCES aulas (id)');
        $this->addSql('ALTER TABLE reservas CHANGE usuario_id usuario_id INT NOT NULL, CHANGE medios_id medios_id INT NOT NULL, CHANGE aulas_id aulas_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservas RENAME INDEX idx_aa1dab01629af449 TO IDX_AA1DAB01DB38439E');
        $this->addSql('ALTER TABLE reservas RENAME INDEX idx_aa1dab015492a9cf TO IDX_AA1DAB0178C4192A');
        $this->addSql('ALTER TABLE reservas RENAME INDEX idx_aa1dab01d5957d83 TO IDX_AA1DAB01FCDD024C');
        $this->addSql('ALTER TABLE usuariouni CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservaciones DROP FOREIGN KEY FK_46408D55629AF449');
        $this->addSql('ALTER TABLE reservaciones DROP FOREIGN KEY FK_46408D555492A9CF');
        $this->addSql('ALTER TABLE reservaciones DROP FOREIGN KEY FK_46408D55D5957D83');
        $this->addSql('DROP TABLE reservaciones');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE reservas CHANGE usuario_id usuario_id INT DEFAULT NULL, CHANGE medios_id medios_id INT DEFAULT NULL, CHANGE aulas_id aulas_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservas RENAME INDEX idx_aa1dab01db38439e TO IDX_AA1DAB01629AF449');
        $this->addSql('ALTER TABLE reservas RENAME INDEX idx_aa1dab0178c4192a TO IDX_AA1DAB015492A9CF');
        $this->addSql('ALTER TABLE reservas RENAME INDEX idx_aa1dab01fcdd024c TO IDX_AA1DAB01D5957D83');
        $this->addSql('ALTER TABLE usuariouni CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
