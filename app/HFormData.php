<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HFormData extends Model
{
    public $table = 'f1_data';

    protected $fillable = [
    'f1_form_id','no','phiname','address',
    'age','sex','reason','result','Species','other','mfcount','user_name',
    'remarks','gps_lat','gps_long','labref'
    ];
}