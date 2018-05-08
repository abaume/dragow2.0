<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alliance = DB::table('alliances')->pluck('id')->all();
        $totem = DB::table('totems')->pluck('id')->all();

        for ($i = 0; $i < 10; $i++) {
            $faker = \Faker\Factory::create();
            User::create([
                'name'          => $faker->unique()->name,
                'email'         => $faker->email,
                'password'      => $faker->password,
                'alliance_uuid' => $faker->randomElement($alliance),
                'totem_uuid'    => $faker->randomElement($totem)
            ]);
        }
    }
}
