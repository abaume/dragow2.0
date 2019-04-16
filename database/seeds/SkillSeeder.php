<?php

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = \Faker\Factory::create();
            Skill::create([
                'exploration'   => $faker->randomDigitNotNull(),
                'cooperation'  => $faker->randomDigitNotNull()
            ]);
        }
    }
}
