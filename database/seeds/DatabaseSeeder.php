<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AllianceSeeder::class);
        $this->call(TotemSeeder::class);
        $this->call(RaceSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(ContestSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BreedingSeeder::class);
        $this->call(AppearanceSeeder::class);
        $this->call(DragonSeeder::class);
        $this->call(ParticipationSeeder::class);
    }
}
