<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    protected $fillable = ['no_induk', 'bp', 'nama', 'status'];
}
