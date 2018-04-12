<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected  $table = "site_setting";
    protected $fillable =[
        'slug',
        'namesetting',
        'value',
        'type',
    ];
}

