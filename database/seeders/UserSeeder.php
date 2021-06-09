<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create()->each(function($user) {
            $user->questions()
                ->saveMany(
                    Question::factory(rand(3, 5))
                    ->make()
                );
        });
    }
}
