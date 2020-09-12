<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200912153049 extends AbstractMigration
{
    private const DATA = [
        [
            'title' => 'Tenet',
            'year' => '2020-01-01',
        ],
        [
            'title' => 'Titanic',
            'year' => '1997-01-01',
        ],
        [
            'title' => 'Scary Movie',
            'year' => '2000-01-01',
        ],
    ];

    public function getDescription() : string
    {
        return 'Add films to film table';
    }

    public function up(Schema $schema) : void
    {
        foreach(self::DATA as $item)
        {
            $this->connection->insert('film', $item);
        }
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('TRUNCATE film');
    }
}
