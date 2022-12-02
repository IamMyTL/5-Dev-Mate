<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'id',
        'title',
        'company',
        'description',
        'user_id',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'ad_skill');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
