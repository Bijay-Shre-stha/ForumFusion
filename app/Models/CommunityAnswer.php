<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'community_question_id',
        'community_answer',
        'user_id',
    ];
    public function communityQuestion()
    {
        return $this->belongsTo(CommunityQuestion::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
