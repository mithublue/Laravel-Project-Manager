<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\Controller;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $caps = (new Controller())->get_caps();
        $capabilities = array();
        foreach($caps as $role => $cap_array ) {
            $capabilities = array_unique(array_merge($capabilities,$cap_array));
        }
        $capabilities = json_encode($capabilities);

        DB::table('users')->insert([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'caps' => $capabilities
        ]);
    }
}
