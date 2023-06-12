<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remitok extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ocompra()
    {
        return $this->belongsTo('App\Models\Ocompra');
    }

    // Relacion uno a muchos
    public function imputacion()
    {
        return $this->hasMany('App\Models\Imputacion');
    }

    public function ocompra_remk()
    {
        return $this->hasMany('App\Models\Ocompra');
    }

    // public function remitosk()
    // {
    //     return $this->belongsTo('App\Models\Remitok');
    // }


}
