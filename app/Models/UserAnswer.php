<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;
    protected $table = 'user_answer';

    protected $fillable = ['user_id', 'quiz_id', "is_correct", "text" ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Explicit foreign key
    }
    

    public function quiz()
    {
        return $this->hasMany(Quiz::class, 'quiz_id'); // Explicit foreign key
    }

}
