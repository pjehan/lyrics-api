<?php

namespace App\DataFixtures;

use App\ApiResource\Music;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Loop through CSV file and save each row as a new Music entity
        $file = new \SplFileObject(__DIR__ . '/data.csv');
        $file->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY | \SplFileObject::DROP_NEW_LINE);
        $row = 0;
        foreach ($file as $line) {
            if ($row > 0 && is_array($line)) {
                $music = new Music();
                $music->setTitle($line[0]);
                $music->setArtist($line[2]);
                $year = new \DateTimeImmutable($line[1]);
                $music->setYear($year->format('Y'));
                $music->setGenres($line[3]);
                $music->setLyrics($line[4]);
                $manager->persist($music);
                if ($row % 100 === 0) {
                    $manager->flush();
                    echo "Saved $row rows" . PHP_EOL;
                }
            }
            $row++;
        }
        $manager->flush();
    }
}
