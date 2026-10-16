<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblProject extends Model
{
    protected $table = "tblProject";
    protected $primaryKey = 'flngProjectId';
    public $timestamps = false;
    protected $fillable = [
        "flngProjectId",
        "fstrProjectTitle",
        "fstrNotes",
        "fstrConsole",
        "fstrSource",
        "fstrAbout",
        "fstrStatus",
        "fstrType",
        "fstrDescription",
    ];
}
