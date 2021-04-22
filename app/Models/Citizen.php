<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;
    // protected $primaryKey = 'nic';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public $timestamps = false;
    protected $fillable = ['nic', 'name', 'email', 'password', 'age', 'address', 'phone', 'currentStatus', 'profession', 'affiliation',];
}
