<?php

use App\Models\Participation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dragon     = DB::table('dragons')->pluck('id')->all();
        $contest    = DB::table('contests')->pluck('id')->all();

        for ($i = 0; $i < 10; $i++) {
            $faker = \Faker\Factory::create();
            Participation::create([
                'dragon_uuid'   => $faker->randomElement($dragon),
                'contest_uuid'  => $faker->randomElement($contest)
            ]);
        }
    }
}
