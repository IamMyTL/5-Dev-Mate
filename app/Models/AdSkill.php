<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdSkill extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'ad_id',
        'skill_id',
    ];

    protected $table = 'ad_skill';

}
