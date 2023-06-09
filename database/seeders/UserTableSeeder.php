<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  => 'Augusto Machuca',
            'email' => 'augusto_fer22@hotmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$jtFMq6os0fUXeFvtVZQqm.M1g7/AK9mTthBgXNgPH2JYSfo4Fd3cG', //12345678
            'remember_token' => Str::random(10),
        ]);
        $user2 = User::create([
            'name'  => 'Sol Galain',
            'email' => 'solgalain@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$jtFMq6os0fUXeFvtVZQqm.M1g7/AK9mTthBgXNgPH2JYSfo4Fd3cG', //12345678
            'remember_token' => Str::random(10),
        ]);
        $user3 = User::create([
            'name'  => 'user guest',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$jtFMq6os0fUXeFvtVZQqm.M1g7/AK9mTthBgXNgPH2JYSfo4Fd3cG', //12345678
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('admin');
        $user2->assignRole('admin');
        $user3->assignRole('usuario');

        // factory(App\Models\User::class, 50)->create()->each(function (App\Models\User  $user) {
        //     $user->assignRole('usuario');
        // });
    }
}
