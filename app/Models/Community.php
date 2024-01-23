<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = [
        'communityName',
        'user_Id',
    ];
    public function question(){
        return $this->hasMany(Question::class, 'org_id' , 'user_id');
    }
    public function user(){
        return $this->hasMany(User::class, 'org_id' , 'user_id');
    }
    public function answer(){
        return $this->hasMany(Answer::class, 'org_id' , 'user_id');
    }

}
