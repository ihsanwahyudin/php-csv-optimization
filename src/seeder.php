<?php

namespace Ihsan\PhpCsvOptimization;

require 'vendor/autoload.php';

use Faker\Factory;

class Seeder
{
    public function generate(): void
    {
        $faker = Factory::create('id_ID');

        $headers = ['Batch ID', 'First Name', 'Last Name', 'Phone Number', 'Email', 'Birthday', 'NRIC'];
        
        $fp = fopen('sample.csv', 'a');
        fwrite($fp, implode(',', $headers) . PHP_EOL);
        for($i = 1; $i <= 100_000_000; $i++) {
            fwrite($fp, implode(',', [
                $i,
                $faker->firstName(),
                $faker->lastName(),
                $faker->phoneNumber(),
                $faker->email(),
                $faker->date('d/m/Y', date('Y-m-d', strtotime('2005-12-30'))),
                $faker->numberBetween(100_000_000_000, 900_000_000_000),
            ]) . PHP_EOL);
        }
        fclose($fp);
    }
}

ini_set('memory_limit', '-1');
(new Seeder)->generate();