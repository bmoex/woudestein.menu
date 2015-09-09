<?php

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Seeder: Default User Table
 */
class UserTableSeeder extends Seeder
{

    /**
     * Add importer user for other tables
     */
    public function run()
    {
        DB::table('users')->delete(1);

        User::create([
            'id' => 1,
            'name' => 'Seeder',
            'email' => 'info@serfhos.com'
        ]);
    }

}