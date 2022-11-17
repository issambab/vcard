<?php

use Illuminate\Database\Seeder;

class administratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->insert([
            'last_name' => 'admin ',
            'first_name' => 'ca',
            'photo' => 'img.png',
            'role' => '1',
            'user_id' => 1,
        ]);
    }
}
