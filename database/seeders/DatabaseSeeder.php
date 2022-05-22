<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $token = \App\Models\User::factory(1)
            ->create()->first()->createToken('auth')->plainTextToken;
        file_put_contents('README.md', '* token: '.$token."\n", FILE_APPEND);
    }
}
