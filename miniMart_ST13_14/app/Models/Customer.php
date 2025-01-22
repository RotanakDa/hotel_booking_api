<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tbluser';
    protected $primaryKey = 'userID';
    public $timestamps = false;
}
