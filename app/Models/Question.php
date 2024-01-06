<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'description', 'org_id', 'user_id'];
    protected $fillable = ['title', 'description', 'org_id', 'user_id'];

    public function organization(){
        return $this->belongsTo(Organization::class, 'org_id' , 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }
    public function answer(){
        return $this->hasMany(Answer::class, 'question_id' , 'id');
    }

}

