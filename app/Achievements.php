<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Achievements extends Model
{
    use HasRoles;  
    //

    protected $fillable = [
        'roll_no',
        'name',
        'technical_event',
        'time_discription',
        'general_discription',
        'awards',
    ];
}
