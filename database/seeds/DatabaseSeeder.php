<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call(MainInfoSeeder::class);
        DB::table('sports')->truncate();
        DB::table('sports')->insert(
            array(
                ['name' => 'football'],
                ['name' => 'basketball'])
        );
        DB::table('roles')->truncate();
        DB::table('roles')->insert(
            array(
                ['name' => 'Admin', 'grants' => 'all'],
                ['name' => 'Creator', 'grants' => 'add'],
                ['name' => 'Team Leader', 'grants' => 'team'],
                ['name' => 'User', 'grants' => 'none'])
        );
        DB::table('positions')->truncate();
        DB::table('positions')->insert(
            array(
                ['name' => 'Attack'],
                ['name' => 'Defence'])
        );
        DB::table('match_type')->truncate();
        DB::table('match_type')->insert(
            array(
                ['name' => 'tournament'],
                ['name' => 'league'],
                ['name' => 'pick_up'],
                ['name' => 'event_game'],
                ['name' => 'event_training'],
                ['name' => 'event_event']
            )
        );

        DB::table('status')->truncate();
        DB::table('status')->insert(
            array(
                ['name' => 'complete'],
                ['name' => 'prepare'],
                ['name' => 'in_progress'],
                ['name' => 'frozen'],
            )
        );

        DB::table('users')->truncate();
        DB::table('users')->insert(
            array(
                [
                    'email' => 'asd@ya.ru',
                    'first_name'=>'system',
                    'password' => '914f892dda0e91f8f3b55345cac0aa85',
                    'sport_id' => 1,
                    'token' => 'd2815a595d679529fab1fac26570e559',
                    'role_id' => 1,
                    'position_id' => 1
                ]
            )
        );

        DB::table('places')->truncate();
        DB::table('places')->insert(
            array(
                [
                    'user_id'=>1,
                    'name'=>'Test Place'
                ]
            )
        );

        DB::table('teams')->truncate();
        DB::table('teams')->insert(
            array(
                [
                    'user_id'=>1,
                    'sport_id'=>1,
                    'name'=>'Test team',
                    'is_fake'=>0
                ]
            )
        );




        Model::reguard();
    }
}
