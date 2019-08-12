<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReachRohs extends Model
{
    protected $fillable = ['*'];
    protected $table = 'gc_mas_rohs_chemicals';
    protected $primaryKey = 'chemical_id';
    public $timestamps = false;
}
