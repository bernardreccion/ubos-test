<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credentials extends Model
{
    protected $table = 'credentials';
    protected $id = 'id';
    protected $fillable = ['id_number', 'firstname', 'lastname', 'email', 'course', 'user_id'];
}
