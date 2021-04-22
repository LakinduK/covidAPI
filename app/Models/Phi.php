<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phi extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['nic', 'name', 'email', 'password', 'phone', 'user_type'];
}
