<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'community_id',
        'user_id',
        'community_question_title',
        'community_question_description',
    ];
    // public function community()
    // {
    //     return $this->belongsTo(Community::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
