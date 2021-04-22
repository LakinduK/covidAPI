<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $dates = ['dateTime'];

    protected $fillable = ['nic', 'locationName', 'lat', 'long', 'policeArea', 'dateTime'];
}
