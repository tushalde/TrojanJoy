<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use tj_core\Models\User;
use tj_core\Models\Post;

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
        DB::table('posts')->delete();
        DB::table('users')->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');
        DB::statement('ALTER TABLE posts AUTO_INCREMENT = 1;');
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



        $posts = array(
            ['owner_id' => 1, 'title' => 'Laptop', 'description' => 'Selling brand new DELL laptop N5050'],
            ['owner_id' => 2, 'title' => 'Bed frame, matress', 'description' => 'Selling twin sized bed frame & a matress'],
            ['owner_id' => 2, 'title' => 'Chair, Shelp', 'description' => 'Selling used IKEA chair for cheap'],
            ['owner_id' => 4, 'title' => 'Skateboard!'],
        );

        // Loop through each post above and create the record for them in the database
        foreach ($posts as $post)
        {
            Post::create($post);
        }
    }
}
