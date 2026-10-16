<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblSkill extends Model
{
    protected $table = "tblSkill";
    protected $primaryKey = 'flngSkillId';
    public $timestamps = false;
    protected $fillable = [
        "fstrSkillTitle",
        "flngYearsExperience"
    ];
}
