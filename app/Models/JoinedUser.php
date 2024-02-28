<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinedUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'user_community_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userCommunity()
    {
        return $this->belongsTo(UserCommunity::class);
    }
}
