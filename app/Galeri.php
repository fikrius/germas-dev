<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = ['filename'];
    protected $table = 'galeri';
    
}
