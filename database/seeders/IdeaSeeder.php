<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // \App\Models\User::factory(10)->create();
        \App\Models\Idea::factory(10)->create();
    }
}
