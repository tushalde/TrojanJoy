<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use tj_core\Models\User;

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

        $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        $users = array(
            ['first_name' => 'Ryan', 'last_name' => 'Chenkie', 'email' => 'ryanchenkie@gmail.com','phone_number' => 2132949665, 'avatar_url' => 'http://google.com'],
            ['first_name' => 'Chris', 'last_name' => 'Sevilleja', 'email' => 'chris@scotch.io','phone_number' => 2132949665, 'avatar_url' => 'http://google.com'],
            ['first_name' => 'Holly', 'last_name' => 'Lloyd', 'email' => 'holly@scotch.io','phone_number' => 2132949665, 'avatar_url' => 'http://google.com'],
            ['first_name' => 'Adnan', 'last_name' => 'Kukic', 'email' => 'adnan@scotch.io','phone_number' => 2132949665, 'avatar_url' => 'http://google.com'],
        );

        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}
