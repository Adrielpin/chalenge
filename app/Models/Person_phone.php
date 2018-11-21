<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person_phone extends Model
{
    protected $table = 'person_phones';

    protected $fillable = [
       'person_id', 'phone'
    ];
}
