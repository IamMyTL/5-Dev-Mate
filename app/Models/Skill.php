<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public $timestamps = false;
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skills');
    }

    public function ads()
    {
        return $this->belongsToMany(Ad::class, 'ad_skill');
    }
}