<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create a single user to own all 6 listings
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // \App\Models\User::factory(5)->create(); // create five users
        // Listing::factory(6)->create(); // create six listings

        // Listing::create([
        //     'title' => 'laravel developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'acme corp',
        //     'location' => 'Boston',
        //     'email' => 'email@gmail.com',
        //     'website' => 'https:www.wcme.com',
        //     'description' => 'bla bla bla blaaaa bllllaaaaaaaaaaa .kjk;oviujoidfhvo;ifxjv',
        // ]);

        // Listing::create([
        //     'title' => 'java developer',
        //     'tags' => 'java, javascript',
        //     'company' => 'acme corp',
        //     'location' => 'damascus',
        //     'email' => 'bla@gmail.com',
        //     'website' => 'https:www.bla.com',
        //     'description' => 'bla bla bla blaaaa bllllaaaaaaaaaaa .kjk;oviujoidfhvo;ifxjv',
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
