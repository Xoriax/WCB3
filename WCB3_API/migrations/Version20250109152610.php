<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250109152610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE unlockcharacters_id_seq CASCADE');
        $this->addSql('CREATE TABLE unlocked_characters (id SERIAL NOT NULL, users_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A9374F2667B3B43D ON unlocked_characters (users_id)');
        $this->addSql('ALTER TABLE unlocked_characters ADD CONSTRAINT FK_A9374F2667B3B43D FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE unlockcharacters DROP CONSTRAINT fk_9cf8ef5f5e5c27e9');
        $this->addSql('ALTER TABLE unlockcharacters DROP CONSTRAINT fk_9cf8ef5fed6119c1');
        $this->addSql('DROP TABLE unlockcharacters');
        $this->addSql('ALTER TABLE character ALTER lore TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE character ALTER img SET NOT NULL');
        $this->addSql('ALTER TABLE users ADD is_verified BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE users ALTER pseudo TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE unlockcharacters_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE unlockcharacters (id SERIAL NOT NULL, iduser INT DEFAULT NULL, idcharacter INT DEFAULT NULL, qty INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_9cf8ef5fed6119c1 ON unlockcharacters (idcharacter)');
        $this->addSql('CREATE INDEX idx_9cf8ef5f5e5c27e9 ON unlockcharacters (iduser)');
        $this->addSql('ALTER TABLE unlockcharacters ADD CONSTRAINT fk_9cf8ef5f5e5c27e9 FOREIGN KEY (iduser) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE unlockcharacters ADD CONSTRAINT fk_9cf8ef5fed6119c1 FOREIGN KEY (idcharacter) REFERENCES "character" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE unlocked_characters DROP CONSTRAINT FK_A9374F2667B3B43D');
        $this->addSql('DROP TABLE unlocked_characters');
        $this->addSql('ALTER TABLE character ALTER lore TYPE TEXT');
        $this->addSql('ALTER TABLE character ALTER img DROP NOT NULL');
        $this->addSql('ALTER TABLE users DROP is_verified');
        $this->addSql('ALTER TABLE users ALTER pseudo TYPE VARCHAR(50)');
    }
}
