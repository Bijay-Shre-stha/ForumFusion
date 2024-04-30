<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCommunity extends Model
{
    use HasFactory;
    protected $fillable = [
        'communityName',
        'created_user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'created_user_id', 'id');
    }
    // public function community()
    // {
    //     return $this->belongsTo(Community::class, 'communityName', 'id');
    // }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_communities', 'created_user_id');
    }
    public function joinedUsers()
    {
        return $this->hasMany(JoinedUser::class);
    }
}
