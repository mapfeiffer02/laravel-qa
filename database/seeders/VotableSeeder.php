<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;
use App\models\Question;


class VotableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('votables')->where('votable_type', 'App\Question')->delete();

        $users = User::all();
        $numberOfUsers = $users->count();
        $votes = [-1, 1];

        foreach(Question::all() as $question){
            for ( $i = 0; $i < rand(1, $numberOfUsers); $i++){
                $user = $users[$i];
                $user->voteQUestion($question, $votes[rand(0, 1)]);
            }
        }
    }
}
