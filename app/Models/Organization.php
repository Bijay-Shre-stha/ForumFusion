<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = [
        'organizationName',
        'organizationAddress',
        'organizationPhoneNumber',
        'organizationEmail',
        'organizationPanNumber',
        'organizationVatNumber'
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
