<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'id';
    protected $fillable = [
    'firstname',
    'lastname',
    'middlename',
    'age',
    'gender',
    'address',
];

}