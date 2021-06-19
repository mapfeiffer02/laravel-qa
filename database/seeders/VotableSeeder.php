<?php

namespace Database\Seeders;

use App\models\User;
use App\Models\Answer;
use App\models\Question;
use Illuminate\Database\Seeder;


class VotableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $numberOfUsers = $users->count();
        $votes = [-1, 1];

        foreach(Question::all() as $question){
            for ( $i = 0; $i < rand(1, $numberOfUsers); $i++){
                $user = $users[$i];
                $user->voteQuestion($question, $votes[rand(0, 1)]);
            }
        }

        foreach(Answer::all() as $answer){
            for ( $i = 0; $i < rand(1, $numberOfUsers); $i++){
                $user = $users[$i];
                $user->voteAnswer($answer, $votes[rand(0, 1)]);
            }
        }
    }
}
