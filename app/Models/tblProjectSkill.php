<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblProjectSkill extends Model
{
    protected $table = "tblProjectSkill";
    protected $primaryKey = 'flngProjectSkillId';
    public $timestamps = false;
    protected $fillable = [
        "flngSkillId",
        "flngProjectId"
    ];
}
