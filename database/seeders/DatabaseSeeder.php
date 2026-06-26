<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SiteSettingSeeder::class,
            PageSeeder::class,
            ServiceSeeder::class,
            NewsSeeder::class,
            EventSeeder::class,
            PortfolioSeeder::class,
            CatalogSeeder::class,
        ]);
    }
}
