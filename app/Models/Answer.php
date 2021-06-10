<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    public function question()
    {
        $this->belongsTo(Question::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
