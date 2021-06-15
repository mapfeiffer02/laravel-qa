<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create()
        ->each(function($user) {
            $user->questions()->saveMany(Question::factory(rand(3, 5))->make())
                ->each(function($question){
                    $question->answers()->saveMany((Answer::factory(rand(1, 5)))->make());
                });
        });
    }
}
